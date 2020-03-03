<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Models\Player;
use App\Models\User;

class PlayersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function var()
    {
        $players = Player::all();

        return view('var.index')->with('players', $players);
    }

    public function list()
    {
        $players = Player::where('id', $_GET['id'])->first();
        return view('gametest')->with('players', $players);
    }

    public function update(Request $request)
    {
        $value = $request->all();
        $player = Player::where('id', $_GET['id'])->first();
        $player->name = $value['name'];
        $users = User::All();
        $players = Player::all();
        return true;
    }

    public function liste()
    {
        $player = Player::where('id', $_GET['id'])->first();
        $player->delete();
        $players = Player::all();
        return view('var.index')->with('players', $players);
    }

    public function index()
    {
        $players = Player::all();
        $users = User::all();
        return view('players.index')->with('players', $players)
                                        ->with('users', $users);
    }

    public function add(Request $request)
    {
        $values = $request->all();
        $rules = [
            'name' => 'string',
        ];
       $player = new Player();
       $player->name = $values['name'];
       $player->save();
       $players = Player::all();
       return view('var.index')->with('players', $players);
    }

    public function create(Request $request)
    {
        $players = Player::all();
        $users = User::all();
        return view('players.create',  compact('users', 'players'));
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
            'user_id' => 'required',
            'difficulty' => 'required',
        ]);
        $player = new Player;
        $player->name = $request->name;
        $player->user_id = $request->user_id;
        $player->difficulty = $request->difficulty;
        $player->save();
        $name = $player->name;
        $players = Player::all();
        $users = User::all();
        return redirect()->route('players.index')->with('type', 'success')
                                                ->with('message', 'Le joueur '.$name.' a bien été ajouté.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Player $player)
    {
        $user = $player->user;
        return view('players.show', compact('user', 'player'));
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Player $player)
    {
        $users = User::all();
        return view('players.edit', compact('users', 'player'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function maj(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'user_id' => 'required|integer',
            'difficulty' => 'string',
        ]);
        $player = Player::find($id);
        $player->name = $request->name;
        $player->user_id= $request->user_id;
        $player->difficulty = $request->difficulty;
        $player->save();
        $players = Player::all();
        $users = User::all();
        return redirect()->route('players.index')->with('type', 'success')
                                                ->with('message', 'Les informations du joueur '.$player->name.' ont bien été modifiées.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $player = player::find($id);
        $name = $player->name;
        $player->delete();
        $players = Player::all();
        $users = User::all();
        return redirect()->route('players.index')->with('type', 'success')
                                                ->with('message', 'Le joueur '.$name.' a bien été supprimé.');
        // return view('players.index', compact('players', 'users'));
    }
}

