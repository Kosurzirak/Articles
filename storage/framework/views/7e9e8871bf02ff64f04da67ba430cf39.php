

<?php $__env->startSection('title', 'Page Title'); ?>

<?php $__env->startSection('content'); ?>
    <p>This is the content for the page.</p>
<?php $__env->stopSection(); ?>
<link rel="stylesheet" href="/css/edit.css">
<h1>Article Bewerken</h1>

<?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>

<form action="<?php echo e(route('articles.update', $article->id)); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>
    <label for="name">Naam:</label>
    <input type="text" id="name" name="name" value="<?php echo e($article->name); ?>" required>
    
    <br>
    <label for="description">Beschrijving:</label>
    <textarea id="description" name="description"><?php echo e($article->description); ?></textarea>
    <br>

    <button type="submit">Bijwerken</button>
    <label for="category">Categorie:</label>
<select name="category_id" id="category" required>
    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($category->id); ?>" <?php echo e($article->category_id == $category->id ? 'selected' : ''); ?>>
            <?php echo e($category->name); ?>

        </option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
<label class="form-label" for="inputFile">File</label>
    <input
       type="file"
       name="image"
       id="inputFile"> 
       <select name="is_premium" class="selectPremium" id="$check_mark">
       <option value="0">No Premium content</option>
       <option value="1">Yess Premium content</option>
    </select>
    
</form>
<div class="burger">
  <div class="bun top">
    <div class="sesame-seed one"></div>
    <div class="sesame-seed two"></div>
    <div class="sesame-seed three"></div>
  </div>
  <div class="cosmic-fill">
  </div>
  <div class="bun bottom"></div>
</div>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Wim Velleman\Documents\GitHub\Projecten\Project-weblog\resources\views/articles/edit.blade.php ENDPATH**/ ?>