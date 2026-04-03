<nav>
    <ul>
       <li><a href="<?php echo e(route('articles.index')); ?>">Article List</a></li>
       <li><a href="<?php echo e(route('articles.create')); ?>">Create Article</a></li>
       <li><a href="<?php echo e(route('login.show')); ?>">Login</a></li>
       <?php if(auth()->guard()->check()): ?>
       <li><a href="<?php echo e(route('article.premium')); ?>">Become a Premium</a></li>
       <?php endif; ?>
        <li>
            <form method="POST" action="<?php echo e(route('logout')); ?>">
                <?php echo csrf_field(); ?>
                <button type="submit">
                    Logout
                </button>
            </form>
        </li>
    </ul>
</nav><?php /**PATH C:\Users\Wim Velleman\Documents\GitHub\Projecten\Project-weblog\resources\views/partials/nav.blade.php ENDPATH**/ ?>