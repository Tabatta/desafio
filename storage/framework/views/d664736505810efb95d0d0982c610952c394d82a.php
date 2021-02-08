<?php $__env->startSection('content'); ?>
<?php if(auth()->guard()->guest()): ?>
<meta http-equiv="refresh" content="0; URL='\login'" />
<?php if(Route::has('register')): ?>
<meta http-equiv="refresh" content="0; URL='\login'" />
<?php endif; ?>
<?php else: ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <?php $__currentLoopData = $perfil->filmes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $filme): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
            $url = "https://api.themoviedb.org/3/movie/{$filme->id_filme}?api_key=21b13176f716967f59bee59b002e6819";
            $assistirmaistarde = json_decode(file_get_contents($url));
            ?>
            <?php if($filme->assistido == 1): ?>

            <div class="card">
                <div class="card-header">
                    <a href="\filme\<?php echo e($perfil->id); ?>\<?php echo e($filme->id_filme); ?>">
                        <?php echo e($assistirmaistarde->original_title); ?></a>
                </div>

                <div class="card-body">
                    <div class="col-md-3">
                        <img src="<?php echo e($assistirmaistarde->poster_path); ?>" width=480 height=220>
                    </div>
                    <div class="col-md-5">
                        <?php echo e($filme->overview); ?>

                    </div>
                </div>
            </div>

            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\desafio\resources\views/assistido.blade.php ENDPATH**/ ?>