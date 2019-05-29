<?php $__env->startSection('title', app_name() . ' | ' . __('labels.frontend.page_title.profile') ); ?>

<?php $__env->startSection('content'); ?>

<!-- START<profile-cover-img> -->
<section class="conn-profile-details-main-section-wrap">
    <div class="">
        <div class="row">
            <div class="col-md-12">
                <div class="conn-profile-cover-img-section-wrap">
                    <img src="<?php echo e($userDetail->cover_image); ?>" class="img-fluid conn-profile-cover-img">
                    <div class="conn-profile-img-wrap-section">
                        <img src="<?php echo e($userDetail->avatar_location); ?>" class="img-fluid conn-profile-cover-img-subimg rounded-circle">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END<profile-cover-img> -->

    <!-- START<profile-cover-details> -->
<section class="conn-profile-details-sub-section-wrap">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="conn-main-tabs-section">

                    <ul class="nav nav-tabs nav-tabs--vertical nav-tabs--left" role="navigation">
                        <div class="conn-profile-name-wrap">
                            <p class="text-left profile-name"><?php echo e($userDetail->full_name); ?></p>
                        </div>
                    </ul>

                    <div class="tab-content">
                        <!-- <START---basic-info> -->
                        <div class="tab-pane fade show active" id="basic-info" role="tabpanel">
                            <div class="main-details-wrap">
                                
                                <div class="title-wrap">
                                    <p class="title-name">About <?php echo e($userDetail->full_name); ?></p>
                                </div>
                                <?php if($userDetail->show_profile == 1): ?>
                                <div class="deatils-content-wrap">
                                    <p class="content-text">
                                        <?php echo e($userDetail->about); ?>

                                    </p>
                                </div>
                                <?php endif; ?>
                                <div class="main-detail-of-field-wrap">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6">
                                            <div class="single-info-view">
                                                <p class="single-info-view-title">Name: <span class="single-info-view-title-ans"><?php echo e($userDetail->full_name); ?></span></p>

                                            </div>
                                        </div>
                                        <?php if($userDetail->show_profile == 1): ?>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="single-info-view">
                                                <p class="single-info-view-title">Born Year: <span class="single-info-view-title-ans"><?php echo e(\Carbon\Carbon::parse($userDetail->date_of_birth)->format('Y')); ?></span></p>
                                            </div>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                    <?php if($userDetail->show_profile == 1): ?>
                                    <div class="row" style="display:none;">
                                        <div class="col-md-6 col-sm-6">
                                            <div class="single-info-view">
                                                <p class="single-info-view-title">Email: <span class="single-info-view-title-ans"><?php echo e($userDetail->email); ?></span></p>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="single-info-view">
                                                <p class="single-info-view-title">Gender: <span class="single-info-view-title-ans"><?php echo e(($userDetail->gender == "1")? "Male": "Female"); ?></span></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6">
                                            <div class="single-info-view">
                                                <p class="single-info-view-title">City: <span class="single-info-view-title-ans"><?php echo e($userDetail->city); ?></span></p>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="single-info-view">
                                                <p class="single-info-view-title">Country: <span class="single-info-view-title-ans"><?php echo e(getCountryName($userDetail->country)); ?></span></p>
                                            </div>
                                        </div>
                                    </div>
                                     <?php if($userDetail->show_email == 1): ?>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="single-info-view">
                                                <p class="single-info-view-title">Email: <span class="single-info-view-title-ans"><?php echo e($userDetail->email); ?></span></p>
                                            </div>
                                        </div>
                                    </div>
                                     <?php endif; ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="single-info-view">
                                                <p class="single-info-view-title">My Interest:</p>
                                                <div class="serach-genrens ">
                                                    <ul class="search-genres-list">
                                                        <?php if($userInterest->count()): ?>
                                                        <?php $__currentLoopData = $userInterest; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $uik): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <li class="search-genres-list-item"><?php echo e($uik->title); ?></li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php endif; ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>