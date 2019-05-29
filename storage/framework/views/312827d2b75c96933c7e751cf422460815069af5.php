<?php
$post_type = 'text';
$cl = "";
?>
<?php if(count($myPost->post_images) < 1): ?>
<?php $cl = "wp-single-img-text"; ?>
<?php endif; ?>
<div class="wp-single-post-list <?php echo e($cl); ?>">
    <div class="row m-0">
        <div class="col-md-7 p-0">
            <?php if(count($myPost->post_images) > 0): ?>
            <div class="conn-my-post-img-wrap">

                <div class="owl-carousel owl-theme user-post-img-video-carousel">
                    <?php $__currentLoopData = $myPost->post_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $media): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($media->type == 'video'): ?>
                    <div class="item">
                        <video width="100%" controls autoplay repeat>
                            <source src="<?php echo e(asset('video/post/'.$myPost->id.'/'.$media->name)); ?>" type="video/mp4">
                            <!-- <source src="http://techslides.com/demos/sample-videos/small.ogg" type="video/ogg"> -->
                            Your browser does not support HTML5 video.
                        </video>
                    </div>
                    <?php else: ?>
                    <div class="item">
                        <img src="<?php echo e(asset('images/post/'.$myPost->id.'/'.$media->name)); ?>" class="img-fluid">
                    </div>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <?php
            $post_type = 'media';
            ?>
            <?php else: ?>
            <div class="wp-single-post-content-wrap-area">
                <div class="wp-single-post-content-wrap">
                    <div class="media">
                        <img src="<?php echo e($myPost->user->avatar_location); ?>" alt="Img" class="mr-3 rounded-circle" width="50px">
                        <div class="media-body">
                            <div class="conn-my-post-details-user-title">
                                <h5 class="publisher-name-text"><?php echo e($myPost->user->first_name.' '.$myPost->user->last_name); ?> </h5>
                                <p class="published-time-ago-text">Published at <?php echo e($myPost->created_at->diffForHumans()); ?></p>
                            </div>
                            <div class="conn-like-unlike-icon-wrap">
                                <span class="conn-like-icon"><a href="javascript:void(0);" id="postLike-<?php echo e($myPost->id); ?>" class="<?php echo e((getPostUserLike($myPost->user_id,$myPost->id))?'postLike active':'postLike'); ?>" data-id="<?php echo e($myPost->id); ?>" ><i class="fas fa-thumbs-up"> </i> Like</a>
                                    <?php if(!empty($myPost->post_likes) && count($myPost->post_likes) > 0): ?>
                                    <div class="wp-total-likes-name-and-count">
                                        <?php $__currentLoopData = $myPost->post_likes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <span><?php echo e($items->user->first_name.' '.$items->user->last_name); ?></span>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(count($myPost->post_likes) > 5): ?>
                                        <span>.. <?php echo e(count($myPost->post_likes) - 5); ?> more</span>
                                        <?php endif; ?>
                                    </div>
                                    <?php endif; ?>
                                </span>
                                <!-- <span class="conn-unlike-icon"><a href="#"><i class="fas fa-thumbs-down"> 0</i></a></span> -->

                            </div>
                            <div class="conn-my-post-commemnt-content">
                                <?php echo $myPost->description; ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
        <div class="col-md-5 p-0">
            <div class="wp-single-post-content-wrap-area">
                <?php if($post_type == 'media'): ?>
                <div class="wp-single-post-content-wrap">
                    <div class="media">
                        <img src="<?php echo e($myPost->user->avatar_location); ?>" alt="Img" class="mr-3 rounded-circle" width="50px">
                        <div class="media-body">
                            <div class="conn-my-post-details-user-title">
                                <h5 class="publisher-name-text"><?php echo e($myPost->user->first_name.' '.$myPost->user->last_name); ?> </h5>
                                <p class="published-time-ago-text">Published about <?php echo e($myPost->created_at->diffForHumans()); ?></p>
                            </div>
                            <div class="conn-like-unlike-icon-wrap">
                                <span class="conn-like-icon"><a href="javascript:void(0);" id="postLike-<?php echo e($myPost->id); ?>" class="<?php echo e((getPostUserLike($myPost->user_id,$myPost->id))?'postLike active':'postLike'); ?>" data-id="<?php echo e($myPost->id); ?>" ><i class="fas fa-thumbs-up"> </i> Like</a>
                                    <?php if(!empty($myPost->post_likes) && count($myPost->post_likes) > 0): ?>
                                    <div class="wp-total-likes-name-and-count">
                                        <?php $__currentLoopData = $myPost->post_likes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <span><?php echo e($items->user->first_name.' '.$items->user->last_name); ?></span>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(count($myPost->post_likes) > 5): ?>
                                        <span>.. <?php echo e(count($myPost->post_likes) - 5); ?> more</span>
                                        <?php endif; ?>
                                    </div>
                                    <?php endif; ?>
                                </span>
                                <!-- <span class="conn-unlike-icon"><a href="#"><i class="fas fa-thumbs-down"> 0</i></a></span> -->

                            </div>
                            <div class="conn-my-post-commemnt-content">
                                <?php echo $myPost->description; ?></div>

                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <?php if(count($myPost->post_comments)>0): ?>
            <?php $post_comments = $myPost->post_comments ?>
            <div class="wp-single-post-comment-listing-wrap">
                <?php $__currentLoopData = $myPost->post_comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="single-media-comment-list">
                    <div class="media">
                        <img src="<?php echo e($comment->user->avatar_location); ?>" alt="Img" class="mr-3 mt-1 rounded-circle" width="50px">
                        <div class="media-body">
                            <div class="conn-my-post-details-user-title">
                                <h5 class="publisher-name-text">
                                    <?php echo e(getUserName($comment->user_id)); ?>

                                    <span class="comments-text-content" style="white-space: pre-line;">
                                        <?php echo $comment->description; ?>

                                    </span>
                                    <div class="like-comment-replay-wrap-boxx">
                                        <a href="javascript:void(0);" id="comment-<?php echo e($comment->id); ?>" class="<?php echo e((getCommentUserLike($comment->user_id,$comment->id))?'like-comment-replay-link lin commentLike active':'like-comment-replay-link lin commentLike'); ?>" data-id="<?php echo e($comment->id); ?>" data-post="<?php echo e($myPost->id); ?>" ><i class="fas fa-thumbs-up"> </i> </a>
                                        <?php if($comment->user_id != $logged_in_user->id): ?>
                                        <a href="javascript:void(0);" class="like-comment-replay-link link replay_comment" data-id="<?php echo e($comment->id); ?>"><i class="fas fa-reply"></i> </a>
                                        <?php endif; ?>
                                    </div>
                                    <?php if(!empty($comment->replay_comment) && count($comment->replay_comment)>0): ?>
                                    <?php $__currentLoopData = $comment->replay_comment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $replay_comments): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="single-media-comment-list">
                                        <div class="media">
                                            <img src="<?php echo e($replay_comments->user->avatar_location); ?>" alt="Img" class="mr-3 rounded-circle" width="50px">
                                            <div class="media-body">
                                                <div class="conn-my-post-details-user-title">
                                                    <h5 class="publisher-name-text">
                                                        <?php echo e(getUserName($replay_comments->user_id)); ?>

                                                        <span class="comments-text-content" style="white-space: pre-line;">
                                                            <?php echo $replay_comments->description; ?>

                                                        </span>
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                    <?php if($comment->user_id != $logged_in_user->id): ?>
                                    <div class="wp-single-poste-single-commemnt-replay-wrap replay-form-popup" id="replay-form-popup-<?php echo e($comment->id); ?>">
                                        <div class="wp-single-poste-single-commemnt-replay-img-wrap">
                                            <img src="<?php echo e($logged_in_user->avatar_location); ?>" alt="<?php echo e($logged_in_user->name); ?>" class="mr-3 rounded-circle img-fluid">
                                        </div>
                                        <div class="wp-single-poste-single-commemnt-replay-form-wrap">
                                            <?php echo e(html()->form('POST', route('frontend.post.comment.send'))->class('post-comment-form popup_postcomment_form')->id('replay-comment-form')->open()); ?>


                                            <?php echo e(html()->textarea('post_comment')
                                                                        ->class('form-control popup_postcomment')
                                                                        ->placeholder('Post a Comment')
                                                                        ->attributes(['rows' =>'1'])); ?>

                                            <?php echo e(html()->hidden('post_id')->value($myPost->id)); ?>

                                            <?php echo e(html()->hidden('user_id')->value($myPost->user_id)); ?>

                                            <?php echo e(html()->hidden('replay')->value('1')); ?>

                                            <?php echo e(html()->hidden('comment_id')->value($comment->id)); ?>


                                            <?php echo e(html()->button('<i class="fab fa-telegram-plane"></i>')->class('btn btn-sumnit-comment post-comment')); ?>

                                            

                                            <?php echo e(html()->form()->close()); ?>

                                        </div>
                                    </div>
                                    <?php endif; ?>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <?php endif; ?>

            <div class="wp-single-post-comment-wrap">
                <div class="media connexus-comment-section-wrap connexus-input-section-wrap">
                    <img src="<?php echo e($myPost->user->avatar_location); ?>" alt="Jane Doe" class="mr-3 mt-1 rounded-circle" width="50px">
                    <div class="media-body">
                        <?php echo e(html()->form('POST', route('frontend.post.comment.send'))->class('post-comment-form popup_post_comment')->id('comment-form')->open()); ?>


                        <?php echo e(html()->textarea('post_comment')
                                    ->class('form-control main_popup_postcomment error_popup_postcomment')
                                    ->placeholder('Post a Comment')
                                    ->attributes(['rows' =>'1'])); ?>

                        <?php echo e(html()->hidden('post_id')->value($myPost->id)); ?>

                        <?php echo e(html()->hidden('user_id')->value($myPost->user_id)); ?>

                        <?php echo e(html()->hidden('replay')->value('0')); ?>


                        <button class="btn btn-sumnit-comment post-comment btn_popup_main_postcomment" type="button"><i class="fab fa-telegram-plane"></i></button>
                        <?php echo e(html()->form()->close()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script>

$(document).on('click','.btn_popup_main_postcomment',function(){
        var postcomment = $('.main_popup_postcomment').val();
        if(postcomment == ''){
            $('.error_popup_postcomment').attr('style','border-color:red');
        }else{
            $('.popup_post_comment').submit();
        }
    });
    $('.replay-form-popup').hide();

    $(".replay_comment").click(function () {
        var id = $(this).data('id');
        $('#replay-form-popup-' + id).toggle();
    });

    $('.user-post-img-video-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        mouseDrag: false,
        dots: false,
        URLhashListener: true,
        autoplay: false,
        autoplayTimeout: 5000,
        onTranslate: function () {
            $('.owl-item').find('video').each(function () {
                this.pause();
            });
        },
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    })
</script>
