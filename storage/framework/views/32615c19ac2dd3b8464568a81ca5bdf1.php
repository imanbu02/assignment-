<?php $__env->startSection('content'); ?>


<div class="container p-3">

    <div class="row">

        <!-- Text area -->
        <div class="col-4">
            <form class="bg-white p-2 shadow rounded" action="<?php echo e(route('post.store')); ?>" method="POST">
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
                    <label for="floatingTextarea2">What's on your mind?</label>
                </div>

                <button type="submit" class="btn btn-sm btn-primary mt-3">Post</button>
            </form>
        </div>


        <!-- Feed -->
        <div class="col">

            <?php if($posts->count() == 0): ?>

            <div class="p-3 text-white shadow-sm bg-secondary rounded border">
                There are no posts yet!
            </div>

            <?php endif; ?>

            <?php if($posts->count() > 0): ?>

                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <div class="card bg-white shadow border-0 mb-3">
                        <div class="card-header border-0 bg-white">
                            <div class="row">
                                <div class="col border-bottom">
                                    <div class="text-start">
                                        <?php echo e($post->user->name); ?>

                                    </div>
                                </div>

                                <div class="col">
                                    <div class="dropdown text-end">

                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $post)): ?>
                                            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                Options
                                            </button>
                                        <?php endif; ?>
                                        <ul class="dropdown-menu">
                                          <li><a class="dropdown-item btn" data-bs-toggle="modal" data-bs-target="#modal_<?php echo e($post->id); ?>">Edit</a></li>
                                          <li><hr class="dropdown-divider"></li>
                                          <li><a class="dropdown-item text-danger btn" data-bs-toggle="modal" data-bs-target="#delete_<?php echo e($post->id); ?>">Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                        <blockquote class="blockquote mb-0">
                            <p><?php echo e($post->content); ?></p>
                        </blockquote>

                        <hr>

                        <form action="<?php echo e(route('posts.likes', ['post' => $post, 'user' => auth()->user()->id])); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('POST'); ?>
                            <button class="btn btn-outline-primary btn-sm">
                                <?php echo e($post->likes->contains('user_id', auth()->user()->id) ? "Unlike" : "Like"); ?>

                                <span class="badge text-bg-primary"><?php echo e($post->likes->count()); ?></span></button>
                        </form>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php endif; ?>

            <?php echo e($posts->links()); ?>

        </div>

    </div>

    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <!-- Edit Modal -->
        <div class="modal fade" id="modal_<?php echo e($post->id); ?>" tabindex="-1" aria-labelledby="modal_<?php echo e($post->id); ?>" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <form action="<?php echo e(route('post.update', $post)); ?>" method="POST">

                <div class="modal-content">
                    <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit your post</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <div class="form-floating">
                                <textarea class="form-control <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="content" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"><?php echo e($post->content); ?></textarea>
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
                                <label for="floatingTextarea2">Edit your post</label>
                            </div>

                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
                </div>
            </form>

        </div>

        <!-- Delete Modal -->
        <div class="modal fade" id="delete_<?php echo e($post->id); ?>" tabindex="-1" aria-labelledby="delete_<?php echo e($post->id); ?>" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">

                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete confirmation</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this post?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <form action="<?php echo e(route('post.delete', $post)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\PIXEL\Desktop\lab\limu_social_center\resources\views/users/posts/index.blade.php ENDPATH**/ ?>