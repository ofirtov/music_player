public function store(Request $request)
{
/*

if($request->hasFile('music_file')){
$fileName = $request->file('music_file')->getClientOriginalName();
$extension = $request->file('music_file')->getClientOriginalExtension();
}
$path = $request->file('music_file')->storeAs('public/myMusic', $fileName);
return redirect('/player')->with('success', 'Song uploaded');
*/
//$url = route('player');

$post_music = new PostMusic;

//$post_music->song = $request->song;
if ($request->hasFile('music_file')) {
// $request->input and $request->file gets the same file to be upload
//$music_file = $request->input('music_file');
$songName = $request->input('song');
$file = $request->file('music_file');
$filename = $file->getClientOriginalName();
//$post_music->filename = $filename;
$new_location = public_path();
//$music_file->move_uploaded_file($songName, $new_location);
$file->storeAs('myMusic', 'new_song');
//$file->move($new_location, $filename);
$post_music->song = $filename;
/* $music_file = Input::file('featured_mp3');
if(isset($music_file)){
$filename = $music_file->getClientOriginalName();
$location = public_path('audio/');
$music_file->move($location,$filename);
$posts_music->mp3 = $filename; }*/
/*
//Storage::putFileAs($location, new File('/path/to/photo'), $songName);
echo $location;
dump($location);

//$post_music->location = public_path('myMusic/');

$path = $request->file('music_file')->store('myMusic');
$url = route('/myMusic');
//Storage::putFile('myMusic', new File('resources/songs/Backstreet Boys - I Want It That Way.mp3'));

// 'move' - (Directory name, File name)
//$post_music->move($location, $songName);

//$post_music->music_file = $filename;
*/
}
$post_music->save();
Session::flash('success', 'Upload with success!');
return view('player');

//return route('player');

//return redirect()->route('player');

//return redirect()->route('posts-musics.show', $post_music->id);

/*
$music_file = Input::file('featured_mp3');
if(isset($music_file)){
$filename = $music_file->getClientOriginalName();
$location = public_path('audio/');
$music_file->move($location,$filename);
$post_music->music_file = $filename; }
*/
}


/**
* Display the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/