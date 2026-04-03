

<?php $__env->startSection('title', 'Page Title'); ?>

<?php $__env->startSection('content'); ?>
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    
    <title>Document</title>
</head>
<body>
    <h3>Login and Register!!</h3>

    <?php if($errors->any()): ?>
        <?php echo e(implode('', $errors->all(':message'))); ?>

    <?php endif; ?>

    <form action="<?php echo e(route('login.post')); ?>" method="POST">
        <?php echo csrf_field(); ?>
         <input type="text" name="email" placeholder="Email">
         <input type="password" name="password" placeholder="Password">
         <button>Login</button>
    </form>

    <?php if($errors->any()): ?>
        <?php echo implode('', $errors->all('<div>:message</div>')); ?>

    <?php endif; ?>

    <h3>Signup</h3>
        <form action="<?php echo e(route('register.post')); ?>" method="POST">
            <?php echo csrf_field(); ?> 
            <input type="text" name="name" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <input type="text" name="email" placeholder="E_Mail">
            <input type="checkbox" name="is_premium" value="1">
            <label for="is_premium">Subscribe</label><br>
            <input type="submit">Signup</button>
    </form>
</body>
</html>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Wim Velleman\Documents\GitHub\Projecten\Project-weblog\resources\views/auth/login.blade.php ENDPATH**/ ?>