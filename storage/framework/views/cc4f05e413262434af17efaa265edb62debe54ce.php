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
        
        <?php echo e(style('css/bootstrap.min.css')); ?>

        <?php echo e(style('css/font-awesome.min.css')); ?>

        <?php echo e(style(mix('css/frontend.css'))); ?>

        <?php echo e(style('//code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css')); ?>

        <?php echo e(style('css/style.css')); ?>

        <?php echo e(style('css/custom.css')); ?>

        <?php echo e(style('css/toastr.min.css')); ?>


        <?php echo $__env->yieldPushContent('after-styles'); ?>
    </head>
    <body>
        <?php echo $__env->make('includes.partials.logged-in-as', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->make('frontend.includes.nav', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <?php echo $__env->yieldContent('content'); ?>

        <!-- Scripts -->
        <?php echo $__env->yieldPushContent('before-scripts'); ?>
        <?php echo script('js/jquery-3.3.1.min.js'); ?>

        <?php echo script('//code.jquery.com/ui/1.11.4/jquery-ui.js'); ?>

        <?php echo script('js/bootstrap.min.js'); ?>


        <?php echo script('js/popper.min.js'); ?>

        <?php echo script('js/jquery.validate.js'); ?>

        <!-- <?php echo script('js/jquery-validate.bootstrap-tooltip.js'); ?> -->
        <?php echo script('js/additional-methods.js'); ?>

        <?php echo script('js/ckeditor/ckeditor.js'); ?>

        <?php echo script('js/custom.js'); ?>

        <?php echo script('js/toastr.min.js'); ?>

        <?php echo $__env->yieldPushContent('after-scripts'); ?>
        
        <script>
            $(document).ready(function(){
                
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "check_subscription",
                    method: 'post',
                    success: function(result) {
                        if(result){
//                            window.location = 'settings';
                        }
                    }
                });
                
                
            });
        </script>
        <?php echo $__env->make('includes.partials.ga', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->make('includes.partials.flash-messages', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->yieldContent('popup'); ?>
    </body>
</html>
