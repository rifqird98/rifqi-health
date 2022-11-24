<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = Artikel::with('category')->paginate(10);
        return view('welcome', compact('data'));
    }
}
