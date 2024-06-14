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
    <section class="flex-container">
        <?php if(isset($mensaje)): ?>
        <script>
            alert("<?php echo e(__('message.sorry')); ?>");
            location.href = 'http://localhost:8000/';
        </script>
        
        <?php endif; ?>


    <form method="post" action="<?php echo e(route('cat')); ?>">
        <?php echo csrf_field(); ?>
        <select name="cat">
            <?php $__currentLoopData = $cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option>
                <?php echo e($item); ?>

            </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <button><?php echo e(__('message.find')); ?></button>
    </form>

    <form method="post" action="<?php echo e(route('ciu')); ?>">
        <?php echo csrf_field(); ?>
        <select name="ciudad">
            <?php $__currentLoopData = $ciudad; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($item->idCiu); ?>">
                <?php echo e($item->nombre); ?>

            </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <button><?php echo e(__('message.find')); ?></button>
    </form>

        <div class="box">
            <table>
                <tr>
                    <th><?php echo e(__('message.Name')); ?></th>
                    <th><?php echo e(__('message.category')); ?></th>
                    <th><?php echo e(__('message.city')); ?></th>
                    <th><?php echo e(__('message.delete')); ?></th>
                    <th><?php echo e(__('message.menu')); ?></th>
                </tr>

                <?php $__currentLoopData = $restaurante; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td>
                        <?php echo e($item->nombre); ?>

                    </td>

                    <td>
                        <?php echo e($item->categoria); ?>

                    </td>

                    <td>
                        <?php $__currentLoopData = $ciudad; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($item2->idCiu == $item->idCiu): ?>
                        <?php echo e($item2->nombre); ?>

                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </td>

                    <td class="enlace">
                        <a href="<?php echo e(route('borrar', $item->idRes)); ?>"><?php echo e(__('message.delete')); ?></a>
                    </td>

                    <td class="enlace">
                        <a href="<?php echo e(route('menu', $item->idRes)); ?>"><?php echo e(__('message.menu')); ?></a>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
        </div>


        <!-- Paginación -->
        <div class="box2">
            <?php echo e($restaurante->links()); ?>

        </div>
    </section>
</body>

<footer>
    Ián Banderas Tomillo
</footer>

</html><?php /**PATH C:\xampp\htdocs\FoodLovers\resources\views/restaurante/main.blade.php ENDPATH**/ ?>