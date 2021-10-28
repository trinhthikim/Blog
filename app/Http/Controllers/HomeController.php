<?php

namespace App\Http\Controllers;

use App\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Redis;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            Post::addAllToIndex();
            $response = Post::searchByQuery([
                'match' => [
                    'title' => $request->input('search')
                ]
            ]);


//            return dd($response);
            return view('home')->with('posts', $response);
        }
        return view('home')->with('posts', Post::paginate(6));
    }
}
