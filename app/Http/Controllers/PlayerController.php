<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;
use App\Models\User;
use App\Models\Game;
use App\Models\Level;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PlayerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function pasConnect()
    {
        if (!(Auth::user())){
            return redirect()->route('/')->with('info', 'Il faut être connecté pour accéder à cette page.');
        }
    }

    public function index1()
    {
        $users = Auth::user();
        $players = $users->players;

        return view('player.index')->with('players', $players)
                                    ->with('users', $users);
    }

    public function index2()
    {
        $users = Auth::user();
        $players = $users->players;

        return view('player.select')->with('players', $players)
                                    ->with('users', $users);
    }

    public function list()
    {
        $users = Auth::user();
        $players = Player::where('id', $_GET['id'])->get();
        return view('player.edit')->with('players', $players)
                                    ->with('users', $users);
    }

    public function up(Request $request)
    {
        $value = $request->all();
        $this->validate($request, [
            'name' => 'bail|required|between:2,20|alpha',
        ]);
        $users = Auth::user();
        $player = Player::where('id', $_GET['id'])->first();
        if ($value['name'] != $player->name || $value['difficulty'] != $player->difficulty){
            $player->name = $value['name'];
            $player->difficulty = $value['difficulty'];
            $player->save();
            return redirect()->route('pindex')->with('info', 'Les informations de  '.$player->name. ' ont  bien été modifiées.');
        } else {
            $players = $users->players;
            return view('player.index')->with('players', $players)
                                        ->with('users', $users);
        }
    }

    public function liste()
    {
        $users = Auth::user();
        $players = Player::where('id', $_GET['id'])->first();
        $players->delete();

        $players = $users->players;
        return view('player.index')->with('players', $players)
                                    ->with('users', $users);
    }

    public function index3()
    {
        $users = Auth::user();
        return view('player.add')->with('users', $users);
    }

    public function add(Request $request)
    {
        $values = $request->all();
        $this->validate($request, [
            'name' => 'bail|required|between:2,20|alpha',
        ]);
        $users = Auth::user();;
        $player = new Player();
        $player->name = $values['name'];
        $player->user_id = $users->id;
        $player->difficulty = $values['difficulty'];
        $player->save();
        $players = $users->players;
        return redirect()->route('pindex')->with('info', 'Vous avez ajouté '.$player->name. ' comme nouveau joueur.');
    }

    public function score()
    {
        $users = Auth::user();
        $player = Player::find($_GET['id']);
        $games = Game::where('player_id', $_GET['id'])->get();
        return view('player.score')
                            ->with('player', $player)
                            ->with('games', $games)
                            ->with('users', $users);

    }

    public function resume()
    {
        $user = Auth::user();
        $player = Player::find($_GET['id']);
        $games = Game::where('player_id', $_GET['id'])->get();
        $durees = Game::where('player_id', $_GET['id'])->get()
                    ->where('level_id', 10);
        if (isset($games)){
            $dureeMin = Game::where('player_id', $_GET['id'])->get()->min('duree_game');
            $partieMin = Game::where('duree_game', $dureeMin)->select('numGame')->distinct()->get();
        }
        return view('player.resume')->with('player', $player)
                                    ->with('games', $games)
                                    ->with('user', $user)
                                    ->with('durees', $durees)
                                    ->with('dureeMin', $dureeMin)
                                    ->with('partieMin', $partieMin);
    }

    public function select()
    {
        $levels = Level::all();
        $player = Player::find($_GET['id']);
        return view('games.index', compact('player', 'levels'));
    }

    public function index4()
    {
        $users = Auth::user();
        return view('user.adds')->with('users', $users);
    }

    public function adds(Request $request)
    {
        $values = $request->all();
        $this->validate($request, [
            'name' => 'bail|required|between:2,20|alpha',
        ]);
        $users = Auth::user();
        $player = new Player();
        $player->name = $values['name'];
        $player->user_id = $users->id;
        $player->save();
        $players = Player::where('user_id', $users->id)->get();
        if (isset($_POST['add'])) {
            return view('user.adds')->with('players', $players)
                                    ->with('users', $users);

        } elseif (isset($_POST['continue'])) {
            return redirect()->route('games')->with('players', $players)
                                        ->with('users', $users);
        }
    }
}
