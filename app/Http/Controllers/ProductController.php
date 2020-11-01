<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Product;
use App\Category;
use File;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::with(['category'])->orderBy('created_at','DESC');
        if (request()->q !='') {
            $product=$product->where('name','LIKE','%'.request()->q.'%');
        }
        $product=$product->paginate(10);
        return view('admin.product.index', compact('product'));
    }
    public function create()
    {
        $category = Category::orderBy('name','DESC')->get();
        return view('admin.product.create', compact('category'));
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string|max:100',
            'description' =>  'required',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|integer',
            'weight' => 'required|integer',
            'image' => 'required|image|mimes:png,jpeg,jpg'
        ]);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '-' . Str::slug($request->name) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/image/product',$filename);

            $product = Product::create([
                'name' => $request->name,
                'slug' => $request->name,
                'category_id' => $request->category_id,
                'description' => $request->description,
                'image' => $filename,
                'price' => $request->price,
                'weight' => $request->weight,
                'status' => $request->status,
            ]);

            return redirect()->route('product.index')->with(['success' => 'Product Telah Ditambahkan']);
        }
    }
    public function edit($id)
    {
        $product = Product::find($id);
        $category = Category::orderBy('name', 'DESC')->get();
        return view('admin.product.edit', compact('product', 'category'));
    }
    public function update(Request $request,$id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'description' =>  'required',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|integer',
            'weight' => 'required|integer',
            'image' => 'nullable|image|mimes:png,jpeg,jpg'
        ]);
        $product = Product::find($id);
        $filename = $product->image;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '-' . Str::slug($request->name) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/image/product', $filename);
            File::delete(storage_path('app/public/image/product', $product->image));
        }
        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'weight' => $request->weight,
            'image' => $filename,
            'status' =>$request->status
        ]);
        return redirect(route('product.index'))->with(['success' => 'Data Produk Diperbaharui']);
    }
    public function destroy($id)
    {
        $product = Product::find($id); 
        File::delete(storage_path('app/public/image/product/' . $product->image));
        $product->delete();
        return redirect(route('product.index'))->with(['success' => 'Produk Sudah Dihapus']);
    }
}
