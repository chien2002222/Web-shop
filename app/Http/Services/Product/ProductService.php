<?php
namespace App\Http\Services\Product;

use App\Models\Menu;
use App\Models\Products;
use Illuminate\Support\Facades\Session;

class ProductService {
    public function getAll() {

        return Products::with('menu') -> orderByDesc('id') -> paginate(15);
        }

     public function getMenu()
    {
        return Menu::where('active', 1)->get();
    }

    protected function isValidPrice($request)
    {
        if ($request->input('price') != 0 && $request->input('price_sale') != 0
            && $request->input('price_sale') >= $request->input('price')
        ) {
            Session::flash('error', 'Giá giảm phải nhỏ hơn giá gốc');
            return false;
        }

        if ($request->input('price_sale') != 0 && (int)$request->input('price') == 0) {
            Session::flash('error', 'Vui lòng nhập giá gốc');
            return false;
        }

        return  true;
    }

    public function create($request) {
        $isValidPrice = $this->isValidPrice($request);
        if ($isValidPrice === false) return false;

        try {
            $request->except('_token');
            Products::create($request->all());

            Session::flash('success', 'Thêm Sản phẩm thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Thêm Sản phẩm lỗi');
            
            return  false;
        }

        return  true;
    }

    public function update($request, $product)
    {
        $isValidPrice = $this->isValidPrice($request);
        if ($isValidPrice === false) return false;
        try {
            $request->except('_token');
            $product->update($request->all());
            Session::flash('success', 'Cập nhật Sản phẩm thành công');
            } catch (\Exception $err) {
                Session::flash('error', 'Cập nhật Sản phẩm lỗi');
                return  false;
                }
                return  true;

    }

    public function delete($request)
    {
        $product = Products::where('id', $request->input('id'))->first();
        if ($product) {
            $product->delete();
            return true;
        }

        return false;
    }
    

}