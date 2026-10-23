<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Menampilkan daftar buku.
     */
    public function index()
    {
        // Menggunakan eager loading with('category') sesuai materi relasi[cite: 72]
        $books = Book::with('category')->get();
        return view('books.index', compact('books'));
    }

    /**
     * Menampilkan form tambah buku.
     */
    public function create()
    {
        // Mengambil kategori diurutkan berdasarkan nama (Modul hal. 74)[cite: 74]
        $categories = Category::orderBy('name')->get();
        return view('books.create', compact('categories'));
    }

    /**
     * Menyimpan data buku baru ke database.
     */
    public function store(Request $request)
    {
        // Validasi input lengkap dengan aturan exists untuk category_id (Modul hal. 76)[cite: 76]
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'author'      => 'required|string|max:255',
            'year'        => 'required|integer',
            'stock'       => 'required|integer|min:0',
        ]);

        // Menyimpan data menggunakan hasil validasi (Modul hal. 76)[cite: 76]
        Book::create($validated);

        return redirect()->route('books.index')->with('success', 'Data buku berhasil ditambahkan!');
    }

    /**
     * Menampilkan detail buku tertentu.
     */
    public function show($id)
    {
        $book = Book::with('category')->findOrFail($id);
        return view('books.show', compact('book'));
    }

    /**
     * Menampilkan form edit buku.
     */
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        // Mengambil kategori diurutkan berdasarkan nama untuk form edit (Modul hal. 77)[cite: 77]
        $categories = Category::orderBy('name')->get();
        return view('books.edit', compact('book', 'categories'));
    }

    /**
     * Memperbarui data buku di database.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'author'      => 'required|string|max:255',
            'year'        => 'required|integer',
            'stock'       => 'required|integer|min:0',
        ]);

        $book = Book::findOrFail($id);
        // Memperbarui data menggunakan hasil validasi (Modul hal. 78)[cite: 78]
        $book->update($validated);

        return redirect()->route('books.index')->with('success', 'Data buku berhasil diperbarui!');
    }

    /**
     * Menghapus data buku dari database.
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Data buku berhasil dihapus!');
    }
}