@extends('layouts.app')
@section('content')
    <h1>Upload song to DB</h1>
    <div class="row">
        <div class="col-xs-12">
            <h3>Upload song</h3>
            {!! Form::open(['action' => 'MusicController@store', 'method' => 'post', 'enctype' => 'multipart\form-data', 'files' => true]) !!}
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
@endsection