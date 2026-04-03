

<?php $__env->startSection('title', 'Page Title'); ?>

<?php $__env->startSection('content'); ?>

<?php echo e($article); ?>

<body>
   
<h1>Show Page voor <?php echo e($article->name); ?></h1>
 

<h1><?php echo e($article->description); ?></h1>
<div class="container">
    <?php if($article->image_path !== ''): ?>

    <div class="gallery">
        <img src="/<?php echo e($article->image_path); ?>" alt="Uploaded Image">
    </div>
    <?php else: ?>
        <p>No images uploaded yet.</p>
    <?php endif; ?>
    <td>
        <?php $__currentLoopData = $article->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo e($comment->comment); ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </td>
       <label for="comment">comment</label>

       <form action="<?php echo e(route('comments.store', ['article' => $article->id])); ?>" method="post">
            <?php echo csrf_field(); ?>
            <textarea name="comment" id="description"></textarea>
            <button type="submit">verzenden</button>
       </form>
    
    <button type="submit">Opslaan</button>
</div>
</body>  



<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Wim Velleman\Documents\GitHub\Projecten\Project-weblog\resources\views/articles/show.blade.php ENDPATH**/ ?>