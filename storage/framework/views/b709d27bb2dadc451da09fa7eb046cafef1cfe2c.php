<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <h1>Songs List</h1>
        <div class="row">
            <div class="col-xs-6">
                <?php if(count($music_list) > 0): ?>
                    <?php $songPath = asset("storage/myMusic")?>
                    <?php $__currentLoopData = $music_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $song): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $selectedSong = $song->song; ?>
                        <?php $currentSong = url("/now_playing/{$key}/{$selectedSong}"); ?>
                        <div class="row">
                            <ul>
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
        <div class="col-xs-6">
                <h3>Upload song</h3>
                <?php echo Form::open(['action' => 'MusicController@store', 'method' => 'post', 'enctype' => 'multipart\form-data', 'files' => true]); ?>

                <?php echo csrf_field(); ?>

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