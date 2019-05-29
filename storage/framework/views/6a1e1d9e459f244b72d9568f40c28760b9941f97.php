<?php $__env->startSection('title', __('labels.backend.access.users.management') . ' | ' . __('labels.backend.access.users.edit')); ?>

<?php $__env->startSection('breadcrumb-links'); ?>
<?php echo $__env->make('backend.auth.user.includes.breadcrumb-links', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php echo e(html()->modelForm($user, 'PATCH', route('admin.auth.user.update', $user->id))->class('form-horizontal')->id('user-form')->open()); ?>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    <?php echo app('translator')->getFromJson('labels.backend.access.users.management'); ?>
                    <small class="text-muted"><?php echo app('translator')->getFromJson('labels.backend.access.users.edit'); ?></small>
                </h4>
            </div><!--col-->
        </div><!--row-->

        <hr>

        <div class="row mt-4 mb-4">
            <div class="col">
                <h4>Basic Information</h4>
                <hr>
                <div class="form-group row">
                    <?php echo e(html()->label(__('validation.attributes.backend.access.users.first_name'))->class('col-md-2 form-control-label')->for('first_name')); ?>


                    <div class="col-md-10">
                        <?php echo e(html()->text('first_name')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.access.users.first_name'))
                                ->attribute('maxlength', 191)
                                ->required()); ?>

                    </div><!--col-->
                </div><!--form-group-->

                <div class="form-group row">
                    <?php echo e(html()->label(__('validation.attributes.backend.access.users.last_name'))->class('col-md-2 form-control-label')->for('last_name')); ?>


                    <div class="col-md-10">
                        <?php echo e(html()->text('last_name')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.access.users.last_name'))
                                ->attribute('maxlength', 191)
                                ->required()); ?>

                    </div><!--col-->
                </div><!--form-group-->

                <div class="form-group row">
                    <?php echo e(html()->label(__('validation.attributes.backend.access.users.email'))->class('col-md-2 form-control-label')->for('email')); ?>


                    <div class="col-md-10">
                        <?php echo e(html()->email('email')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.access.users.email'))
                                ->attribute('maxlength', 191)
                                ->required()); ?>

                    </div><!--col-->
                </div><!--form-group-->

                <div class="form-group row">
                    <?php echo e(html()->label('Date of Birth')->class('col-md-2 form-control-label')->for('date_of_birth')); ?>


                    <div class="col-md-10">
                        <?php echo e(html()->text('date_of_birth', date("Y-m-d", strtotime($user->date_of_birth)))
                                ->class('form-control')
                                ->placeholder('Date of Birth')                              
                                ->required()); ?>

                    </div><!--col-->
                </div><!--form-group-->

                <div class="form-group row">
                    <?php echo e(html()->label('Gender')->class('col-md-2 form-control-label')->for('gender')); ?>


                    <div class="col-md-6">
                        <?php echo e(html()->radio('gender', ($user->gender == 1) ? true: false, "1")
                                ->id('gender_male')
                                ->required()); ?>  <?php echo e(html()->label('Male')->class('col-md-2 form-control-label')->for('gender_male')); ?>


                        <?php echo e(html()->radio('gender', ($user->gender == 2) ? true: false, "2")
                                ->id('gender_female')                                
                                ->required()); ?>  <?php echo e(html()->label('Female')->class('col-md-2 form-control-label')->for('gender_female')); ?>

                    </div><!--col-->
                </div><!--form-group-->

                <div class="form-group row">
                    <?php echo e(html()->label('City')->class('col-md-2 form-control-label')->for('city')); ?>


                    <div class="col-md-10">
                        <?php echo e(html()->text('city')
                                ->class('form-control')
                                ->placeholder('City')                                  
                                ->required()); ?>

                    </div><!--col-->
                </div><!--form-group-->

                <div class="form-group row">
                    <?php echo e(html()->label('Country')->class('col-md-2 form-control-label')->for('country')); ?>


                    <div class="col-md-10">
                        <?php echo e(html()->select('country')
                                ->class('form-control')
                                ->placeholder('Select Country')  
                                ->options(array("1"=>"India"), $user->country)  
                                ->required()); ?>

                    </div><!--col-->
                </div><!--form-group-->                   

                <div class="form-group row">
                    <?php echo e(html()->label(__('validation.attributes.backend.access.users.mobile_number'))->class('col-md-2 form-control-label')->for('mobile_number')); ?>


                    <div class="col-md-10">
                        <?php echo e(html()->text('mobile_number')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.access.users.mobile_number'))
                                ->attribute('maxlength', 10)
                                ->attribute('onkeypress', 'javascript:return isNumberOrNot(event)')
                                ->required()); ?>

                    </div><!--col-->
                </div><!--form-group-->

                <div class="form-group row">
                    <?php echo e(html()->label('About')->class('col-md-2 form-control-label')->for('about')); ?>


                    <div class="col-md-10">
                        <?php echo e(html()->textarea('about')
                                ->class('form-control')
                                ->placeholder('Write something about you')                                
                                ->required()                                
                                ->attribute('rows', 4)); ?>

                    </div><!--col-->
                </div><!--form-group-->

                <h4>Education and work</h4>
                <hr>                   

                <div class="form-group row">
                    <?php echo e(html()->label('My university')->class('col-md-2 form-control-label')->for('university')); ?>


                    <div class="col-md-10">
                        <?php echo e(html()->text('university')
                                ->class('form-control')
                                ->placeholder('University')                                
                                ->required()); ?>

                    </div><!--col-->
                </div><!--form-group-->

                <div class="form-group row">
                    <?php echo e(html()->label('From')->class('col-md-2 form-control-label')->for('education_from_date')); ?>


                    <div class="col-md-10">
                        <?php echo e(html()->text('education_from_date', date("Y-m-d", strtotime($user->education_from_date)))
                                ->class('form-control')
                                ->placeholder('From')                                  
                                ->required()); ?>

                    </div><!--col-->
                </div><!--form-group-->

                <div class="form-group row">
                    <?php echo e(html()->label('To')->class('col-md-2 form-control-label')->for('education_to_date')); ?>


                    <div class="col-md-10">
                        <?php echo e(html()->text('education_to_date', date("Y-m-d", strtotime($user->education_to_date)))
                                ->class('form-control')
                                ->placeholder('To')                                  
                                ->required()); ?>

                    </div><!--col-->
                </div><!--form-group-->

                <div class="form-group row">
                    <?php echo e(html()->label('About')->class('col-md-2 form-control-label')->for('education_about')); ?>


                    <div class="col-md-10">
                        <?php echo e(html()->textarea('education_about')
                                ->class('form-control')
                                ->placeholder('Write something about your education')                                
                                ->required()                                
                                ->attribute('rows', 4)); ?>

                    </div><!--col-->
                </div><!--form-group-->

                <div class="form-group row">
                    <div class="col-md-2"></div>

                    <div class="col-md-10">
                        <?php echo e(html()->checkbox('graduted')                                
                                ->required()); ?> <?php echo e(html()->label('Graduted')->class('col-md-2 form-control-label')->for('graduted')); ?>

                    </div><!--col-->
                </div><!--form-group-->

                <h4>My interest</h4>

                <hr>   

                <div class="form-group row">
                    <?php
                        $interestString = "";
                    ?>
                    
                    <?php if($interest->count()): ?>
                        <?php $__currentLoopData = $interest; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ik): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $interestString .= $ik->title.", "
                            ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $interestString = rtrim($interestString, ", ")
                            ?>
                    <?php endif; ?>
                    
                    <?php echo e(html()->label('Edit Interests')->class('col-md-2 form-control-label')->for('user_interests')); ?>


                    <div class="col-md-10">
                        <?php echo e(html()->text('user_interests', $interestString)
                                ->class('form-control')
                                ->placeholder('e.g. (Bycicle,Photography,shopping)')); ?>

                    </div><!--col-->
                </div><!--form-group-->

                <hr>
                
                <div class="form-group row">
                    <?php echo e(html()->label('Abilities')->class('col-md-2 form-control-label')); ?>


                    <div class="table-responsive col-md-10">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><?php echo app('translator')->getFromJson('labels.backend.access.users.table.roles'); ?></th>
                                    <th><?php echo app('translator')->getFromJson('labels.backend.access.users.table.permissions'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <?php if($roles->count()): ?>
                                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="card">
                                            <div class="card-header">
                                                <div class="checkbox d-flex align-items-center">
                                                    <?php echo e(html()->label(
                                                                        html()->checkbox('roles[]', in_array($role->name, $userRoles), $role->name)
                                                                                ->class('switch-input')
                                                                                ->id('role-'.$role->id)
                                                                        . '<span class="switch-slider" data-checked="on" data-unchecked="off"></span>')
                                                                    ->class('switch switch-label switch-pill switch-primary mr-2')
                                                                    ->for('role-'.$role->id)); ?>

                                                    <?php echo e(html()->label(ucwords($role->name))->for('role-'.$role->id)); ?>

                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <?php if($role->id != 1): ?>
                                                <?php if($role->permissions->count()): ?>
                                                <?php $__currentLoopData = $role->permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <i class="fas fa-dot-circle"></i> <?php echo e(ucwords($permission->name)); ?>

                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php else: ?>
                                                <?php echo app('translator')->getFromJson('labels.general.none'); ?>
                                                <?php endif; ?>
                                                <?php else: ?>
                                                <?php echo app('translator')->getFromJson('labels.backend.access.users.all_permissions'); ?>
                                                <?php endif; ?>
                                            </div>
                                        </div><!--card-->
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if($permissions->count()): ?>
                                        <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="checkbox d-flex align-items-center">
                                            <?php echo e(html()->label(
                                                                html()->checkbox('permissions[]', in_array($permission->name, $userPermissions), $permission->name)
                                                                        ->class('switch-input')
                                                                        ->id('permission-'.$permission->id)
                                                                    . '<span class="switch-slider" data-checked="on" data-unchecked="off"></span>')
                                                                ->class('switch switch-label switch-pill switch-primary mr-2')
                                                            ->for('permission-'.$permission->id)); ?>

                                            <?php echo e(html()->label(ucwords($permission->name))->for('permission-'.$permission->id)); ?>

                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div><!--col-->
                </div><!--form-group-->
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->

    <div class="card-footer">
        <div class="row">
            <div class="col">
                <?php echo e(form_cancel(route('admin.auth.user.index'), __('buttons.general.cancel'))); ?>

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