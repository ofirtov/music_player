<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\File;
use Illuminate\filesystem;
use Illuminate\Http\UploadedFile;
use Illuminate\View;
use App\PostMusic;
use App\SongObj;
use Illuminate\Support\Facades\Redirect;
//use DB;


class MusicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Welcome to the Music Player!';
        //Option 1 - using 'compact'
        //return view('player', compact('title'));

        // Option 2 - Using 'With'
        $music_list = PostMusic::all();
        $currentPath = Route::getFacadeRoot()->current()->uri();
        $chosenSong = '';
        $defaultSong = $music_list[0]->song;
        $route = Route::current();
        $songArray = [];
        $dbId;
        foreach($music_list as $key => $songName) {
            $dbId = $music_list[$key]->id;
            //$songArray[] = new SongObj($dbId, $songName, $key);
            $songArray[] = (object)array('dbId' =>$dbId, 'songName' => $songName, 'id' => $key);
        } 
        if($currentPath == 'player'){
            return view('player')->with(['music_list' => $music_list, 'defaultSong' => $defaultSong, 'path' => $currentPath, 'route' => $route, 'songArray' => $songArray, 'chosenSong' => $chosenSong]);
        }
        else {
            return $this->now_playing(3, 'Backstreet Boys - As Long As You Love Me.mp3');
        }
    }

    public function all_songs() {
        $music_list = PostMusic::all();
        $chosenSong = '';
        $defaultSong = $music_list[0]->song;
        return view('all_songs')->with(['music_list' => $music_list, 'defaultSong' => $defaultSong, 'chosenSong' => $chosenSong]);
    }

    public function aboutpage() {
        return view('about');
    }

    public function now_playing($id, $name/*, Request $request*/) {
        $music_list = PostMusic::all();
        // Assigning the user song choice to a variable $chosenSong
        $chosenSong = $name;
        $defaultSong = '';
        // Assigning all the songs in DB to a variable
        $songNameDb = DB::table('music_tb')->where('id', $id)->value('song');
        return view('now_playing')->with(['music_list' => $music_list, 'id' => $id, 'chosenSong' => $chosenSong, 'song' => $songNameDb, 'defaultSong' => $defaultSong]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post_music = new PostMusic;
        $music_list = PostMusic::all();
        if ($request->hasFile('music_file')) {
            // $request->input and $request->file gets the same file to be upload
            //$songName = $request->input('song');
            $file = $request->file('music_file');
            $filename = $file->getClientOriginalName();
            // The root storage folder in 'filesystem.php' is 'storage/app'!
            $file->storeAs('/public/myMusic', $filename);
            $file_path = 'public/storage/myMusic'.'/'.$filename;
            //$file_path = url('storage\app\public\myMusic\\').$filename;
            $defaultSong = $music_list[0]->song;
            $post_music->song = $filename;
            $post_music->music_file = $file_path;
        }
        $post_music->save();
        Session::flash('success', 'Upload with success!');
        $music_list = PostMusic::all();
        return view('player')->with(['music_list' => $music_list, 'defaultSong' => $defaultSong]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $music_list = PostMusic::all();
        $chosenSong = $music_list($id)->song;
        $song = $music_list->song;
        foreach($song as $songName){
            if($songName == $chosenSong){
                return view('player')->with('chosenSong', $chosenSong);
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
