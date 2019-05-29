<header class="main-header">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a href="<?php echo e(route('frontend.index')); ?>" class="navbar-brand"><img src="<?php echo e(asset('images/logo.png')); ?>" alt="ConneXuz" /></a>
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="menu-tile">Menu</span>
                <span class="icon-bar top-bar"></span>
                <span class="icon-bar middle-bar"></span>
                <span class="icon-bar bottom-bar"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <?php echo script('js/jquery-3.3.1.min.js'); ?>

                
                
                <input class="form-control mr-sm-2 col-md-4 posts_search_header" type="search" name="posts_search_header" placeholder="Search My Post" value="" aria-label="Search" autocomplete="off">
                <a class="mypost_reset btn btn-sm" style="color:blue; float: right; display: none;"  >Reset</a>
                
                
                <ul class="navbar-nav">
                    <?php if(auth()->guard()->check()): ?>
                        
                        <li class="nav-item"><a href="<?php echo e(route('frontend.index')); ?>" class="nav-link <?php echo e(active_class(Active::checkRoute('frontend.index'))); ?>"><?php echo app('translator')->getFromJson('navs.frontend.menu.interactions'); ?></a></li>

                        
                        <li class="nav-item"><a href="<?php echo e(route('frontend.user.account')); ?>" class="nav-link <?php echo e(active_class(Active::checkRoute('frontend.user.account'))); ?>"><?php echo app('translator')->getFromJson('navs.frontend.menu.profile'); ?></a></li>

                        
                        <li class="nav-item"><a href="<?php echo e(route('frontend.network.list')); ?>" class="nav-link <?php echo e(active_class(Active::checkRoute('frontend.network.list'))); ?>"><?php echo app('translator')->getFromJson('navs.frontend.menu.networks'); ?></a></li>

                        
                        <li class="nav-item"><a href="<?php echo e(route('frontend.user.settings')); ?>" class="nav-link <?php echo e(active_class(Active::checkRoute('frontend.user.settings'))); ?>"><?php echo app('translator')->getFromJson('navs.frontend.menu.settings'); ?></a></li>

                        
                        <li class="nav-item"><a href="<?php echo e(route('frontend.help.list')); ?>" class="nav-link <?php echo e(active_class(Active::checkRoute('frontend.help.list'))); ?>"><?php echo app('translator')->getFromJson('navs.frontend.menu.help'); ?></a></li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php echo e($logged_in_user->first_name); ?><i class="fas fa-angle-down"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenu">
                                <?php if(auth()->user()->can('view backend')): ?>
                                    <a href="<?php echo e(route('admin.dashboard')); ?>" class="dropdown-item">Admin Dashboard</a>
                                    <div class="dropdown-divider"></div>
                                <?php endif; ?>
                                <a href="<?php echo e(route('frontend.user.account')); ?>" class="dropdown-item"><?php echo app('translator')->getFromJson('navs.frontend.menu.profile'); ?></a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo e(route('frontend.auth.logout')); ?>">Logout</a>
                            </div>
                        </li>

                    <?php endif; ?>

                    <?php if(auth()->guard()->guest()): ?>
                        <li class="nav-item"><a href="<?php echo e(route('frontend.auth.login')); ?>" class="nav-link <?php echo e(active_class(Active::checkRoute('frontend.auth.login'))); ?>"><?php echo app('translator')->getFromJson('navs.frontend.login'); ?></a></li>

                        <?php if(config('access.registration')): ?>
                            <li class="nav-item"><a href="<?php echo e(route('frontend.auth.register')); ?>" class="nav-link <?php echo e(active_class(Active::checkRoute('frontend.auth.register'))); ?>"><?php echo app('translator')->getFromJson('navs.frontend.register'); ?></a></li>
                        <?php endif; ?>
                    <?php endif; ?>

                </ul>
            </div>
        </div>
    </nav>
</header>
