<?php

namespace App\Http\Controllers;

use App\Models\EBPosts;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $config['list'] = EBPosts::get()->toArray();
        $config['show'] = 'app.posts.show';
        $config['edit'] = 'app.posts.edit';
        $config['delete'] = 'app.posts.destroy';

        return view ('welcome', $config);

    }
}
