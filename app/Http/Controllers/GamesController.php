<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Level;
use App\Models\Player;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Game;
use Illuminate\Support\Facades\Mail;
use App\Mail\Game as Gamemail;
use App\Mail\Game as GameParty;


class GamesController extends Controller
{
    public function invit()
    {
        $userInvit=User::find(1);
        $userInvit = Auth::user();
        $player = Player::find(1);
        $levels = Level::all();
        return view('games.index', compact('player', 'levels'));
    }

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index($id)
    {
        $user = Auth::user();
        $levels = Level::all();
        $player = $user->players;
        return view('games.index', compact('players', 'levels'));
    }

    public function score()
    {
        $users = Auth::user();
        // $players = $users->players;
        $playerId = $_COOKIE["player_id"];
        $playerDifficulty = $_COOKIE["player_difficulty"];
        $player = Player::find($playerId);
        $scoreTotal = $_COOKIE['scoreTotal'];

        if(isset($scoreTotal) && $scoreTotal !== 0){
            $player = Player::find($playerId);
            $player->score = $player->score + $scoreTotal;
            $player->nbGames = $player->nbGames + 1;
            $player->save();
        }

        $gameTpsTotal = 0;
        for ($i=1; $i<=10; $i++){
            $gameTpsTotal += $_COOKIE["temps".$i];;
        }

        for ($i=1; $i<=10; $i++){
            $game = new Game();
            $game->player_id = $playerId;
            $game->difficulty = $playerDifficulty;
            $game->numGame = $player->nbGames;
            $game->level_id = $i;
            $game->score_level = $_COOKIE["score".$i];
            $game->duree_level = $_COOKIE["temps".$i];
            $game->score_game =  $_COOKIE['scoreTotal'];
            $game->duree_game = $gameTpsTotal;
            $game->save();
        }

        if($player->id == 1){
            return view('welcome');
        } else{
            if ($users->newsletter == 1){
                // Transfert de l'email
                $title = 'Une partie vient d\'être réalisée';
                $contentEnfant = $player->name;
                $contentParent = $users->name;
                $score = $_COOKIE['scoreTotal'];
                if ($gameTpsTotal >= 60){
                    $min = floor($gameTpsTotal/60);
                    $s = $gameTpsTotal % 60;
                    $temps = $min. ' minutes et '. $s. ' secondes';
                } else{
                    $temps = $gameTpsTotal. ' secondes';
                }
                $min = floor($gameTpsTotal/60);
                $s = $gameTpsTotal % 60;
                $dif = $playerDifficulty;
                $mail = $users->email;
                $mailGood = trim($mail);

                $_SESSION['info'] = 'Un email a été envoyé !';
                Mail::to($mailGood)->send(new GameParty($title, $contentParent, $contentEnfant, $score, $temps, $dif));

                return redirect()->route('pindex')->with(['info' => 'Bravo '.$player->name. ' pour ce nouveau jeu !!',
                                                        'info1' => 'La partie a été sauvegardée et nous vous avons envoyé un email récapitulatif.']);

            }elseif ($users->newsletter == 0){

                return redirect()->route('pindex')->with(['info' => 'Bravo '.$player->name. ' pour ce nouveau jeu !!',
                                                        'info1' => 'La partie a bien été sauvegardée.']);
            }
        }
    }

    public function selectPlayer()
    {
        $player = Player::where('id', $_GET['id']);
        return view('games.index', compact('player'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function show(game $game)
    {
        $players = Game::find($game->id)->players;
        return view('users.show', compact('players', 'user'));
    }

    public function index1($name = null)
    {
        $query = $name ? Player::whereName($name)->firstOrFail()->games() : Game::query();
        $games = $query->oldest('id')->get();
        // $games = Game::all();
        $users = User::all();
        $players = Player::all();
        $nbParties = count($games)/10;
        for ($i=0;  $i<$nbParties; $i++){
            $partie = Game::find($i*10+5);
            $player = $partie['player_id'];
            $user = User::find($player['user_id']);
        }
        return view('games.index1', compact('games', 'users', 'players', 'name'));
    }

    public function destroy($id)
    {

        if ($_POST['_selec'] == 0){
            $games = Game::all();
        } else {
            $player=Player::find($_POST['_playerId']);
            $games=Game::where('player_id', $_POST['_playerId'])->get();
        }
        // dd($games);
        // dd($games[$id*10+5]['id']);
        for($i=0; $i<10; $i++){
            $x = ($id)*10 + $i;
            $games[$x]->delete();
        }
        $x=$id+1;

        $score=$games[$id*10+5]['score_game'];
        if ($_POST['_selec'] == 0){
            $player=Player::find($games[$id*10+5]['player_id']);
        }

        $name = $player->name;
        $player->nbGames--;
        $player->score -= $score;
        $player->save();

        return back()->with('type', 'success')
                    ->with('message', 'La partie ' .$x. ' du joueur ' .$name. ' a bien été supprimée, et ses statistiques ont été mises à jour.');
    }
}
