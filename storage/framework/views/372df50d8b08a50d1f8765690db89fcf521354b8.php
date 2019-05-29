<?php $__env->startSection('title', app_name() . ' | ' . __('labels.backend.user_subscriptions.management')); ?>

<?php $__env->startSection('breadcrumb-links'); ?>
    <?php echo $__env->make('backend.user_subscription.includes.breadcrumb-links', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    <?php echo e(__('labels.backend.user_subscriptions.management')); ?>

                </h4>
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                <table id="example" class="table table-bordered table-striped" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th><?php echo app('translator')->getFromJson('labels.backend.user_subscriptions.table.name'); ?></th>
                            <th><?php echo app('translator')->getFromJson('labels.backend.user_subscriptions.table.subscription_name'); ?></th>
                            <th><?php echo app('translator')->getFromJson('labels.backend.user_subscriptions.table.amount'); ?></th>
                            <th><?php echo app('translator')->getFromJson('labels.backend.user_subscriptions.table.status'); ?></th>
                            <th><?php echo app('translator')->getFromJson('labels.backend.user_subscriptions.table.last_updated'); ?></th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $userSubscriptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $UserSubscription): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <tr>
                                <td><?php echo e($UserSubscription->users->first_name); ?></td>
                                <td><?php echo e($UserSubscription->subscription->name); ?></td>
                                <td><?php echo e($UserSubscription->payment_amount); ?></td>
                                <td><?php echo e($UserSubscription->payment_status); ?></td>
                                <td><?php echo e($UserSubscription->updated_at->diffForHumans()); ?></td>
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
    $(document).ready(function () {
        $('#example').DataTable();
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>