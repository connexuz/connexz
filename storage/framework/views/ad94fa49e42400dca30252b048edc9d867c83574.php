<?php $__env->startSection('title', app_name() . ' | ' . __('labels.frontend.auth.login_box_title')); ?>

<?php $__env->startSection('content'); ?>
    <div class="col-md-5">
        <div class="conn-login-popup-wrap">
            <div class="form-wrap">
                <div class="tabs-content">
                    <div class="tabs">
                        <h4 class="signup-tab"><a href="<?php echo e(route('frontend.auth.register')); ?>">Sign Up</a></h4>
                        <h4 class="login-tab"><a class="active" href="javascript:void(0);">Login</a></h4>
                    </div>
                    <!--.tabs-->

                    <!--.signup-tab-content-->
                    <div id="login-tab-content" class="active">
                        <div class="form-content-text-wrap">
                            <h3>Login Now</h3>
                            <!-- <p>Complete the below form to get instant access.</p> -->
                        </div>
                        <?php echo e(html()->form('POST', route('frontend.auth.login.post'))
                            ->class('login-form')
                            ->id('login-form')
                            ->open()); ?>

                            <div class="input-wrap">
                                <i class="fas fa-envelope"></i>
                                <?php echo e(html()->email('email')
                                    ->class('input')
                                    ->placeholder(__('validation.attributes.frontend.email'))
                                    ->attribute('maxlength', 191)
                                    ->required()); ?>

                            </div>
                            <div class="input-wrap">
                                <i class="fas fa-unlock"></i>
                                <?php echo e(html()->password('password')
                                        ->class('input')
                                        ->placeholder(__('validation.attributes.frontend.password'))
                                        ->required()); ?>

                            </div>
                            <div class="help-text forget-password-wrap">
                                <p><a href="<?php echo e(route('frontend.auth.password.reset')); ?>">Forget your password?</a></p>
                            </div>
                            <div class="login-btn-wrap">
                                <?php echo e(form_submit(__('labels.frontend.auth.login_button'))->class('login-btn')); ?>

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