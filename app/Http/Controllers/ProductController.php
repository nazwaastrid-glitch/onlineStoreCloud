<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Hapus bagian public static $products yang berisi data dummy/manual

    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Products - Online Store";
        $viewData["subtitle"] = "List of products";
        // Mengambil semua data dari tabel 'products' di database
        $viewData["products"] = Product::all(); 
        
        return view('product.index')->with("viewData", $viewData);
    }

    public function show($id)
    {
        $viewData = [];
        // Mengambil produk berdasarkan id, jika tidak ada akan menampilkan error 404
        $product = Product::findOrFail($id); 
        
        $viewData["title"] =  $product->getName(). " - Online Store";
        $viewData["subtitle"] =  $product->getName(). " - Product information";
        $viewData["product"] = $product;
        
        return view('product.show')->with("viewData", $viewData);
    }
}