<?php $__env->startSection('title', app_name() . ' | ' . __('labels.frontend.passwords.reset_password_box_title')); ?>

<?php $__env->startSection('content'); ?>

    <div class="col-md-5">
        <div class="conn-login-popup-wrap">
            <div class="form-wrap">
                <div class="tabs-content">
                    <div class="tabs">
                        <h3 class="login-tab"><a class="active" href="#login-tab-content"><?php echo app('translator')->getFromJson('labels.frontend.passwords.reset_password_box_title'); ?></a></h3>
                    </div>
                    <!--.tabs-->

                    <!--.signup-tab-content-->
                    <div id="login-tab-content" class="active">
                        <div class="form-content-text-wrap">

                            <!-- <p>Complete the below form to get instant access.</p> -->
                        </div>
                        <?php echo e(html()->form('POST', route('frontend.auth.password.reset'))
                            ->class('reset-form')
                            ->id('reset-form')
                            ->open()); ?>

                    <input type="hidden" name="token" value="<?php echo e($token); ?>" />
                            <div class="input-wrap">
                                <i class="fas fa-envelope"></i>

                                <?php echo e(html()->email('email')
                                ->class('input')
                                ->placeholder(__('validation.attributes.frontend.email'))
                                ->attribute('maxlength', 191)
                                ->required()
                                ->autofocus()); ?>

                            </div>

                            <div class="input-wrap">
                                <i class="fas fa-unlock"></i>
                                <?php echo e(html()->password('password')
                                        ->class('input')
                                        ->placeholder(__('validation.attributes.frontend.password'))
                                        ->required()); ?>

                            </div>
                            <div class="input-wrap">
                                <i class="fas fa-lock"></i>
                                <?php echo e(html()->password('password_confirmation')
                                            ->class('input')
                                            ->placeholder(__('validation.attributes.frontend.password_confirmation'))
                                            ->required()); ?>

                            </div>

                            <div class="login-btn-wrap">
                                <?php echo e(form_submit(__('labels.frontend.passwords.reset_password_button'))->class('login-btn')); ?>

                            </div>
                         <?php echo e(html()->form()->close()); ?>

                    </div>
                    <!--.login-tab-content-->
                </div>
                <!--.tabs-content-->
            </div>
            <!--.form-wrap-->
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.login-app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>