<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class MessageController extends Controller
{
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required|min:3|max:500',
            'tags' => 'required|min:3|max:40',
        ]);

        $message = new Message();

        $message->message = $request->message;
        $message->image = $request->image;
        $message->tags = $request->tags;

        $user = Auth::user();
        $message->user_id = $user->id;
        
        $message->save();
        
        return redirect()->route('home')->with('message', 'votre message a bien été envoyé');

    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        return view('message/edit' , compact('message'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request , Message $message)
    {
        $request->validate([
            'message' => 'required|min:3|max:500',
            'tags' => 'required|min:3|max:40',
        ]);
             
        $message->message = $request['message'];       
        $message->image = $request['image'];
        $message->tags = $request['tags'];
        $message->save();

        return redirect()->route('home')->with('message', 'Le message a bien été modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        $message->delete();
        return redirect()->route('home')->with('message', 'Message a bien été supprimé');
    }
}
