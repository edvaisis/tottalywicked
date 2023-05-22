<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!-- Add this in your layout or view -->


    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.min.js"></script>


    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <title>Rick and Morty API</title>
</head>

<body>
<header>
    <div class="container-fluid">
        <div class="row">
            <div class="col text-center">
                <?php echo $__env->yieldContent('header'); ?>
            </div>
        </div>
    </div>
</header>

<div class="container-fluid">
    <?php echo $__env->yieldContent('content'); ?>
</div>

<footer>

</footer>

</body>
</html>
<?php /**PATH C:\Users\Eds pc\Documents\totallywicked_test_23\totallywicked\resources\views/layout/app.blade.php ENDPATH**/ ?>