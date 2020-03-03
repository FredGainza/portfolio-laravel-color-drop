<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Level;

class LevelsController extends Controller
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
        $levels = Level::all();
        return view('levels.index')->with('levels',$levels);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('levels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lev = new Level;
        $lev->level_name = $request->levelcreate;
        $lev->two_stars = $request->two_stars;
        $lev->three_stars = $request->three_stars;
        $lev->save();

        $levels = Level::all();
        return redirect()->route('levels.index')->with('type', 'success')
                                                ->with('message', 'Le niveau ' .$lev->level_name. ' a bien été ajouté.');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(level $level)
    {
        return view('levels.edit', compact('level'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, level $level)
    {
        $request->validate([
            'level_name' => 'required|string|max:50',
            'two_stars' => 'required|string',
            'three_stars' => 'required|string',
        ]);

        // dd($level);
        $level->level_name = $request->level_name;
        $level->two_stars = $request->two_stars;
        $level->three_stars = $request->three_stars;

        $level->save();
        return redirect()->route('levels.index')->with('type', 'success')
                                                ->with('message', 'Les informations du ' .$level->level_name. ' ont bien été modifiées');

    }

    public function destroy($id)
    {
        $level =Level::where('id',$id)->first();

        if ($level != null) {
            $level->delete();
            return redirect()->route('levels.index')->with('type', 'success')
                                                ->with('message', 'Le niveau ' .$level->level_name. ' a bien été supprimé');
        }

        return redirect()->route('levels.index')->with('type', 'danger')
                                                ->with('message', 'Attention ! Il y a un problème avec la suppression du niveau '.$level->level_name. ' Merci de vérifier.');
    }
}

