<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostMusic extends Model
{
    // Table Name
    protected $table = 'music_tb';
    // Primary Key
    protected $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;
    // Song name
    //public $song = 'song';
}
