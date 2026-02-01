<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::where('user_id', Auth::id())->with('product')->get();
        $total = $cartItems->sum(function ($item) {
            return $item->quantity * ($item->product->discount_price ?? $item->product->price);
        });

        return view('cart.index', compact('cartItems', 'total'));
    }

    public function add(Product $product, Request $request)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1|max:' . $product->stock,
        ]);

        // Cek apakah produk sudah ada di cart
        $cartItem = Cart::where('user_id', Auth::id())
            ->where('product_id', $product->id)
            ->first();

        if ($cartItem) {
            // Update quantity
            $cartItem->quantity += $request->quantity;
            $cartItem->save();
        } else {
            // Buat cart baru
            Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $product->id,
                'quantity' => $request->quantity,
            ]);
        }

        return redirect()->route('cart.index')
            ->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    public function remove(Cart $cart)
    {
        // Pastikan cart milik user yang login
        if ($cart->user_id !== Auth::id()) {
            abort(403);
        }

        $cart->delete();

        return redirect()->route('cart.index')
            ->with('success', 'Produk berhasil dihapus dari keranjang!');
    }

    public function update(Cart $cart, Request $request)
    {
        // Pastikan cart milik user yang login
        if ($cart->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'quantity' => 'required|integer|min:1|max:' . $cart->product->stock,
        ]);

        $cart->quantity = $request->quantity;
        $cart->save();

        return redirect()->route('cart.index')
            ->with('success', 'Keranjang berhasil diperbarui!');
    }

    public function clear()
    {
        Cart::where('user_id', Auth::id())->delete();

        return redirect()->route('cart.index')
            ->with('success', 'Keranjang berhasil dikosongkan!');
    }

    public function checkout()
    {
        $cartItems = Cart::where('user_id', Auth::id())->with('product')->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')
                ->with('error', 'Keranjang Anda kosong!');
        }

        $total = $cartItems->sum(function ($item) {
            return $item->quantity * ($item->product->discount_price ?? $item->product->price);
        });

        return view('cart.checkout', compact('cartItems', 'total'));
    }

    public function processCheckout(Request $request)
    {
        // TODO: Implement checkout logic
        // For now, just clear the cart
        Cart::where('user_id', Auth::id())->delete();

        return redirect()->route('checkout.success')
            ->with('success', 'Pesanan berhasil diproses!');
    }

    public function checkoutSuccess()
    {
        return view('cart.success');
    }

    public function checkoutCancel()
    {
        return redirect()->route('cart.index')
            ->with('error', 'Pembayaran dibatalkan!');
    }
}
