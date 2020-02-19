<?php namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

class ProductController extends Controller
{

    /**
     * List all products
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $products = Product::all();

        return view('index', compact('products'));
    }

    public function show($id)
    {
        $product = Product::find($id);

        return view('product', compact('product'));
    }

    public function filter(Request $request)
    {
        $products = Product::where('title', 'like', "$request->search%")->get();

        return view('index', compact('products'));
    }
}
