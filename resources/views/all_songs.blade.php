@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <h1>Songs List</h1>
        <div class="row">
            <div class="col-xs-6">
                @if(count($music_list) > 0)
                    <?php $songPath = asset("storage/myMusic")?>
                    @foreach($music_list as $key => $song)
                        <?php $selectedSong = $song->song; ?>
                        <?php $currentSong = url("/now_playing/{$key}/{$selectedSong}"); ?>
                        <div class="row">
                            <ul>
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
        <div class="col-xs-6">
                <h3>Upload song</h3>
                {!! Form::open(['action' => 'MusicController@store', 'method' => 'post', 'enctype' => 'multipart\form-data', 'files' => true]) !!}
                {!! csrf_field() !!}
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