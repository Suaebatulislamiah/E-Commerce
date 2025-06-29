<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Produk;

class FrontController extends Controller
{
    public function index()
    {
        $produk = Produk::all();
        return view('lending-page', compact('produk'));
    }

}