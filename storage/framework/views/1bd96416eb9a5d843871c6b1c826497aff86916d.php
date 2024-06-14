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
<header>
<div class="separar">
    <a class="button_a" href="<?php echo e(route("main")); ?>" ><p><?php echo e(__("message.home")); ?></p></a>
   </div>
       <div class="myImageNav"></div>

     <div class="separar">
    <a class="button_a" id="logOut" href="<?php echo e(route("cambiarIdioma")); ?>"><p><?php echo e(__("message.language")); ?></p></a>
    <a class="button_a" href="<?php echo e(route("out")); ?>" ><p><?php echo e(__("message.logOut")); ?></p></a>
     </div>
   
   
</header>
<body>
 
    <section class="flex-container2">
    <div class="pla">
    <table>
        <tr>
            <th class="td1"><?php echo e(__("message.Name")); ?></th>
            <th class="td2" ><?php echo e(__("message.Desc")); ?></th>
            <th class="td3"><?php echo e(__("message.Comment")); ?></th>
        </tr>
        <tr>
            <td class="td1"><p><?php echo e($plato->nombre); ?></p></td>
            <td class="td2"><p><?php echo e($plato->descripcion); ?></p></td>
            <td class="td3"><p><?php echo e($comentario); ?></p></td>
        </tr>
    </table>
  
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
    </div>

    
    </div>
</section>
</body>
    <footer>
        Ián Banderas Tomillo
    </footer>
</html>
<?php /**PATH C:\xampp\htdocs\FoodLovers\resources\views/menu/plato.blade.php ENDPATH**/ ?>