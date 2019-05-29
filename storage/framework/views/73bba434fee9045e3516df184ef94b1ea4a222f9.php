<?php $__env->startSection('title', __('labels.backend.subscriptions.management') . ' | ' . __('labels.backend.subscriptions.edit')); ?>

<?php $__env->startSection('breadcrumb-links'); ?>
    <?php echo $__env->make('backend.subscription.includes.breadcrumb-links', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php echo e(html()->modelForm($subscription, 'PATCH', route('admin.subscription.update', $subscription->id))->class('form-horizontal')->open()); ?>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        <?php echo app('translator')->getFromJson('labels.backend.subscriptions.management'); ?>
                        <small class="text-muted"><?php echo app('translator')->getFromJson('labels.backend.subscriptions.edit'); ?></small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr>

            <div class="row mt-4 mb-4">
                <div class="col">
                    <div class="form-subscription row">
                    <?php echo e(html()->label(__('validation.attributes.backend.subscriptions.title'))->class('col-md-2 form-control-label')->for('title')); ?>


                        <div class="col-md-10">
                            <?php echo e(html()->text('name')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.subscriptions.title'))
                                ->required()
                                ->autofocus()); ?>

                        </div><!--col-->
                    </div><!--form-subscription-->

                    <div class="form-subscription row">
                            <?php echo e(html()->label(__('validation.attributes.backend.subscriptions.price'))->class('col-md-2 form-control-label')->for('price')); ?>


                            <div class="col-md-10">
                                <?php echo e(html()->text('price')
                                    ->class('form-control')
                                    ->placeholder(__('validation.attributes.backend.subscriptions.price'))
                                    ->required()
                                    ->autofocus()); ?>

                            </div><!--col-->
                        </div>

                        <div class="form-subscription row">
                            <?php echo e(html()->label(__('validation.attributes.backend.subscriptions.no_of_days'))->class('col-md-2 form-control-label')->for('no_of_days')); ?>


                            <div class="col-md-10">
                                <?php echo e(html()->text('no_of_days')
                                    ->class('form-control')
                                    ->placeholder(__('validation.attributes.backend.subscriptions.no_of_days'))
                                    ->required()
                                    ->autofocus()); ?>

                            </div><!--col-->
                        </div>

                        <div class="form-subscription row">
                            <?php echo e(html()->label(__('validation.attributes.backend.subscriptions.no_of_free_days'))->class('col-md-2 form-control-label')->for('no_of_free_days')); ?>


                            <div class="col-md-10">
                                <?php echo e(html()->text('no_of_free_days')
                                    ->class('form-control')
                                    ->placeholder(__('validation.attributes.backend.subscriptions.no_of_free_days'))
                                    ->required()
                                    ->autofocus()); ?>

                            </div><!--col-->
                        </div>

                    <div class="form-subscription row">
                        <?php echo e(html()->label(__('validation.attributes.backend.subscriptions.status'))->class('col-md-2 form-control-label')->for('status')); ?>


                        <div class="col-md-10">
                            <?php echo e(html()->label(
                                html()->checkbox('status')
                                        ->class('switch-input')
                                        ->id('status')
                                    . '<span class="switch-slider" data-checked="on" data-unchecked="off"></span>')
                                ->class('switch switch-label switch-pill switch-primary mr-2')
                            ->for('status')); ?>

                        </div><!--col-->
                    </div><!--form-subscription-->
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    <?php echo e(form_cancel(route('admin.subscription.index'), __('buttons.general.cancel'))); ?>

                </div><!--col-->

                <div class="col text-right">
                    <?php echo e(form_submit(__('buttons.general.crud.update'))); ?>

                </div><!--row-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
<?php echo e(html()->closeModelForm()); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>