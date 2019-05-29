<?php $__env->startSection('title', __('labels.backend.access.roles.management') . ' | ' . __('labels.backend.access.roles.edit')); ?>

<?php $__env->startSection('content'); ?>
<?php echo e(html()->modelForm($role, 'PATCH', route('admin.auth.role.update', $role))->class('form-horizontal')->open()); ?>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        <?php echo app('translator')->getFromJson('labels.backend.access.roles.management'); ?>
                        <small class="text-muted"><?php echo app('translator')->getFromJson('labels.backend.access.roles.edit'); ?></small>
                    </h4>
                </div><!--col-->
            </div><!--row-->
            <!--row-->

            <hr />

            <div class="row mt-4">
                <div class="col">
                    <div class="form-group row">
                        <?php echo e(html()->label(__('validation.attributes.backend.access.roles.name'))
                            ->class('col-md-2 form-control-label')
                            ->for('name')); ?>


                        <div class="col-md-10">
                            <?php echo e(html()->text('name')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.access.roles.name'))
                                ->attribute('maxlength', 191)
                                ->required()); ?>

                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        <?php echo e(html()->label(__('validation.attributes.backend.access.roles.associated_permissions'))
                            ->class('col-md-2 form-control-label')
                            ->for('permissions')); ?>


                        <div class="col-md-10">
                            <?php if($permissions->count()): ?>
                                <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="checkbox d-flex align-items-center">
                                        <?php echo e(html()->label(
                                                html()->checkbox('permissions[]', in_array($permission->name, $rolePermissions), $permission->name)
                                                        ->class('switch-input')
                                                        ->id('permission-'.$permission->id)
                                                    . '<span class="switch-slider" data-checked="on" data-unchecked="off"></span>')
                                                ->class('switch switch-label switch-pill switch-primary mr-2')
                                            ->for('permission-'.$permission->id)); ?>

                                        <?php echo e(html()->label(ucwords($permission->name))->for('permission-'.$permission->id)); ?>

                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div><!--col-->
                    </div><!--form-group-->
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    <?php echo e(form_cancel(route('admin.auth.role.index'), __('buttons.general.cancel'))); ?>

                </div><!--col-->

                <div class="col text-right">
                    <?php echo e(form_submit(__('buttons.general.crud.update'))); ?>

                </div><!--col-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
<?php echo e(html()->closeModelForm()); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>