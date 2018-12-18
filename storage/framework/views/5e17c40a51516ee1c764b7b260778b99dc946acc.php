<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <h1>About Music Player</h1>
        <p>A single page application using entirely with Laravel framework and MySql as DB.</p>
        <p>You can upload your favorite songs and they will be stored locally on your machine and DB.</p>
        <p>Soon will add playlists and search option...</p>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>