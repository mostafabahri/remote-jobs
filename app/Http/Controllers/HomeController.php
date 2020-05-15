<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home', [
            'jobs' => [
                (object) [
                    'title' =>'Shopify Frontend Developer - Remote',
                    'region' => 'Full-Time/Europe Only',
                    'date' => 'May 13',
                    'company' => (object)[
                        'name' => 'CRISP STUDIO',
                        'logo' => '/sample-logo.jpeg'
                    ]
                    ],
                (object) [
                    'title' =>'Full Stack Laravel Developer',
                    'region' => 'Full-Time/Anywhere(100% remote) Only',
                    'date' => 'May 20',
                    'company' => (object)[
                        'name' => 'SpinupWP',
                        'logo' => '/sample-logo.jpeg'
                    ]
                    ],
            ]
        ]);
    }
}
