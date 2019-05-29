<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">
                <?php echo app('translator')->getFromJson('menus.backend.sidebar.general'); ?>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo e(active_class(Active::checkUriPattern('admin/dashboard'))); ?>" href="<?php echo e(route('admin.dashboard')); ?>">
                    <i class="nav-icon icon-speedometer"></i> <?php echo app('translator')->getFromJson('menus.backend.sidebar.dashboard'); ?>
                </a>
            </li>

            <li class="nav-title">
                <?php echo app('translator')->getFromJson('menus.backend.sidebar.system'); ?>
            </li>

            <?php if($logged_in_user->isAdmin()): ?>
                <li class="nav-item nav-dropdown <?php echo e(active_class(Active::checkUriPattern('admin/auth*'), 'open')); ?>">
                    <a class="nav-link nav-dropdown-toggle <?php echo e(active_class(Active::checkUriPattern('admin/auth*'))); ?>" href="#">
                        <i class="nav-icon icon-user"></i> <?php echo app('translator')->getFromJson('menus.backend.access.title'); ?>

                        <?php if($pending_approval > 0): ?>
                            <span class="badge badge-danger"><?php echo e($pending_approval); ?></span>
                        <?php endif; ?>
                    </a>

                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link <?php echo e(active_class(Active::checkUriPattern('admin/auth/user*'))); ?>" href="<?php echo e(route('admin.auth.user.index')); ?>">
                                <?php echo app('translator')->getFromJson('labels.backend.access.users.management'); ?>

                                <?php if($pending_approval > 0): ?>
                                    <span class="badge badge-danger"><?php echo e($pending_approval); ?></span>
                                <?php endif; ?>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo e(active_class(Active::checkUriPattern('admin/auth/role*'))); ?>" href="<?php echo e(route('admin.auth.role.index')); ?>">
                                <?php echo app('translator')->getFromJson('labels.backend.access.roles.management'); ?>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item nav-dropdown <?php echo e(active_class(Active::checkUriPattern('admin/post*'), 'open')); ?>">
                    <a class="nav-link nav-dropdown-toggle <?php echo e(active_class(Active::checkUriPattern('admin/post*'))); ?>" href="#">
                        <i class="nav-icon icon-note"></i> <?php echo app('translator')->getFromJson('menus.backend.posts.title'); ?>
                    </a>

                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link <?php echo e(active_class(Active::checkUriPattern('admin/post'))); ?>" href="<?php echo e(route('admin.post.index')); ?>">
                                <?php echo app('translator')->getFromJson('labels.backend.posts.management'); ?>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo e(active_class(Active::checkUriPattern('admin/comment'))); ?>" href="<?php echo e(route('admin.comment.index')); ?>">
                                <?php echo app('translator')->getFromJson('labels.backend.comments.management'); ?>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- <li class="nav-item nav-dropdown <?php echo e(active_class(Active::checkUriPattern('admin/group*'), 'open')); ?>">
                    <a class="nav-link nav-dropdown-toggle <?php echo e(active_class(Active::checkUriPattern('admin/group*'))); ?>" href="#">
                        <i class="nav-icon icon-note"></i> <?php echo app('translator')->getFromJson('menus.backend.groups.title'); ?>
                    </a>

                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link <?php echo e(active_class(Active::checkUriPattern('admin/group'))); ?>" href="<?php echo e(route('admin.group.index')); ?>">
                                <?php echo app('translator')->getFromJson('labels.backend.groups.management'); ?>
                            </a>
                        </li>
                    </ul>
                </li> -->

                <li class="nav-item nav-dropdown <?php echo e(active_class(Active::checkUriPattern('admin/faq*'), 'open')); ?>">
                    <a class="nav-link nav-dropdown-toggle <?php echo e(active_class(Active::checkUriPattern('admin/faq*'))); ?>" href="#">
                        <i class="nav-icon icon-note"></i> <?php echo app('translator')->getFromJson('menus.backend.faqs.title'); ?>
                    </a>

                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link <?php echo e(active_class(Active::checkUriPattern('admin/faq'))); ?>" href="<?php echo e(route('admin.faq.index')); ?>">
                                <?php echo app('translator')->getFromJson('labels.backend.faqs.management'); ?>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item nav-dropdown <?php echo e(active_class(Active::checkUriPattern('admin/subscription*'), 'open')); ?>">
                    <a class="nav-link nav-dropdown-toggle <?php echo e(active_class(Active::checkUriPattern('admin/subscription*'))); ?>" href="#">
                        <i class="nav-icon icon-note"></i> <?php echo app('translator')->getFromJson('menus.backend.subscriptions.title'); ?>
                    </a>

                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link <?php echo e(active_class(Active::checkUriPattern('admin/subscription'))); ?>" href="<?php echo e(route('admin.subscription.index')); ?>">
                                <?php echo app('translator')->getFromJson('labels.backend.subscriptions.management'); ?>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item nav-dropdown <?php echo e(active_class(Active::checkUriPattern('admin/user_subscription*'), 'open')); ?>">
                    <a class="nav-link nav-dropdown-toggle <?php echo e(active_class(Active::checkUriPattern('admin/user_subscription*'))); ?>" href="#">
                        <i class="nav-icon icon-note"></i> <?php echo app('translator')->getFromJson('menus.backend.user_subscriptions.title'); ?>
                    </a>

                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link <?php echo e(active_class(Active::checkUriPattern('admin/user_subscription'))); ?>" href="<?php echo e(route('admin.usersubscription.index')); ?>">
                                <?php echo app('translator')->getFromJson('labels.backend.user_subscriptions.management'); ?>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item nav-dropdown <?php echo e(active_class(Active::checkUriPattern('admin/invite*'), 'open')); ?>">
                    <a class="nav-link nav-dropdown-toggle <?php echo e(active_class(Active::checkUriPattern('admin/invite*'))); ?>" href="#">
                        <i class="nav-icon icon-note"></i> <?php echo app('translator')->getFromJson('menus.backend.invites.title'); ?>
                    </a>

                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link <?php echo e(active_class(Active::checkUriPattern('admin/invite'))); ?>" href="<?php echo e(route('admin.invite.index')); ?>">
                                <?php echo app('translator')->getFromJson('labels.backend.invites.management'); ?>
                            </a>
                        </li>
                    </ul>
                </li>
                
                <a class="nav-link <?php echo e(active_class(Active::checkUriPattern('admin/setting*'))); ?>" href="<?php echo e(route('admin.setting.index')); ?>">
                <li class="nav-item">
                        <i class="nav-icon icon-settings"></i> <?php echo app('translator')->getFromJson('menus.backend.settings.title'); ?>
                    </li>
                </a>

            <?php endif; ?>

            <li class="divider"></li>

            <!-- <li class="nav-item nav-dropdown <?php echo e(active_class(Active::checkUriPattern('admin/log-viewer*'), 'open')); ?>">
                <a class="nav-link nav-dropdown-toggle <?php echo e(active_class(Active::checkUriPattern('admin/log-viewer*'))); ?>" href="#">
                    <i class="nav-icon icon-list"></i> <?php echo app('translator')->getFromJson('menus.backend.log-viewer.main'); ?>
                </a>

                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(active_class(Active::checkUriPattern('admin/log-viewer'))); ?>" href="<?php echo e(route('log-viewer::dashboard')); ?>">
                            <?php echo app('translator')->getFromJson('menus.backend.log-viewer.dashboard'); ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(active_class(Active::checkUriPattern('admin/log-viewer/logs*'))); ?>" href="<?php echo e(route('log-viewer::logs.list')); ?>">
                            <?php echo app('translator')->getFromJson('menus.backend.log-viewer.logs'); ?>
                        </a>
                    </li>
                </ul>
            </li> -->
        </ul>
    </nav>

    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div><!--sidebar-->
