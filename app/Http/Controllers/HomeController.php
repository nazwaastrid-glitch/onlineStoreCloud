<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Home Page - Online Store";
        return view('home.index')->with("viewData", $viewData);
    }

    public function about()
    {
        $viewData = [];
        $viewData["title"] = "About us - Online Store";
        $viewData["subtitle"] = "About us";
        $viewData["description"] = "This is an about page ...";
        $viewData["author"] = "Developed by: Nazwa";

    // Pastikan semua variabel di bawah ini di-with satu per satu agar terbaca oleh blade
        return view('home.about')->with("viewData", $viewData)
        ->with("title", $viewData["title"])
        ->with("subtitle", $viewData["subtitle"])
        ->with("description", $viewData["description"])
        ->with("author", $viewData["author"]);
    }
}
