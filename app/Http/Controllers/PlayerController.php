<?php

namespace App\Http\Controllers;

use App\Event;
use App\Player;
use Illuminate\Http\Request;
use App\Http\Resources\Player as PlayerResource;


class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get articles
        $players = Player::all();

        //return collection of players as a resource
        return PlayerResource::collection($players);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $player = new Player();

        $player->id = $request->id;
        $player->event_id = $request->event_id;
        $player->name = $request->name;

        $player->save();
        
        return new PlayerResource($player);

    }

    public function show($id)
    {
        $player = Player::findOrFail($id);

        return new PlayerResource($player);
    }

    public function update(Request $request, $id){

        $player = Player::findOrFail($id);

        $player->shuttlecocks = $request->shuttlecocks;
        $player->totalFee = $request->totalFee;

        $player->save();

        return new PlayerResource($player);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $player = Player::findOrFail($id);

        if($player->delete()){
            return new PlayerResource($player);
        }
    }

    public function showPlayers($id){
        $event = Event::findOrFail($id);

        $players = $event->players;

        return PlayerResource::collection($players);

    }
}
