

<?php $__env->startSection('title', 'Page Title'); ?>

<?php $__env->startSection('content'); ?>

    <p>Dit is de pagina waar alle artiklels plaats vinden</p>

    <?php if(auth()->guard()->check()): ?>
     <h1>Welcome <?php echo e(Auth::user()->name); ?></h1>   
    <?php endif; ?>

    <?php if(auth()->guard()->guest()): ?>
    <h1>    Welcome guest Please Login </h1>
        <li><a href="<?php echo e(route('login.show')); ?>">Login</a></li> 
        <li><a href="<?php echo e(route('login.show')); ?>">Register</a></li>
    <?php endif; ?>
    
    <h1>Articles</h1>

    <form action="<?php echo e(route('articles.index')); ?>" method="GET">
        <div class="form-group">
            <label for="category-filter">Filter by category:</label>   
            
            <select class="form-control" name="category" id="category-filter">
                <option value="0">All Categories</option>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($category->id); ?>" <?php echo e(request('category') == $category->id ? 'selected' : ''); ?>>
                            <?php echo e($category->name); ?>

                        </option>
                        <button class="Filter" type="submit">Filter</button>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
            </select>
            <button type="submit">Filter</button>
            <label for="user-filter">Filter by users:</label> 
            <select class="form-control" name="user" id="user-filter">
                <option value="0">All Users</option>
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($user->id); ?>" <?php echo e($userId == $user->id ? 'selected' : ''); ?>>
                        <?php echo e($user->name); ?>

                </option>
                <button class="Filter" type="submit">Filter</button>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
    </form>

    <?php if(Auth::check()): ?>
        <div  class="usercreate">
            <a href="articles/create">
                Create Article
            </a>
        </div>
    <?php endif; ?>

    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Beschrijving</th>
                <th>Date</th>
                <th>User</th>
                <th></th>
                <th>Categories</th>
                <th>Acties</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><a href="<?php echo e(route('articles.show', $article->id)); ?>"><?php echo e($article->name); ?></a></td>
                <td><?php echo e($article->description); ?></td>
                <td>Created on <?php echo e(date('jS M Y', strtotime($article->updated_at))); ?></td>
                <td><?php echo e($article->user->name); ?></td>
                <td> 
                    <div class="container">
                        <h1>Uploaded Image</h1>
                        <?php if($article->image_path !== ''): ?>
                            <div class="gallery">
                                    <img src="/<?php echo e($article->image_path); ?>" alt="Uploaded Image" width="200px">
                            </div>
                        <?php else: ?>
                        
                            <p>No images uploaded yet.</p>
                        <?php endif; ?>
                    </div>
                </td>
                <td><?php echo e($article->category->name); ?></td>
                <td><a href="<?php echo e(route('articles.edit', $article->id)); ?>">Bewerken</a></td>
                <td>
                    <form action="<?php echo e(route('articles.destroy', $article->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit">Verwijderen</button>
                    </form>
                </td>                
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Wim Velleman\Documents\GitHub\Projecten\Project-weblog\resources\views/articles/index.blade.php ENDPATH**/ ?>