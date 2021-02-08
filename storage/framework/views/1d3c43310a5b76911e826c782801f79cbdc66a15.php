<?php $__env->startSection('content'); ?>
<?php if(auth()->guard()->guest()): ?>
<meta http-equiv="refresh" content="0; URL='\login'" />
<?php if(Route::has('register')): ?>
<meta http-equiv="refresh" content="0; URL='\login'" />
<?php endif; ?>
<?php else: ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="container">
            <a href="\filmes\<?php echo e($perfil->id); ?>" class="btn btn-sm btn-primary">Todos Filmes</a>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="\assistir\<?php echo e($perfil->id); ?>">Assistir Mais Tarde</a>
                </div>

                <div class="card-body">
                    <?php
                    $x = 0;
                    ?>
                    <?php $__currentLoopData = $perfil->filmes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $filme): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                    $url = "https://api.themoviedb.org/3/movie/{$filme->id_filme}?api_key=21b13176f716967f59bee59b002e6819";
                    $assistirmaistarde = json_decode(file_get_contents($url));
                    ?>
                    <?php if($filme->assistido == 0): ?>
                    <?php if($x < 5): ?> <img src="<?php echo e($assistirmaistarde->poster_path); ?>">
                        <a href="\filme\<?php echo e($perfil->id); ?>\<?php echo e($filme->id_filme); ?>">
                            <?php echo e($assistirmaistarde->original_title); ?>

                        </a>
                        <?php endif; ?>
                        <?php
                        $x = $x + 1;
                        ?>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <a href="\sugestoes\<?php echo e($perfil->id); ?>">Sugestões</a>
                </div>

                <div class="card-body">
                    <?php
                    $gen = 0;                 
                    ?>
                    <?php $__currentLoopData = $perfil->filmes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $filme): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                    $url = "https://api.themoviedb.org/3/movie/{$filme->id_filme}?api_key=21b13176f716967f59bee59b002e6819";
                    $item = json_decode(file_get_contents($url));
                    ?>
                    <?php $__currentLoopData = $item->genres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $genero): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($gen == 0): ?>
                    <?php echo e($genero->id); ?>

                    <?php $gen = 1 ?>
                    <?php endif; ?>
                    
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                        
                            
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <a href="\assistido\<?php echo e($perfil->id); ?>">Assista Novamente</a>
                </div>

                <div class="card-body">
                    <?php
                    $x = 0;
                    ?>
                    <?php $__currentLoopData = $perfil->filmes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $filme): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                    $url = "https://api.themoviedb.org/3/movie/{$filme->id_filme}?api_key=21b13176f716967f59bee59b002e6819";
                    $assistido = json_decode(file_get_contents($url));
                    ?>
                    <?php if($filme->assistido == 1): ?>
                    <?php if($x < 5): ?> <img src="<?php echo e($assistido->poster_path); ?>">
                        <a href="\filme\<?php echo e($perfil->id); ?>\<?php echo e($filme->id_filme); ?>">
                            <?php echo e($assistido->original_title); ?>

                        </a>
                        <?php endif; ?>
                        <?php
                        $x = $x + 1;
                        ?>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
            </div>

        </div>
    </div>
</div>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\desafio\resources\views/page.blade.php ENDPATH**/ ?>