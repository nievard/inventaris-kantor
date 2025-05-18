<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;  
use App\Models\Item;      
use App\Models\Borrow;   

class DashboardController extends Controller
{
    public function index()
    {
        $totalKategori = Category::count();
        $totalBarang = Item::count();
        $totalPeminjaman = Borrow::count();

        return view('dashboard', compact('totalKategori', 'totalBarang', 'totalPeminjaman'));
    }
}
