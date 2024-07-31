<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\Package;

class PkgPageController extends Controller
{
    public function index()
    {
        $packages = Package::with('category')->get();
        return view('packages', compact('packages'));
    }
}
