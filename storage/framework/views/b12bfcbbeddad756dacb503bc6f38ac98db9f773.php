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
            <?php echo e(style(mix('css/backend.css'))); ?>

            <?php echo e(style('css/jquery-ui.css')); ?>

            <?php echo e(style('css/admin/datatables.bootstrap.css')); ?>

            <?php echo e(style('css/toastr.min.css')); ?>


            <?php echo $__env->yieldPushContent('after-styles'); ?>
        </head>

        <body class="<?php echo e(config('backend.body_classes')); ?>">
            <?php echo $__env->make('backend.includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <div class="app-body">
                <?php echo $__env->make('backend.includes.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <main class="main">
                    <?php echo $__env->make('includes.partials.logged-in-as', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php echo Breadcrumbs::render(); ?>


                    <div class="container-fluid">
                        <div class="animated fadeIn">
                            <div class="content-header">
                                <?php echo $__env->yieldContent('page-header'); ?>
                            </div><!--content-header-->

                            <?php echo $__env->yieldContent('content'); ?>
                        </div><!--animated-->
                    </div><!--container-fluid-->
                </main><!--main-->

                <?php echo $__env->make('backend.includes.aside', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div><!--app-body-->

            <?php echo $__env->make('backend.includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <!-- Scripts -->
            <?php echo $__env->yieldPushContent('before-scripts'); ?>
            <?php echo script('js/jquery-3.3.1.min.js'); ?>

            <?php echo script(mix('js/manifest.js')); ?>

            <?php echo script(mix('js/vendor.js')); ?>

            <?php echo script(mix('js/backend.js')); ?>

            <?php echo script('js/toastr.min.js'); ?>

            <?php echo script('//code.jquery.com/ui/1.11.4/jquery-ui.js'); ?>

            <?php echo script('js/jquery.validate.js'); ?>

            <?php echo script('js/additional-methods.js'); ?>

            <?php echo script('js/ckeditor/ckeditor.js'); ?>

            <?php echo script('js/admin/lib/datatable/jquery.dataTables.min.js'); ?>

            <?php echo script('js/admin/lib/datatable/dataTables.bootstrap4.min.js'); ?>

            <?php echo script('js/backend_customjs.js'); ?>

            <?php echo $__env->yieldPushContent('after-scripts'); ?>

            <?php echo $__env->make('includes.partials.ga', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo $__env->make('includes.partials.flash-messages', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo $__env->yieldContent('popup'); ?>
        </body>
    </html>
