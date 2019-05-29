<?php $__env->startSection('title', app_name() . ' | ' . __('labels.backend.faqs.management')); ?>

<?php $__env->startSection('breadcrumb-links'); ?>
    <?php echo $__env->make('backend.faq.includes.breadcrumb-links', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    <?php echo e(__('labels.backend.faqs.management')); ?>

                </h4>
            </div><!--col-->

            <div class="col-sm-7">
                <?php echo $__env->make('backend.faq.includes.header-buttons', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                <table id="example" class="table table-bordered table-striped" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th><?php echo app('translator')->getFromJson('labels.backend.faqs.table.title'); ?></th>
                            <th><?php echo app('translator')->getFromJson('labels.backend.faqs.table.description'); ?></th>
                            <th><?php echo app('translator')->getFromJson('labels.backend.faqs.table.last_updated'); ?></th>
                            <th><?php echo app('translator')->getFromJson('labels.general.actions'); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($faq->title); ?></td>
                                <td><?php echo e($faq->description); ?></td>
                                <td><?php echo e($faq->updated_at->diffForHumans()); ?></td>
                                <td><?php echo $faq->action_buttons; ?></td>
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