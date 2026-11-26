<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Borrowing;
use App\Models\BorrowingDetail;
use App\Models\User;
use App\Models\Member;
use App\Models\Book;

class BorrowingSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil akun petugas
        $user = User::where('role', 'petugas')->first();

        if (!$user) {
            throw new \Exception('Akun petugas belum tersedia.');
        }

        // Data contoh peminjaman
        $transactions = [
            [
                'member' => 'Andi',
                'book' => 'Pemrograman PHP',
                'days' => 7,
                'status' => 'borrowed',
            ],
            [
                'member' => 'Budi',
                'book' => 'Laravel untuk Pemula',
                'days' => 10,
                'status' => 'returned',
            ],
            [
                'member' => 'Citra',
                'book' => 'Basis Data',
                'days' => 10,
                'status' => 'returned',
            ],
        ];

        foreach ($transactions as $transaction) {

            $member = Member::where(
                'name',
                $transaction['member']
            )->first();

            $book = Book::where(
                'title',
                $transaction['book']
            )->first();

            if (!$member || !$book) {
                throw new \Exception(
                    'Data anggota atau buku tidak ditemukan.'
                );
            }

            $borrowedAt = now()
                ->subDays($transaction['days'])
                ->toDateString();

            $dueDate = now()
                ->subDays($transaction['days'])
                ->addDays(7)
                ->toDateString();

            $returnedAt = $transaction['status'] === 'returned'
                ? now()->subDays(2)->toDateString()
                : null;

            // Buat data peminjaman
            $borrowing = Borrowing::firstOrCreate(
                [
                    'user_id' => $user->id,
                    'member_id' => $member->id,
                    'borrowed_at' => $borrowedAt,
                ],
                [
                    'due_date' => $dueDate,
                    'returned_at' => $returnedAt,
                    'status' => $transaction['status'],
                ]
            );

            // Buat detail buku yang dipinjam
            BorrowingDetail::firstOrCreate(
                [
                    'borrowing_id' => $borrowing->id,
                    'book_id' => $book->id,
                ],
                [
                    'quantity' => 1,
                ]
            );
        }
    }
}
