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

            <?php
            $url = "https://api.themoviedb.org/3/movie/{$id}?api_key=21b13176f716967f59bee59b002e6819";
            $filme = json_decode(file_get_contents($url));
            ?>

            <div class="card">
                <div class="card-header">
                    <?php echo e($filme->original_title); ?>

                </div>

                <div class="card-body">
                    <div class="col-md-3">
                        <img src="<?php echo e($filme->poster_path); ?>" width=480 height=220>
                    </div>
                    <div class="col-md-5">
                        <?php echo e($filme->overview); ?>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <?php
            $x = 0;
            $y = 0;
            $idfilme=0;
            ?>
            <?php $__currentLoopData = $perfil->filmes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $filme): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($filme->id_filme == $id): ?>
            <?php
            $x = 1;  
            $idfilme = $idfilme + $filme->id;         
            ?> 
                <?php if($filme->assistido == 1): ?>
                <?php
                $y=1;
                ?>
                <?php endif; ?>           
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php if($x == 1): ?>
            <div class="col-md-4">
            <?php if($y == 0): ?>
            <a href="\assist\<?php echo e($idfilme); ?>" class="btn btn-sm btn-primary">Marcar como assistido</a>
            <a href="\delete\<?php echo e($idfilme); ?>" class="btn btn-sm btn-primary">Remover de assistir mais tarde</a>
            <?php endif; ?>
            <?php if($y == 1): ?>
            <h1>Assistido</h1>
            <?php endif; ?>
            </div>
            <?php endif; ?>
            <?php if($x == 0): ?>
            <form method="POST" action="\filme\<?php echo e($perfil->id); ?>\<?php echo e($id); ?>">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="perfil_id" value="<?php echo e($perfil->id); ?>">
                <input type="hidden" name="id" value="<?php echo e($id); ?>">

                <button type="submit" class="btn btn-primary">
                    Add assistir mais tarde
                </button>

            </form>
            <?php endif; ?>            
            <a href="\filmes\<?php echo e($perfil->id); ?>" class="btn btn-sm btn-primary">Voltar</a>
        </div>
    </div>
</div>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\desafio\resources\views/filme.blade.php ENDPATH**/ ?>