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
                        <?php echo e(html()->form('POST', route('frontend.auth.password.email.post'))
                            ->class('forgot-form')
                            ->id('forgot-form')
                            ->open()); ?>

                    <input type="hidden" name="token" value="<?php echo e(app('request')->input('name')); ?>" />
                            <div class="input-wrap">
                                <i class="fas fa-envelope"></i>

                                <?php echo e(html()->email('email')
                                ->class('input')
                                ->placeholder(__('validation.attributes.frontend.email'))
                                ->attribute('maxlength', 191)
                                ->required()
                                ->autofocus()); ?>

                            </div>

                            <div class="help-text forget-password-wrap">
                                <p><a href="<?php echo e(route('frontend.auth.login')); ?>">Login</a> Or <a href="<?php echo e(route('frontend.auth.login')); ?>">Sign Up</a></p>
                            </div>
                            <div class="login-btn-wrap">
                                <?php echo e(form_submit(__('labels.frontend.passwords.send_password_reset_link_button'))->class('login-btn')); ?>

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

<?php $__env->startSection('after-scripts'); ?>
    <script>
        $(document).ready(function () {
            /*$('#login-form').validate({
                errorClass: 'has-error',
            });*/
        });

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.login-app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>