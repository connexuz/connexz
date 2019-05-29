<?php $__env->startSection('title', app_name() . ' | ' . __('labels.frontend.page_title.help')); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('frontend.interaction.top', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <section class="ConneXuz-help-wrap-box">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php if(!empty($faqs) && count($faqs) > 0): ?>
                    <div id="accordion" class="help-accordion">
                        <?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="card">
                            <div class="card-header <?php echo e(($loop->index == 0)?'':'collapsed'); ?>" id="heading<?php echo e($loop->index); ?>" data-toggle="collapse" data-target="#collapse<?php echo e($loop->index); ?>" aria-expanded="<?php echo e(($loop->index == 0)?'true':'false'); ?>" aria-controls="collapse<?php echo e($loop->index); ?>">
                                <h5 class="mb-0">
                                    <?php echo e($faq->title); ?>

                                    <i class="fas fa-angle-down text-right float-right arrow-rotate"></i>
                                </h5>
                            </div>

                            <div id="collapse<?php echo e($loop->index); ?>" class="collapse  <?php echo e(($loop->index == 0)?'show ':''); ?>" aria-labelledby="heading<?php echo e($loop->index); ?>" data-parent="#accordion">
                                <div class="card-body">
                                    <?php echo e($faq->description); ?>

                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('after-scripts'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('popup'); ?>
    <?php echo $__env->make('frontend.popup.create-post', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>