<?php $__env->startSection('title', app_name() . ' | ' . __('labels.backend.invites.management')); ?>

<?php $__env->startSection('breadcrumb-links'); ?>
    <?php echo $__env->make('backend.invite.includes.breadcrumb-links', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    <?php echo e(__('labels.backend.invites.management')); ?>

                </h4>
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                <table id="example" class="table table-bordered table-striped" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th><?php echo app('translator')->getFromJson('labels.backend.invites.table.name'); ?></th>
                            <th><?php echo app('translator')->getFromJson('labels.backend.invites.table.invite_name'); ?></th>
                            <th><?php echo app('translator')->getFromJson('labels.backend.invites.table.status'); ?></th>
                            <th><?php echo app('translator')->getFromJson('labels.backend.invites.table.last_updated'); ?></th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $invites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invite): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <tr>
                                <td><?php echo e($invite->users->first_name); ?></td>
                                <td>
                                  <?php if(!empty($invite->invite_user)): ?>
                                        <?php echo e($invite->invite_user->first_name); ?>

                                    <?php else: ?>
                                        <?php echo e($invite->invite_email); ?>

                                    <?php endif; ?>
                                </td>
                                <td>
                                <?php
                                    if($invite->status == 0){
                                        echo '<span class="badge badge-warning">Pending</span>';
                                    }elseif($invite->status == 1){
                                        echo '<span class="badge badge-success">Approved</span>';
                                    }elseif($invite->status == 2){
                                        echo '<span class="badge badge-danger">Rejected</span>';
                                    }
                                ?>                                    </td>
                                <td><?php echo e($invite->updated_at->diffForHumans()); ?></td>
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