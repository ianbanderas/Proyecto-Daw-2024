<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <title>Document</title>
</head>

<body>
    <a href="<?php echo e(route("menu", $idRes)); ?>" >menu</a>
    <a href="<?php echo e(route("main")); ?>" >home</a>
    <a href="<?php echo e(route("profile")); ?>" >profile</a>
    <a href="<?php echo e(route("out")); ?>" >log out</a>

    <p><?php echo e($plato->nombre); ?></p>
    <p><?php echo e($plato->descripcion); ?></p>

    <p><?php echo e($comentario); ?></p>

    <div class="form-group required">
        <div class="col-sm-12">

            <?php for($i = 0; $i < 10; $i++): ?>
                <label class="star star-5" for="star-5">
                    <?php if($i < $valoracion): ?>
                        <i class="bi bi-star-fill"></i>
                    <?php else: ?>
                        <i class="bi bi-star"></i>
                    <?php endif; ?>
                </label>
            <?php endfor; ?>
        </div>
    </div>

</body>

</html>
<?php /**PATH C:\Users\ian\Desktop\FoodLovers\resources\views/menu/plato.blade.php ENDPATH**/ ?>