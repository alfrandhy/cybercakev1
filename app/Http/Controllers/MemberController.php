<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('created_at', 'DESC')->paginate(10);
        return view('member.index',compact('products'));
    }
    public function product()
    {
        $products = Product::orderBy('created_at', 'DESC')->paginate(10);
        $category = Category::with(['child'])->withCount(['child'])->getParent()->orderBy('name','ASC')->get();
        return view('member.product', compact('products','category'));
    }
}
