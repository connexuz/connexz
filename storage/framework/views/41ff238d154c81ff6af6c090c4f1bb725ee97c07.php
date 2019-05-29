<?php $__env->startSection('title', app_name() . ' | ' . __('labels.frontend.page_title.network')); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('frontend.interaction.top', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<span id="loggedin_user_id"><?php echo e($userId); ?></span>
<!-- START-SEARCH-FRIENDS-SECTION -->
<section class="wp-main-post-listing-wrap-area">
    <div class="container">
        <div class="conn-my-frd-main-section-wrap">
            <div class="row">
                <div class="col-md-6">
                    <div class="connexus-networks-tab-wrap-box">
                        <ul class="connexus-networks-tab-listing">
                            <li class="connexus-networks-tab-list active" id="my_friends_tab">My Friends</li>
                            <li class="connexus-networks-tab-list" id="my_requests_tab">My Friend Requests</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 offset-md-3">
                    <div class="wp-connexus-search-friends-friendlist">
                        <form class="form-inline">
                            <input class="form-control mr-sm-2 col-md-12" type="search" placeholder="Search Friends.." aria-label="Search" id="search_box">
                            <button type="button" class="search-friend-bnt btn-primary" id="search_button"><i class="fas fa-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="my-friends-tab-content all_close">
                <div class="conn-my-frd-section">
                    <div class="row">
                        <?php if($myFriends->count()): ?>
                        <?php $__currentLoopData = $myFriends; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mfk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-4">
                            <div class="conn-my-frd-section-details-wrap">
                                <div class="conn-my-frd-section-img-wrap">
                                    <?php if($mfk->cover_image != ''): ?>
                                    <img src="<?php echo e($mfk->cover_image); ?>" class="img-fluid conn-my-frd-cover-img" width="100%">
                                    <?php else: ?>
                                    <img src="<?php echo e(url('storage/avatars/default_cover_img.png')); ?>" class="img-fluid conn-my-frd-cover-img" width="100%">
                                    <?php endif; ?>
                                    
                                </div>
                                <div class="conn-my-frd-section-profile-img-wrap">
                                    <?php if($mfk->avatar_location != ''): ?>
                                    <img src="<?php echo e($mfk->avatar_location); ?>" class="img-fluid conn-user-img rounded-circle">
                                    <?php else: ?>
                                    <img src="<?php echo e(url('storage/avatars/default_profile_img.png')); ?>" class="img-fluid conn-user-img rounded-circle">
                                    <?php endif; ?>
                                    <p><a href="user/friend/<?php echo e($mfk->invite_user_id); ?>" class="conn-frd-section-name"><?php echo e($mfk->first_name); ?> <?php echo e($mfk->last_name); ?></a></p>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                        <?php if($myAcceptedFriends->count()): ?>
                        <?php $__currentLoopData = $myAcceptedFriends; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mafk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-4">
                            <div class="conn-my-frd-section-details-wrap">
                                <div class="conn-my-frd-section-img-wrap">
                                    <?php if($mafk->cover_image != ''): ?>
                                    <img src="<?php echo e($mafk->cover_image); ?>" class="img-fluid conn-my-frd-cover-img" width="100%">
                                    <?php else: ?>
                                    <img src="<?php echo e(url('storage/avatars/default_cover_img.png')); ?>" class="img-fluid conn-my-frd-cover-img" width="100%">
                                    <?php endif; ?>
                                    
                                </div>
                                <div class="conn-my-frd-section-profile-img-wrap">
                                    <?php if($mafk->avatar_location != ''): ?>
                                    <img src="<?php echo e($mafk->avatar_location); ?>" class="img-fluid conn-user-img rounded-circle">
                                    <?php else: ?>
                                    <img src="<?php echo e(url('storage/avatars/default_profile_img.png')); ?>" class="img-fluid conn-user-img rounded-circle">
                                    <?php endif; ?>
                                    
                                    <p><a href="user/friend/<?php echo e($mafk->user_id); ?>" class="conn-frd-section-name"><?php echo e($mafk->first_name); ?> <?php echo e($mafk->last_name); ?></a></p>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="my-requests-tab-content all_close">
                <div class="conn-my-frd-section">
                    <div class="row">
                        <?php if($myRequests->count()): ?>
                        
                        <?php $__currentLoopData = $myRequests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mrk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <div class="col-md-6" id="my_request_friend_<?php echo e($mrk->uinvite_id); ?>">
                            <div class="connexuz-my-requests-block-wrap">
                                <div class="row">
                                    <div class="col-md-7 col-sm-6">
                                        <div class="row">
                                            <div class="col-md-4 col-5">
                                                <div class="my-request-user-image-wrap">
                                                    <img src="<?php echo e($mrk->avatar_location); ?>" class="img-fluid my-request-user-image"/>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-7">
                                                <div class="my-request-username-wrap">
                                                    <h3 class="my-request-username"><a href="user/friend/<?php echo e($mrk->id); ?>"><?php echo e($mrk->first_name); ?> <?php echo e($mrk->last_name); ?></a></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-sm-6">
                                        <div class="row">
                                            <div class="col-md-6 col-6 custom-paddinng-action-buttons">
                                                <a href="javascript:;" data-action="accept_friend" data-user-id="<?php echo e($mrk->id); ?>"  data-uinvite-id="<?php echo e($mrk->uinvite_id); ?>" class="btn my-request-btn confirm-btn">Accept</a>
                                            </div>
                                            <div class="col-md-6 col-6 custom-paddinng-action-buttons">
                                                <a href="javascript:;" data-action="reject_friend" data-user-id="<?php echo e($mrk->id); ?>"  data-uinvite-id="<?php echo e($mrk->uinvite_id); ?>" class="btn my-request-btn delete-btn">Reject</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>


            <div class="search-friend-tab-content all_close">
                <div class="conn-my-frd-section">
                    <div class="row append_search_result">

                    </div>
                     <div class="load_more_parent">
                        <a href="javascript:;" id="load_more" data-page="1">Load more</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END-SEARCH-FRIENDS-SECTION -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('popup'); ?>
    <?php echo $__env->make('frontend.popup.create-post', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>