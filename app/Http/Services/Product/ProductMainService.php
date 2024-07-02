<?php
namespace App\Http\Services\Product;

use App\Models\Products;

class ProductMainService{
    const LIMIT = 16;

    public function get($page = null)
    {
        return Products::select('id', 'name', 'price', 'price_sale', 'image')
            ->orderByDesc('id')
            ->when($page != null, function ($query) use ($page) {
                $query->offset($page * self::LIMIT);
            })
            ->limit(self::LIMIT)
            ->get();
    }

    public function show($id)
    {
        return Products::where('id', $id)
            ->where('active', 1)
            ->with('menu')
            ->firstOrFail();
    }

    public function more($id)
    {
        return Products::select('id', 'name', 'price', 'price_sale', 'image')
            ->where('active', 1)
            ->where('id', '!=', $id)
            ->orderByDesc('id')
            ->limit(8)
            ->get();
    }
}