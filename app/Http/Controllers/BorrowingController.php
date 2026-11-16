<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Member;
use App\Models\Borrowing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

class BorrowingController extends Controller
{
    // Menampilkan daftar peminjaman
    public function index()
    {
        $borrowings = Borrowing::with([
            'user',
            'member',
            'details.book'
        ])->latest()->get();

        return view('borrowings.index', compact('borrowings'));
    }

    // Menampilkan form peminjaman
    public function create()
    {
        $members = Member::orderBy('name')->get();
        $books = Book::where('stock', '>', 0)
            ->orderBy('title')
            ->get();

        return view('borrowings.create', compact(
            'members',
            'books'
        ));
    }

    // Menyimpan transaksi peminjaman
    public function store(Request $request)
    {
        $validated = $request->validate([
            'member_id' => 'required|exists:members,id',
            'books' => 'required|array|min:1',
            'books.*.book_id' => 'required|distinct|exists:books,id',
            'books.*.quantity' => 'required|integer|min:1',
        ]);

        DB::transaction(function () use ($validated) {

            $borrowing = Borrowing::create([
                'user_id' => Auth::id(),
                'member_id' => $validated['member_id'],
                'borrowed_at' => now()->toDateString(),
                'due_date' => now()->addDays(7)->toDateString(),
                'status' => 'borrowed',
            ]);

            foreach ($validated['books'] as $item) {

                $book = Book::where('id', $item['book_id'])
                    ->lockForUpdate()
                    ->firstOrFail();

                if ($book->stock < $item['quantity']) {
                    throw ValidationException::withMessages([
                        'books' => "Stok buku {$book->title} tidak mencukupi.",
                    ]);
                }

                $borrowing->details()->create([
                    'book_id' => $book->id,
                    'quantity' => $item['quantity'],
                ]);

                $book->decrement('stock', $item['quantity']);
            }
        });

        return redirect()
            ->route('borrowings.index')
            ->with('success', 'Peminjaman buku berhasil dicatat.');
    }

    // Menampilkan detail transaksi
    public function show(Borrowing $borrowing)
    {
        $borrowing->load([
            'user',
            'member',
            'details.book'
        ]);

        return view('borrowings.show', compact('borrowing'));
    }

    // Proses pengembalian buku
    public function returnBook(Borrowing $borrowing)
    {
        DB::transaction(function () use ($borrowing) {

            $borrowing = Borrowing::with('details.book')
                ->lockForUpdate()
                ->findOrFail($borrowing->id);

            if ($borrowing->status === 'returned') {
                throw ValidationException::withMessages([
                    'return' => 'Buku sudah dikembalikan sebelumnya.',
                ]);
            }

            foreach ($borrowing->details as $detail) {

                $book = Book::where('id', $detail->book_id)
                    ->lockForUpdate()
                    ->firstOrFail();

                $book->increment('stock', $detail->quantity);
            }

            $borrowing->update([
                'returned_at' => now()->toDateString(),
                'status' => 'returned',
            ]);
        });

        return redirect()
            ->route('borrowings.show', $borrowing)
            ->with('success', 'Buku berhasil dikembalikan.');
    }
}
