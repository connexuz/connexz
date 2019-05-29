<?php if($errors->any()): ?>
    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <script>
            toastr.error('<?php echo e($error); ?>');
        </script>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php elseif(session()->get('flash_success')): ?>
    <script>
        toastr.success("<?php echo e(session()->get('flash_success')); ?>");
    </script>
<?php elseif(session()->get('flash_warning')): ?>
    <script>
        toastr.warning("<?php echo e(session()->get('flash_warning')); ?>");
    </script>
<?php elseif(session()->get('flash_info')): ?>
    <script>
        toastr.info("<?php echo e(session()->get('flash_info')); ?>");
    </script>
<?php elseif(session()->get('flash_error')): ?>
    <script>
        toastr.error("<?php echo e(session()->get('flash_error')); ?>");
    </script>
<?php elseif(session()->get('flash_message')): ?>
    <script>
        toastr.info("<?php echo e(session()->get('flash_info')); ?>");
    </script>
<?php endif; ?>