<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Feedback;
use App\Models\User;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
	    $user_id = Auth::user()->id;
        $feedbacks = Feedback::where("user_id", "=", $user_id)->orderBy('created_at', 'desc')->paginate(10);
        return view('home', ["feedbacks"=>$feedbacks,"user_id"=>$user_id]);

    }
}
