<?php $__env->startSection('title', app_name() . ' | ' . __('labels.backend.comments.management')); ?>

<?php $__env->startSection('breadcrumb-links'); ?>
    <?php echo $__env->make('backend.comment.includes.breadcrumb-links', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    <?php echo e(__('labels.backend.comments.management')); ?>

                </h4>
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                <table id="example" class="table table-bordered table-striped" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th><?php echo app('translator')->getFromJson('labels.backend.comments.table.name'); ?></th>
                            <th><?php echo app('translator')->getFromJson('labels.backend.comments.table.post_title'); ?></th>
                            <th>Comment</th>
                            <th><?php echo app('translator')->getFromJson('labels.backend.comments.table.last_updated'); ?></th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($comment->users->first_name); ?></td>
                                <td><?php echo truncate($comment->posts->description,'20'); ?></td>
                                <td><?php echo truncate($comment->description,'20'); ?></td>
                                <td><?php echo e($comment->updated_at->diffForHumans()); ?></td>
                                <td><?php echo $comment->action_buttons; ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div><!--col-->
        </div><!--row-->
       
    </div><!--card-body-->
</div><!--card-->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('after-scripts'); ?>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>