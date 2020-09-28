<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    /**
     * Display home page.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        return view('home');
    }
}
