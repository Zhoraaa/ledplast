<?php

namespace App\Http\Controllers;


use App\Models\OurWorks;
use Illuminate\Http\Request;

class PageController extends Controller
{
    //
    public function home() {

        $data['oworks'] = OurWorks::get();

        // dd($data);

        return view('home', compact('data'));
    }
}
