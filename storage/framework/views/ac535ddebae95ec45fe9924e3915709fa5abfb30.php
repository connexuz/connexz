<!DOCTYPE html>
<?php if (\Illuminate\Support\Facades\Blade::check('langrtl')): ?>
    <html lang="<?php echo e(app()->getLocale()); ?>" dir="rtl">
<?php else: ?>
    <html lang="<?php echo e(app()->getLocale()); ?>">
<?php endif; ?>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <title><?php echo $__env->yieldContent('title', app_name()); ?></title>
        <meta name="description" content="<?php echo $__env->yieldContent('meta_description', 'Connexuz'); ?>">
        <meta name="author" content="<?php echo $__env->yieldContent('meta_author', 'Anil'); ?>">
        <?php echo $__env->yieldContent('meta'); ?>

        
        <?php echo $__env->yieldPushContent('before-styles'); ?>

        <!-- Check if the language is set to RTL, so apply the RTL layouts -->
        <!-- Otherwise apply the normal LTR layouts -->
        <?php echo e(style(mix('css/frontend.css'))); ?>

        <?php echo e(style('css/bootstrap.min.css')); ?>

        <?php echo e(style('css/font-awesome.min.css')); ?>

        <?php echo e(style('css/style.css')); ?>

        <?php echo e(style('css/custom.css')); ?>

        <?php echo e(style('css/toastr.min.css')); ?>


        <?php echo $__env->yieldPushContent('after-styles'); ?>
    </head>
    <body class="login-page">

        <header class="login-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <div class="connexuz-header-img">
                            <a href="<?php echo e(route('frontend.index')); ?>"><img src="<?php echo e(asset('images/logo.png')); ?>" alt="Logo" /></a>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="connexuz-contact-info">
                            <ul class="contact-wrap">
                                <li class="list-inline-item contact-item-phone"><span class="icon-custom-wrap"><i class="fas fa-phone"></i></span>Phone: <a href="tel:"><?php echo e($settings['contact_number']); ?></a></li>
                                <li class="list-inline-item contact-item-email"><span class="icon-custom-wrap"><i class="fas fa-envelope"></i></span>Email: <a href="mailto:"><?php echo e($settings['contact_email']); ?></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div id="app">
            <main class="login-background-wrap">
                <section class="conn-content-main-wrap connexuz-login-signup-wrap">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="conn-content-wrap">
                                    <div class="conn-content-title-wrap">
                                        <h1><?php echo e($settings['login_tagline_one']); ?> <span style="display:block;"><?php echo e($settings['login_tagline_two']); ?></span></h1>
                                    </div>
                                    <div class="conn-content-ul-wrap">
                                        <ul>
                                            <li><?php echo e($settings['login_content_one']); ?></li>
                                            <li><?php echo e($settings['login_content_two']); ?></li>
                                            <li><?php echo e($settings['login_content_three']); ?></li>
                                            <li><?php echo e($settings['login_content_four']); ?></li>
                                            <li><?php echo e($settings['login_content_five']); ?></li>
                                        </ul>
                                        <button type="button" class="btn conn-get-started-btn">Get started</button>
                                    </div>
                                </div>
                            </div>
                            <?php echo $__env->yieldContent('content'); ?>
                        </div>
                    </div>
                </section>
            </main><!-- container -->
        </div><!-- #app -->

        <!-- Scripts -->
        <?php echo $__env->yieldPushContent('before-scripts'); ?>
        <?php echo script(mix('js/manifest.js')); ?>

        <?php echo script(mix('js/vendor.js')); ?>

        <?php echo script(mix('js/frontend.js')); ?>


        <?php echo script('js/jquery-3.3.1.min.js'); ?>

        <?php echo script('js/bootstrap.min.js'); ?>

        <?php echo script('js/popper.min.js'); ?>

        <?php echo script('js/jquery.validate.js'); ?>

        <?php echo script('js/jquery-validate.bootstrap-tooltip.js'); ?>

        
        <?php echo script('js/toastr.min.js'); ?>

        <?php echo $__env->yieldPushContent('after-scripts'); ?>

        <?php echo $__env->make('includes.partials.ga', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->make('includes.partials.flash-messages', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->yieldContent('popup'); ?>
    </body>
</html>
