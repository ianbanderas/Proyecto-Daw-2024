<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="<?php echo e(route("out")); ?>" >log out</a>
    <a href="<?php echo e(route("main")); ?>" >home</a>
    
    <form action="<?php echo e(route('addRes')); ?>">
        <select name="formCiu">
        <?php $__currentLoopData = $ciudad; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($item->idCiu); ?>">
                <?php echo e($item["nombre"]); ?>

            </option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
        </select>

        <input name="formRes" type="text" />
        <button>enviar</button>
    </form>

    <p>Nombre Usuario:   <?php echo e(Auth::user()->nombre); ?></p>
    <form action="<?php echo e(route('changePass')); ?>"> 
        <input name="changePass" type="text" placeholder="Nueva Contraseña"/>
        <button>enviar</button>
    </form>

     <?php $__currentLoopData = $restaurante; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
        <p><?php echo e($item); ?></p>
        <a href="<?php echo e(route("borrar",$item->idRes)); ?>">Borrar</a>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</body>
</html><?php /**PATH C:\Users\ian\Desktop\FoodLovers\resources\views/profile/index.blade.php ENDPATH**/ ?>