<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
    <title>Document</title>
</head>
<header>
    <a href="<?php echo e(route("profile")); ?>" >profile</a>
    <a href="<?php echo e(route("out")); ?>" >log out</a>
</header>
<body>
    
    <section class="flex-container">

    <?php $__currentLoopData = $restaurante; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
    <div class="box">
        <?php echo e($item); ?>

        <a href="<?php echo e(route("menu", $item->idRes)); ?>" >menu</a>
    </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </section>
   
    <footer>
        Ián Banderas Tomillo
    </footer>
</body>
    
</html><?php /**PATH C:\Users\ian\Desktop\FoodLovers\resources\views/restaurante/main.blade.php ENDPATH**/ ?>