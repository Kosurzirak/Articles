

<?php $__env->startSection('title', 'Page Title'); ?>

<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="/css/create.css">
    <p>This is the content for the page.</p>
<?php $__env->stopSection(); ?>
 <h1>Nieuw Article Aanmaken</h1>
<form action="<?php echo e(route('articles.store')); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <label for="name">Naam:</label>
    <input type="text" id="name" name="name" placeholder="Title" required>
    <br>
    <label for="description" >Beschrijving:</label>
    <textarea id="description" name="description" placeholder="Beschrijving"></textarea>
   
    
    <label class="form-label" for="inputFile">File</label>
    <input
       type="file"
       name="image"
       id="inputFile">
    
    <br>
    <button type="submit">Opslaan</button>
    <label for="category">Categorie:</label>

</select>
    <label>New category</label>
    <input type="text" id="$category" name="new_category_name" >
    <select  name="category_id" id="category">
        <option value="">No category selection</option>
    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <select name="is_premium" class="selectPremium" id="$check_mark">
       <option value="0">No Premium content</option>
       <option value="1">Yess Premium content</option>
    </select>
<div class="container">
       <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>
</form>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Wim Velleman\Documents\GitHub\Projecten\Project-weblog\resources\views/articles/create.blade.php ENDPATH**/ ?>