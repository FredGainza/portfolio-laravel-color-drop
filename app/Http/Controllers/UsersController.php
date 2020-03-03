<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UsersController extends Controller
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

    public function index()
    {
        $users = User::all();
        return view('users.index')->with('users',$users);
    }

    public function msg2players()
    {
        $users = Auth::user();
        $players = $users->players;
        $users->message2players = 0;
        $users->save();
        return view('player.index')->with('users', $users)
                                    ->with('players', $players);

    }

    public function newsletter()
    {
        $users = Auth::user();
        $players = $users->players;

        if ($users->newsletter == 1){
            $users->newsletter = 0;
            $users->save();
            return back()->with(['info' => 'Votre demande a bien été prise en compte.',
                                'info1' => 'Vous ne recevrez plus de mail vous informant que votre enfant vient de terminer une partie.']);

        } elseif ($users->newsletter == 0){
            return back()->with('info', 'Vous ne recevez déjà plus de mail après les parties de votre (vos) enfant(s).');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
        // return redirect()->route('users.index')->with('info', 'L\'utilisateur a bien été ajouté');
    }

       /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'email',
        ]);
        $user->name = $request->name;
        $user->email= $request->email;
        $user->message2players = $request->message2players;
        $user->newsletter = $request->newsletter;
        $user->save();
        return redirect()->route('users.index')->with('type', 'success')
                                                ->with('message', 'Les informations de ' .$user->name. ' ont bien été modifiées.');
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
            'name' => 'required|string|max:50',
            'email' => 'email',
            'password' => 'required|string',
        ]);
        $parent = new User;
        $parent->name = $request->name;
        $parent->email = $request->email;
        $parent->password = Hash::make($request->password);
        $parent->message2players = $request->message2players;
        $parent->newsletter = $request->newsletter;
        $parent->save();
        return redirect()->route('users.index')->with('type', 'success')
                                                ->with('message', 'L\'utilisateur ' .$parent->name. ' a bien été ajouté.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(user $user)
    {
        $players = User::find($user->id)->players;
        return view('users.show', compact('players', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $user->delete();
        $user = user::find($id);
        $name = $user->name;
        $user->delete();
        $users = User::all();
        return redirect()->route('users.index')->with('type', 'success')
                                                ->with('message', 'L\'utilisateur ' .$name. ' a bien été supprimé.');

    }

    public function liste()
    {
        $users = Auth::user();
        return view('user.mail')->with('users', $users);
    }

    public function up(Request $request)
    {
        $value = $request->all();
        $this->validate($request, [
            'name' => 'bail|required|between:5,20|alpha',
            'email' => 'bail|required|email',
        ]);
        $users = Auth::user();
        $users->name = $value['name'];
        $users->email = $value['email'];

        $users->save();
        $players = $users->players;

        return view('player.index')->with('players', $players)
                                    ->with('users', $users);

    }
}
