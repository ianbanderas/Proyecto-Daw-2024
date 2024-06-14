<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
    <title>Document</title>
</head>
<body>
    <a href="<?php echo e(route("main")); ?>" >home</a>
    <a href="<?php echo e(route("profile")); ?>" >profile</a>
    <a href="<?php echo e(route("out")); ?>" >log out</a>

        <?php if($prop == true): ?>
            <form action="<?php echo e(route('addPla')); ?>">
                <input type="hidden" name="idRes" value="<?php echo e($idRes); ?>"/>
                <input type="text" name="name"/>
                <input type="text" name="desc"/>
                <button>añadir</button>
            </form>
        <?php endif; ?>
        <?php $__currentLoopData = $platos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
        <p><?php echo e($item); ?></p>
        <a href="<?php echo e(route("verPlato", ["idPla"=>$item->idPla, "idRes"=>$idRes])); ?>" >ver plato</a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</body>
</html><?php /**PATH C:\Users\ian\Desktop\FoodLovers\resources\views/menu/index.blade.php ENDPATH**/ ?>