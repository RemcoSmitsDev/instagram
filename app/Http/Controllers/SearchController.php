<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index()
    {
        return view('search.index');
    }
    public function search(Request $request)
    {
        $zoekKey = '%' . $request->name . '%';
        $post = User::where('name', 'LIKE', $zoekKey)->get();
        return response()->json($post);
    }
}
