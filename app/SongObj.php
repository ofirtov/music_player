<?php 
namespace App;
class SongObj {
    $songData = new stdClass();
    function __construct($dbId, $songName, $id){
    $songData->dbId = $this->dbId;
    $songData->songName = $this->songName;
    $songData->id = $this->id;
    return $songData;
    }
}
?>

