<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // ✅ Halaman utama user (list produk + filter kategori)
    public function index(Request $request)
    {
        // Ambil semua kategori unik dari produk
        $categories = Product::select('category')->distinct()->pluck('category');

        // Filter kategori kalau ada di query
        $category = $request->query('category');
        $products = Product::when($category, function ($query, $category) {
            return $query->where('category', $category);
        })->latest()->get();

        // Kirim ke view
        return view('user.home', compact('products', 'categories', 'category'));
    }

    // ✅ Detail produk
    public function show($id)
    {
        // Ambil produk berdasarkan ID
        $product = Product::findOrFail($id);

        // Kirim ke view user.detail
        return view('user.detail', compact('product'));
    }

    // ✅ Tambah ke keranjang (pakai session)
    public function addToCart($id)
    {
        $product = Product::findOrFail($id);

        // Ambil cart dari session, kalau belum ada buat array kosong
        $cart = session()->get('cart', []);

        // Cek apakah produk sudah ada di keranjang
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image,
            ];
        }

        // Simpan kembali ke session
        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    // ✅ Lihat halaman keranjang
    public function cart()
    {
        $cart = session()->get('cart', []);
        return view('user.cart', compact('cart'));
    }

    // ✅ Hapus item dari keranjang
    public function removeFromCart($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Produk dihapus dari keranjang.');
    }
}
