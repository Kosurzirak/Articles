<!DOCTYPE html>
<html>
<head>
    <title>App Name - <?php echo $__env->yieldContent('title'); ?></title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <?php if(auth()->guard()->check()): ?>
        Welcome <?php echo e(Auth::user()->name); ?>

    <?php endif; ?>

    <?php if(auth()->guard()->guest()): ?>
        Welcome guest
    <?php endif; ?>

    <?php echo $__env->make('partials.nav', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    
    <?php echo $__env->yieldContent('content'); ?>
</body>
</html><?php /**PATH C:\Users\Wim Velleman\Documents\GitHub\Projecten\Project-weblog\resources\views/layouts/app.blade.php ENDPATH**/ ?>