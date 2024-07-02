<?php

namespace App\Http\Controllers;

use App\Http\Services\Product\ProductMainService;
use Illuminate\Http\Request;

class ProductUserController extends Controller
{
    protected $productService;

    public function __construct(ProductMainService $productService)
    {
        $this->productService = $productService;
    }

    public function index($id = '', $slug = '')
    {
        $product = $this->productService->show($id);
        $productsMore = $this->productService->more($id);

        return view('product.content', [
            'title' => $product->name,
            'product' => $product,
            'products' => $productsMore
        ]);
    }
}
