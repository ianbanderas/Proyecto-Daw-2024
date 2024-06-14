<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<header>
     <div class="separar">
    <a class="button_a" id="logOut" href="<?php echo e(route("cambiarIdioma")); ?>"><p><?php echo e(__("message.language")); ?></p></a>
    <a class="button_a" href="<?php echo e(route("out")); ?>" ><p><?php echo e(__("message.logOut")); ?></p></a>
     </div>
   
   
</header>
<body>
<section class="flex-container">
  
    <div class="br">

    <label for="addRes" class="inline-flex items-center font-semibold"> <?php echo e(__("message.resPass")); ?></label>
    <form action="<?php echo e(route('changePass')); ?>"> 
        <input name="changePass" type="text" placeholder=" <?php echo e(__("message.newpass")); ?>"/>
        <button><?php echo e(__("message.send")); ?></button>
    </form>
    </div>
    <?php $__currentLoopData = $restaurante; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
    <div class="boxperfil">
    <h4 class="sub">
    <?php echo e(__("message.Name")); ?>

    </h4>
       <h4 class="sub">
        <?php echo e(__("message.category")); ?>

    </h4>
     <h4 class="sub">
        <?php echo e(__("message.city")); ?>

    </h4>
    <h4>
        <?php echo e($item->nombre); ?>

    </h4>
 
    <h4>
        <?php echo e($item->categoria); ?>

    </h4>
 
    <h4>
    <?php $__currentLoopData = $ciudad; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($item2->idCiu == $item->idCiu): ?>
            <?php echo e($item2->nombre); ?>    
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </h4> 
  <h4>
        <a href="<?php echo e(route("borrar",$item->idRes)); ?>">
    <?php echo e(__("message.delete")); ?></a>
    
        <a href="<?php echo e(route("menu", $item->idRes)); ?>" ><?php echo e(__("message.menu")); ?></a>
    </h4>
    </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </section>

</body>
 <footer>
        Ián Banderas Tomillo
    </footer>
</html><?php /**PATH C:\xampp\htdocs\FoodLovers\resources\views/profile/index.blade.php ENDPATH**/ ?>