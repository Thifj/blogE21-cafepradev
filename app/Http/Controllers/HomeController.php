<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        return view("blog/home", [
            // orderBy ASC = CRESCENTE (ASCENT) e DESC = DECRECENTE (DESCENT)
            "articles" => Articles::orderBy("id", "DESC")->limit(3)->get()
        ]);
    }
}
