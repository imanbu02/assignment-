<?php $__env->startSection('content'); ?>


<div class="container bg-white p-3">

    <div class="row">

        <!-- Text area -->
        <div class="col">
            <form action="<?php echo e(route('post.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('POST'); ?>
                <div class="form-floating">
                    <textarea class="form-control <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="content" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                    <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="text-danger">
                            <?php echo e($message); ?>

                        </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <label for="floatingTextarea2">Whats on your mind?</label>
                </div>

                <button type="submit" class="btn btn-primary mt-3">Post</button>


            </form>
        </div>


        <!-- Feed -->
        <div class="col">

            <?php if($posts->count() == 0): ?>

            <div class="p-3 text-white bg-secondary rounded border">
                There are no posts yet!
            </div>

            <?php endif; ?>

            <?php if($posts->count() > 0): ?>

                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <div class="card my-3">
                        <div class="card-header">
                        Quote
                        </div>
                        <div class="card-body">
                        <blockquote class="blockquote mb-0">
                            <p><?php echo e($post->content); ?></p>
                            <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                        </blockquote>

                        <hr>

                        <button class="btn btn-outline-primary">Like <span class="badge text-bg-primary">2</span></button>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php endif; ?>





        </div>

    </div>

</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\PIXEL\Desktop\lab\limu_social_center\resources\views/test.blade.php ENDPATH**/ ?>