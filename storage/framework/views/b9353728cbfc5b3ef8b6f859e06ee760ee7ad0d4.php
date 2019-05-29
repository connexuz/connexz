<?php $__env->startSection('title', app_name() . ' | ' . __('strings.backend.dashboard.title')); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <strong><?php echo app('translator')->getFromJson('strings.backend.dashboard.welcome'); ?> <?php echo e($logged_in_user->name); ?>!</strong>
                </div><!--card-header-->
                <div class="card-body">
                    <?php echo __('strings.backend.welcome'); ?>

                </div><!--card-body-->
            </div><!--card-->
        </div><!--col-->
    </div><!--row-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>