@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-8">
                <h2>Welcome to the music player</h2>
                @if(count($music_list) > 0)
                    @if($chosenSong)
                        <h4>Now playing: <strong><?php echo $chosenSong; ?></strong></h4>
                        <audio preload="metadata" controls autoplay>
                            <source src="<?php echo asset("storage/myMusic").'/'.$chosenSong ?>" type="audio/mpeg">
                            Your browser does not support the audio element.
                    </audio>
                    @endif
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-xs-4">
                <h3>Recommended for you</h3>
                @if(count($music_list) > 0)
                    <?php $songPath = asset("storage/myMusic")?>
                    @foreach($music_list as $key => $song)
                        <?php $selectedSong = $song->song; ?>
                        <?php $currentSong = url("/now_playing/{$key}/{$selectedSong}"); ?>
                        <div class="row">
                            <ul>
                                <!--<li><a href="now_playing/{{ $key }}/{{ $song->song }}">{{$song->id.". ".$song->song}}</a></li>-->
                                <li><a href="<?php echo $currentSong; ?>">{{$song->id.". ".$song->song}}</a></li>
                            </ul>
                        </div>
                    @endforeach
                @else
                    <p>No songs found, please upload in the form below</p>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <h3>Upload song</h3>
                {!! Form::open(['action' => 'MusicController@store', 'method' => 'post', 'enctype' => 'multipart\form-data', 'files' => true]) !!}
                {{ csrf_field() }}
                {{ Form::label('name', 'Song Name:') }}
                <div class="form-group">
                    {{Form::text('song', null, array('class' => "form-control",'required' => ''))}}
                </div>
                <div class="form-group">
                    {{Form::file('music_file', array('required' => ''))}}
                </div>
                {{Form::submit('submit', ['class' => 'btn btn-primary'])}}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
