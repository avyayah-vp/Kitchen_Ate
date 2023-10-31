<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;


class CartController extends Controller
{
    //
    public function showCart(Request $request)
    {

        $cartItems = DB::table('cart_items')
            ->join('food_items', 'cart_items.food_item_id', '=', 'food_items.id')
            ->select('food_items.*', 'cart_items.quantity')
            ->get();

        $totalPrice = $cartItems->reduce(function ($carry, $item) {
            return $carry + ($item->price * $item->quantity);
        }, 0);

        return view('cart', ['cartItems' => $cartItems, 'totalPrice' => $totalPrice]);
    }

    public function add(Request $request)
    {
        $cartItem = DB::table('cart_items')->where('food_item_id', $request->food_item_id)->first();

        if ($cartItem) {
            DB::table('cart_items')->where('food_item_id', $request->food_item_id)->increment('quantity');
        } else {
            DB::table('cart_items')->insert([
                'food_item_id' => $request->food_item_id,
                'quantity' => 1
            ]);
        }

        return back()->with('success', 'Item added to cart successfully!');
    }


    public function increment(Request $request)
    {
        DB::table('cart_items')->where('food_item_id', $request->food_item_id)->increment('quantity');
        return response()->json(['success' => 'Quantity incremented successfully!']);
    }

    public function decrement(Request $request)
    {
        $cartItem = DB::table('cart_items')->where('food_item_id', $request->food_item_id)->first();
        if ($cartItem->quantity > 1) {
            DB::table('cart_items')->where('food_item_id', $request->food_item_id)->decrement('quantity');
            return response()->json(['success' => 'Quantity decremented successfully!']);
        } else {
            DB::table('cart_items')->where('food_item_id', $request->food_item_id)->delete();
            return response()->json(['success' => 'Item removed from cart.']);
        }
    }

    public function empty()
    {
        DB::table('cart_items')->delete();
        return response()->json(['success' => 'Cart emptied successfully!']);
    }
}
