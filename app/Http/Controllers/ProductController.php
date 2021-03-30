<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Alert;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::join('outlets', 'outlets.id', '=', 'products.outlet_id')
            ->select('products.*', 'outlets.name as outlet')
            ->get();
        $data = [
            'products' => $products,
        ];
        return view('admin.management.products.index', $data);
    }

    public function create()
    {
        $outlets = Outlet::all();
        $data = [
            'outlets' => $outlets,
        ];
        return view('admin.management.products.create', $data);
    }

    public function store(Request $request)
    {
        Validator::validate($request->all(), [
            'type' => ['required'],
            'price' => ['required'],
            'discount' => ['required'], 
            'outlet' => ['required'], 
        ]);      

        $product = new Product([
            'outlet_id' => $request->input('outlet'),
            'type' => $request->input('type'),
            'price' => $request->input('price'),
            'discount' => $request->input('discount'),
        ]);

        if ($product->save()) {
            Alert::success('Create Product', 'Success create product');
            return redirect()->route('admin.product.index');
        } else {
            Alert::error('Create Product', 'Failed create product');
            return redirect()->back();
        }
    }

    public function show(Product $product)
    {
        //
    }

    public function edit(Product $product)
    {
        $outlets = Outlet::all();
        $data = [
            'product' => $product,
            'outlets' => $outlets
        ];
        return view('admin.management.products.edit', $data);
    }

    public function update(Request $request, Product $product)
    {
        Validator::validate($request->all(), [
            'outlet' => ['required'],
            'type' => ['required', 'min:3', 'max:100'],
            'price' => ['required', 'numeric'],
            'discount' => ['required', 'numeric'],                        
        ]);

        $product->outlet_id = $request->input('outlet');
        $product->type = $request->input('type');
        $product->price = $request->input('price');
        $product->discount = $request->input('discount'); 
        
        if ($product->save()) {
            Alert::success('Update Product', 'Success update product');
            return redirect()->route('admin.product.index');
        } else {
            Alert::error('Update Product', 'Failed update product');
            return redirect()->back();
        }
    }

    public function destroy(Product $product)
    {
        if ($product->delete()) {
            Alert::success('Delete Product', 'Success delete product');
        } else {
            Alert::error('Delete Product', 'Failed delete product');
        }

        return redirect()->route('admin.product.index');
    }
}
