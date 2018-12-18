<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-8">
                <h2>Welcome to the music player</h2>
                <?php if(count($music_list) > 0): ?>
                    <?php if($chosenSong): ?>
                        <h4>Now playing: <strong><?php echo $chosenSong; ?></strong></h4>
                        <audio preload="metadata" controls autoplay>
                            <source src="<?php echo asset("storage/myMusic").'/'.$chosenSong ?>" type="audio/mpeg">
                            Your browser does not support the audio element.
                    </audio>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-4">
                <h3>Recommended for you</h3>
                <?php if(count($music_list) > 0): ?>
                    <?php $songPath = asset("storage/myMusic")?>
                    <?php $__currentLoopData = $music_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $song): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $selectedSong = $song->song; ?>
                        <?php $currentSong = url("/now_playing/{$key}/{$selectedSong}"); ?>
                        <div class="row">
                            <ul>
                                <!--<li><a href="now_playing/<?php echo e($key); ?>/<?php echo e($song->song); ?>"><?php echo e($song->id.". ".$song->song); ?></a></li>-->
                                <li><a href="<?php echo $currentSong; ?>"><?php echo e($song->id.". ".$song->song); ?></a></li>
                            </ul>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <p>No songs found, please upload in the form below</p>
                <?php endif; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <h3>Upload song</h3>
                <?php echo Form::open(['action' => 'MusicController@store', 'method' => 'post', 'enctype' => 'multipart\form-data', 'files' => true]); ?>

                <?php echo e(csrf_field()); ?>

                <?php echo e(Form::label('name', 'Song Name:')); ?>

                <div class="form-group">
                    <?php echo e(Form::text('song', null, array('class' => "form-control",'required' => ''))); ?>

                </div>
                <div class="form-group">
                    <?php echo e(Form::file('music_file', array('required' => ''))); ?>

                </div>
                <?php echo e(Form::submit('submit', ['class' => 'btn btn-primary'])); ?>

                <?php echo Form::close(); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>