<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-xs-8">
                <h2>Welcome to the music player</h2>
                <?php if(count($music_list) > 0): ?>
                    <?php if($defaultSong): ?>
                        <h4>Now playing <?php //echo $music_list[22] ?></h4>
                        <h4>Now playing <?php echo asset("storage/myMusic").'/'.$defaultSong; ?></h4>
                    <?php else: ?>
                        <h4>Now playing <?php //echo asset("storage/myMusic").'/'.$chosenSong; ?></h4>
                    <?php endif; ?>
                        <audio preload="metadata" controls>
                                <source src="<?php //echo asset("storage/myMusic").'/'.$music_list[20]->song ?>" type="audio/mpeg">
                                <source src="<?php echo asset("storage/myMusic").'/'.$defaultSong ?>" type="audio/mpeg">
                                <source src="<?php //echo asset("storage/myMusic").'/'.$chosenSong;  ?>" type="audio/mpeg">
                            Your browser does not support the audio element.
                    </audio>
                <?php endif; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-4">
                <h3>Recommended for you</h3>
                <?php if(count($music_list) > 0): ?>
                    <?php $songPath = asset("storage/myMusic")?>
                    <?php $__currentLoopData = $music_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $song): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="row">
                            <ul>
                                <li><a href="player/<?php echo e($song->id); ?>/<?php echo e($song->song); ?>"><?php echo e($song->id.". ".$song->song); ?></a></li>
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