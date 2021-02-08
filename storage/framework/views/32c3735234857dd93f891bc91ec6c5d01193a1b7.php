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
            <?php for($i=1; $i < 25; $i++): ?> 
            <?php
                $url = "https://api.themoviedb.org/3/list/{$i}?api_key=21b13176f716967f59bee59b002e6819&language=pt-br";
                $listas = json_decode(file_get_contents($url));
            ?> 
            <?php $__currentLoopData = $listas->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           
            
            <div class="card">
                <div class="card-header">
                <a href="\filme\<?php echo e($perfil->id); ?>\<?php echo e($item->id); ?>"><?php echo e($item->title); ?></a>
                </div>

                    <div class="card-body">
                    <div class="col-md-3">
                    <img src="<?php echo e($item->poster_path); ?>"  width=60 height=40>
                    </div>
                    <div class="col-md-5">
                    <?php echo e($item->overview); ?>

                    </div>
                    </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endfor; ?>
        </div>
    </div>
</div>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\desafio\resources\views/filmes.blade.php ENDPATH**/ ?>