<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;


class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function account()
    {
        $user = Auth::user();
        return view('user/account', compact('user'));
    }


    /**
     * Show the form for editing the specified resource.
     *

     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = Auth::user();
        return view('user/edit', compact('user'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|min:3|max:40',
            'prenom' => 'required|min:3|max:40',
        ]);

        $user = Auth::user();

        if (($request['image'])) {
 
            $user->image = uploadImage($request);
        
        }

        
        $user->nom = $validated['nom'];
        $user->prenom = $validated['prenom'];
        $user->save();

        return redirect()->route('account')->with('message', 'Le compte a bien été modifié');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function resetpassword(Request $request)
    {
        $request->validate([
            'password' => 'required',    //mot de passe actuel
            'newpassword' => ['required', 'confirmed', Password::min(8)
                ->letters()
                ->mixedCase()
                ->numbers()
                ->symbols()]
        ]);


        $user = Auth::user();    //recuperer les infos et mot de passe existant

        if (Hash::check($request->input('password'), $user->password))  //si actuel = saisi
        {
            if ($request->input('newpassword') !== $request->input('password')) {   //si nouveau != actuel

                $user->password = Hash::make($request->input('newpassword'));    //hasher nouveau mot de passe

                $user->save();

                return redirect()->route('account')->with('message', 'le mot de passe a bien été modifié');
            } else {

                return redirect()->back()->withErrors(['erreur' => 'ancien et nouveau mot de passe identiques ']);
            }
        } else {

            return redirect()->back()->withErrors(['erreur' => 'mot de passe actuel n\'est pas correct ']);
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile(User $user)
    {
        //$user->load('messages.comments.user');return view('user/profile', compact('user'))

        $messages = Message::where('user_id', '=', $user->id)->with('comments.user')->latest()->paginate(5);

        return view('user/profile', compact('user', 'messages'));
    }

}
