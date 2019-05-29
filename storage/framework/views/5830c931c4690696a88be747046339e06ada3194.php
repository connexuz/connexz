<li class="breadcrumb-menu">
    <div class="btn-subscription" role="subscription" aria-label="Button subscription">
        <div class="dropdown">
            <a class="btn dropdown-toggle" href="#" role="button" id="breadcrumb-dropdown-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo app('translator')->getFromJson('menus.backend.subscriptions.main'); ?></a>

            <div class="dropdown-menu" aria-labelledby="breadcrumb-dropdown-1">
                <a class="dropdown-item" href="<?php echo e(route('admin.subscription.index')); ?>"><?php echo app('translator')->getFromJson('menus.backend.subscriptions.all'); ?></a>
                <a class="dropdown-item" href="<?php echo e(route('admin.subscription.create')); ?>"><?php echo app('translator')->getFromJson('menus.backend.subscriptions.create'); ?></a>
            </div>
        </div><!--dropdown-->

        <!--<a class="btn" href="#">Static Link</a>-->
    </div><!--btn-subscription-->
</li>
