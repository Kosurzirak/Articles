

<?php $__env->startSection('title', 'Page Title'); ?>

<?php $__env->startSection('content'); ?>

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/premium">
</head>
<body>
<h1>Become a premium NOW for just 500&euro; a year</h1>

<!-- TODO: voeg route helper functie toe die naar user controller post / update -->
<form action="<?php echo e(route('users.togglepremium')); ?>" method="POST">
    <?php echo csrf_field(); ?>
 
  <div>
    <span>Become a Premium User</span>
   
  </div>
<input type="submit" value="Signup and sell ur soul" class="" for="togglepremium" />
</form>









</body>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Wim Velleman\Documents\GitHub\Projecten\Project-weblog\resources\views/articles/premium.blade.php ENDPATH**/ ?>