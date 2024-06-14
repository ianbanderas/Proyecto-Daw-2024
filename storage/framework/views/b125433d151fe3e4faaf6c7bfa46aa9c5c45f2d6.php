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
    <a class="button_a" href="<?php echo e(route('main')); ?>">
        <p><?php echo e(__('message.home')); ?></p>
    </a>

    <div class="myImageNav"></div>

    <div class="separar">
        <a class="button_a" id="logOut" href="<?php echo e(route('cambiarIdioma')); ?>">
            <p><?php echo e(__('message.language')); ?></p>
        </a>
        <a class="button_a" href="<?php echo e(route('out')); ?>">
            <p><?php echo e(__('message.logOut')); ?></p>
        </a>
    </div>


</header>

<body>
    <section class="start">
        <div class="br">
            <label for="addRes" class="inline-flex items-center font-semibold"> <?php echo e(__("message.addPla")); ?></label>
            <form action="<?php echo e(route('addPla')); ?>" name="addPla">
                <input type="hidden" name="idRes" value="<?php echo e($idRes); ?>" />
                <input type="text" name="name" placeholder="<?php echo e(__("message.Name")); ?>" />
                <input type="text" name="desc" placeholder="<?php echo e(__("message.Desc")); ?>" />
                <input type="text" name="com" placeholder="<?php echo e(__("message.Comment")); ?>" />
                <input type="number" min=0 max=10 name="val" placeholder="<?php echo e(__("message.val")); ?>" />
                <button><?php echo e(__("message.add")); ?></button>
            </form>
        </div>

        <?php $__currentLoopData = $platos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="box">
        <table>
            <tr>
                <th> <?php echo e(__("message.Name")); ?> </th>
                <th> <?php echo e(__("message.Desc")); ?> </th>
            </tr>
            <tr>
                <td> <?php echo e($item->nombre); ?> </td>
                <td>  <?php echo e($item->descripcion); ?> </td>
            </tr>
            <tr>
                <td colspan="2"> 
                    <a href="<?php echo e(route("verPlato", ["idPla"=>$item->idPla, "idRes"=>$idRes])); ?>" ><?php echo e(__("message.see")); ?></a>
                </td>
            </tr>
        </table>

        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php if( count($platos) == 0): ?>
            <h2>No hay platos</h2>
        <?php endif; ?>
        <div class="box2">
            <?php echo e($platos->links()); ?>

        </div>
    </section>
</body>

<footer>
    Ián Banderas Tomillo
</footer>

</html>
<?php /**PATH C:\xampp\htdocs\FoodLovers\resources\views/menu/index.blade.php ENDPATH**/ ?>