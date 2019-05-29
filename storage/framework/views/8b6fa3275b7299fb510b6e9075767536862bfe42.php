<div class="col">
    <div class="table-responsive">
        <table class="table table-hover backuser_overview_table">
            <tr>
                <th><?php echo app('translator')->getFromJson('labels.backend.access.users.tabs.content.overview.avatar'); ?></th>
                <td><img src="<?php echo e($user->avatar_location); ?>" class="user-profile-image" /></td>
            </tr>

            <tr>
                <th><?php echo app('translator')->getFromJson('labels.backend.access.users.tabs.content.overview.name'); ?></th>
                <td><?php echo e($user->name); ?></td>
            </tr>

            <tr>
                <th><?php echo app('translator')->getFromJson('labels.backend.access.users.tabs.content.overview.email'); ?></th>
                <td><?php echo e($user->email); ?></td>
            </tr>
            
            <tr>
                <th><?php echo app('translator')->getFromJson('labels.backend.access.users.tabs.content.overview.date_of_birth'); ?></th>
                <td><?php echo e(date("d-m-Y", strtotime($user->date_of_birth))); ?></td>
            </tr>
            
            <tr>
                <th><?php echo app('translator')->getFromJson('labels.backend.access.users.tabs.content.overview.gender'); ?></th>
                <td><?php echo e(($user->gender == 1) ? "Male": "Female"); ?></td>
            </tr>
            
            <tr>
                <th><?php echo app('translator')->getFromJson('labels.backend.access.users.tabs.content.overview.city'); ?></th>
                <td><?php echo e($user->city); ?></td>
            </tr>
            
            <tr>
                <th><?php echo app('translator')->getFromJson('labels.backend.access.users.tabs.content.overview.country'); ?></th>
                <td><?php echo e($user->country); ?></td>
            </tr>
            
            <tr>
                <th><?php echo app('translator')->getFromJson('labels.backend.access.users.tabs.content.overview.mobile_numer'); ?></th>
                <td><?php echo e($user->mobile_number); ?></td>
            </tr>
            
            <tr>
                <th><?php echo app('translator')->getFromJson('labels.backend.access.users.tabs.content.overview.about'); ?></th>
                <td><?php echo e($user->about); ?></td>
            </tr>
            
            <tr>
                <th><?php echo app('translator')->getFromJson('labels.backend.access.users.tabs.content.overview.user_university'); ?></th>
                <td><?php echo e($user->university); ?></td>
            </tr>
            
            <tr>
                <th><?php echo app('translator')->getFromJson('labels.backend.access.users.tabs.content.overview.from'); ?></th>
                <td><?php echo e(date("d-m-Y", strtotime($user->education_from_date))); ?></td>
            </tr>
            
            <tr>
                <th><?php echo app('translator')->getFromJson('labels.backend.access.users.tabs.content.overview.to'); ?></th>
                <td><?php echo e(date("d-m-Y", strtotime($user->education_to_date))); ?></td>
            </tr>
            
            <tr>
                <th><?php echo app('translator')->getFromJson('labels.backend.access.users.tabs.content.overview.about_university'); ?></th>
                <td><?php echo e($user->education_about); ?></td>
            </tr>
            
            <tr>
                <th><?php echo app('translator')->getFromJson('labels.backend.access.users.tabs.content.overview.user_interests'); ?></th>
                <td>
                    <?php if($interest->count()): ?>
                                            <?php $__currentLoopData = $interest; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ik): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                                echo $ik->title."<br/>"
                                            ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                </td>
            </tr>

            <tr>
                <th><?php echo app('translator')->getFromJson('labels.backend.access.users.tabs.content.overview.status'); ?></th>
                <td><?php echo $user->status_label; ?></td>
            </tr>

            <tr>
                <th><?php echo app('translator')->getFromJson('labels.backend.access.users.tabs.content.overview.confirmed'); ?></th>
                <td><?php echo $user->confirmed_label; ?></td>
            </tr>

            <tr>
                <th><?php echo app('translator')->getFromJson('labels.backend.access.users.tabs.content.overview.timezone'); ?></th>
                <td><?php echo e($user->timezone); ?></td>
            </tr>

            <tr>
                <th><?php echo app('translator')->getFromJson('labels.backend.access.users.tabs.content.overview.last_login_at'); ?></th>
                <td>
                    <?php if($user->last_login_at): ?>
                        <?php echo e(timezone()->convertToLocal($user->last_login_at)); ?>

                    <?php else: ?>
                        N/A
                    <?php endif; ?>
                </td>
            </tr>

            <tr>
                <th><?php echo app('translator')->getFromJson('labels.backend.access.users.tabs.content.overview.last_login_ip'); ?></th>
                <td><?php echo e($user->last_login_ip ?? 'N/A'); ?></td>
            </tr>
        </table>
    </div>
</div><!--table-responsive-->
