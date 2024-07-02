<?php

namespace App\Http\Controllers;

use App\Http\Services\CartService;
use App\Models\Cart;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function index(Request $request)
    {
        $result = $this->cartService->create($request);
        if ($result === false) {
            return redirect()->back();
        }

        return redirect('/carts');
    }

    public function show()
    {
        $products = $this->cartService->getProduct();

        return view('carts.list', [
            'title' => 'Giỏ Hàng',
            'products' => $products,
            'carts' => Session::get('carts')
        ]);
    }
    public function checkout()
    {
        $carts = Session::get('carts');
        $products = $this->cartService->getProduct();
        $total = 0;
    
        foreach ($products as $product) {
            $total += $product->price_sale * $carts[$product->id];
        }
    
        return view('carts.checkout', [
            'title' => 'Checkout',
            'products' => $products,
            'carts' => $carts,
            'total' => $total
        ]);
    }

    public function update(Request $request)
    {
        $this->cartService->update($request);

        return redirect('/carts');
    }

    public function remove($id = 0)
    {
        $this->cartService->remove($id);

        return redirect('/carts');
    }

    public function addCart(Request $request)
    {
         // Validate the incoming request data
    $request->validate([
        'name' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'phone' => 'required|string|max:20',
        'email' => 'required|string|email|max:255',
        'content' => 'nullable|string|max:1000',
        // Add more validation rules as needed
    ]);

    // Create or update customer information
    $customer = Customer::create([
        'name' => $request->input('name'),
        'address' => $request->input('address'),
        'phone' => $request->input('phone'),
        'email' => $request->input('email'),
        'content' => $request->input('content'),
    ]);

    // Save each product in the cart as an order
    foreach ($request->input('products') as $productId => $productData) {
        Cart::create([
            'customer_id' => $customer->id,
            'product_id' => $productId,
            'pty' => $productData['quantity'],
            'price' => $productData['price'],
        ]);
    }

    // Optionally, clear the cart session data
    Session::forget('carts');

    // Redirect to a thank you page or order confirmation page
    return redirect('/');
}
}
