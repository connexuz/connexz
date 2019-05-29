<li class="breadcrumb-menu">
    <div class="btn-faq" role="faq" aria-label="Button faq">
        <div class="dropdown">
            <a class="btn dropdown-toggle" href="#" role="button" id="breadcrumb-dropdown-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo app('translator')->getFromJson('menus.backend.faqs.main'); ?></a>

            <div class="dropdown-menu" aria-labelledby="breadcrumb-dropdown-1">
                <a class="dropdown-item" href="<?php echo e(route('admin.faq.index')); ?>"><?php echo app('translator')->getFromJson('menus.backend.faqs.all'); ?></a>
                <a class="dropdown-item" href="<?php echo e(route('admin.faq.create')); ?>"><?php echo app('translator')->getFromJson('menus.backend.faqs.create'); ?></a>
            </div>
        </div><!--dropdown-->

        <!--<a class="btn" href="#">Static Link</a>-->
    </div><!--btn-faq-->
</li>
