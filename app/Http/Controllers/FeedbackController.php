<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class FeedbackController extends Controller
{
    //
    /**
     * Show the form to create a new feedback.
     *
     * @return \Illuminate\View\View
     */
    public function create(User $user)
    {
        return view('form',['user'=>$user]);
    }

    /**
     * Store a new feedback.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,User $user)
    {
        $validated = $request->validate([
            'name' => 'max:255',
            'feedback-text' => 'required',
            'g-recaptcha-response' => 'required|recaptchav3:register,0.5',
        ]);
        $name=request("name");
        $author="Anonymous";
        if(!empty($name))$author=$name;
        $text=request("feedback-text");
        $user->feedback()->create(["title"=>"Feedback by {$author}", "content"=>$text, "author"=>$name]);
        return redirect()->back()->withSuccess('feedback successfully submitted');
    }
}
