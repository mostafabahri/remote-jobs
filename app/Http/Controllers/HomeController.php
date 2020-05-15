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
                ]
            ]
        ]);
    }
}
