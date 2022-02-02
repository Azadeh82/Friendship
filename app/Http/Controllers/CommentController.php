<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use Illuminate\Support\Facades\Gate;


class CommentController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
 
        return view('comment/create' , compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|min:3|max:500',
            'tags' => 'required|min:3|max:50',
        ]);

        $comment = new Comment();

        $this->authorize('create', $comment);

        if (($request['image'])) {
 
            $comment->image = uploadImage($request);
        
        }

        $comment->content = $request->content;
        $comment->tags = $request->tags;


        $user = Auth::user();
        $comment->user_id = $user->id;
        $comment->message_id = $request->messageid; 
        
        $comment->save();
        
        return redirect()->route('home')->with('message', 'votre commentaire a bien été envoyé');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        $this->authorize('update', $comment);
        return view('comment.edit', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        $request->validate([
            'content' => 'required|min:3|max:500',
            'tags' => 'required|min:3|max:40',
        ]);

        if (($request['image'])) {
 
            $comment->image = uploadImage($request);
        
        }
             
        $comment->content = $request['content'];       
        $comment->tags = $request['tags'];
        $comment->save();

        return redirect()->route('home')->with('message', 'Comment a bien été modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $this->authorize('delete', $comment);
        $comment->delete();
        return redirect()->route('home')->with('message', 'Comment a bien été supprimé');

    }
}
