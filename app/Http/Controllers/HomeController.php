<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->only(['home']);
        $this->middleware('guest')->only(['index']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        $messages = Message::with('user', 'comments.user')->latest()->paginate(3);
        
        return view('home', compact('messages'));
    }
    
    public function index()
    {
        return view('index');
    }


}
