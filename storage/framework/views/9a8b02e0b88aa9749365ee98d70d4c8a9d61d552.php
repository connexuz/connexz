

<?php $__env->startSection('title', __('labels.backend.settings.management') . ' | ' . __('labels.backend.settings.update')); ?>

<?php $__env->startSection('content'); ?>
<?php echo e(html()->form('POST', route('admin.setting.store'))->class('form-horizontal')->open()); ?>

<?php //dd($settings[0]->setting_value); exit; ?>
    <div class="card">
        <div class="card-body">

            <div class="row mt-4 mb-4">
                <div class="col">
                <?php $__currentLoopData = $settings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $setting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="form-group row">
                    <?php echo e(html()->label(__($setting->setting_title))->class('col-md-2 form-control-label')->for($setting->setting_title)); ?>


                        <div class="col-md-10">
                            <?php echo e(html()->text($setting->setting_key)
                                ->class('form-control')
                                ->placeholder(__($setting->setting_title))
                                ->value($setting->setting_value)); ?>

                        </div><!--col-->
                    </div><!--form-group-->
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                
                <div class="col text-right">
                    <?php echo e(form_submit(__('buttons.general.crud.update'))); ?>

                </div><!--row-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
<?php echo e(html()->form()->close()); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>