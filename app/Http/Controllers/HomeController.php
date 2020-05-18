<?php

namespace App\Http\Controllers;

use App\JobFinder;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(JobFinder $finder)
    {
        return view(
            'home',
            ['jobs' => $finder->find()]
        );
    }
}
