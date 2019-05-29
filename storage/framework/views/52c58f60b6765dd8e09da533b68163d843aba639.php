
<?php if(count($friendPostData)>0): ?>
<!--$myFriend->post_comments-->
<?php // echo '<pre>'; print_r($friendPostData[0]->post_likes->first()); exit; ?>
<?php
$comment_like_array = array();
$post_like_array = array();
?>

<?php if(!empty($commentlist->first())): ?>
    <?php $__currentLoopData = $commentlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php
        $comment_like_array[$row->post_id][$row->comment_id] = $row->user_id;
    ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

<?php if(!empty($friendPostData[0]->post_likes->first())): ?>
<?php $__currentLoopData = $friendPostData[0]->post_likes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php
        $post_like_array[$row->user_id][$row->post_id] = $row->id;
    ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

<?php // echo '<pre>'; print_r($post_like_array); exit; ?>
<?php $__currentLoopData = $friendPostData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $myFriend): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php // print_r($myFriend->user->add_comment); exit; ?>
<?php
$post_type = 'text';
$cl = "";
?>
<?php if(count($myFriend->post_images) < 1): ?>
<?php $cl = "wp-single-img-text"; ?>
<?php endif; ?>
<div class="wp-single-post-list <?php echo e($cl); ?>">
    <div class="row m-0">
        <div class="col-md-6 p-0">
            <?php if(count($myFriend->post_images) > 0): ?>
            <div class="conn-my-post-img-wrap">

                <div class="owl-carousel owl-theme user-post-img-video-carousel">
                    <?php $__currentLoopData = $myFriend->post_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $media): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($media->type == 'video'): ?>
                    <div class="item">
                        <a href="javascript:void(0)" class="posts-view-popup" data-toggle="modal" data-target="#postModal" data-id="<?php echo e($myFriend->id); ?>" data-placement="top"><video width="100%" controls id="video-one">
                                <source src="<?php echo e(asset('video/post/'.$myFriend->id.'/'.$media->name,true)); ?>" type="video/mp4">
                                Your browser does not support HTML5 video.
                            </video></a>
                        <input type="hidden" id="" value="firstclick" />
                    </div>
                    <?php else: ?>
                    <div class="item">
                        <a href="javascript:void(0)" class="posts-view-popup" data-toggle="modal" data-target="#postModal" data-id="<?php echo e($myFriend->id); ?>" data-placement="top"><img src="<?php echo e(asset('images/post/'.$myFriend->id.'/'.$media->name,true)); ?>" class="img-fluid"></a>

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
<?php
$headers = @get_headers($myFriend->user->avatar_location);
if ($headers && $headers[0] != 'HTTP/1.1 404 Not Found') {
    $url_exist = true;
} else {
    $url_exist = false;
}
?>
                        <?php if($url_exist): ?>
                        <img src="<?php echo e($myFriend->user->avatar_location); ?>" alt="<?php echo e($myFriend->user->name); ?>" class="mr-3 mt-1 rounded-circle" width="40px">
                        <?php else: ?>
                        <img src="<?php echo e(asset('images/user.png')); ?>" alt="<?php echo e($myFriend->user->name); ?>" class="mr-3 mt-1 rounded-circle" width="40px">
                        <?php endif; ?>

                        <div class="media-body">
                            <div class="conn-my-post-details-user-title">
                                <h5 class="publisher-name-text"><?php echo e($myFriend->user->first_name.' '.$myFriend->user->last_name); ?> </h5>
                                <p class="published-time-ago-text">Published at <?php echo e($myFriend->created_at->diffForHumans()); ?></p>
                            </div>
                            <?php if($myFriend->user->add_likes == 1): ?>
                            <div class="conn-like-unlike-icon-wrap">
                                <!--<span class="conn-like-icon"><a href="javascript:void(0);" id="postLike-<?php echo e($myFriend->id); ?>" class="<?php echo e((getPostUserLike(Auth::user()->id,$myFriend->id))?'postLike active':'postLike'); ?>" data-id="<?php echo e($myFriend->id); ?>" ><i class="fas fa-thumbs-up"> </i> Like</a>-->
                                    <span class="conn-like-icon"><a href="javascript:void(0);" id="postLike-<?php echo e($myFriend->id); ?>" class="<?php echo e((isset($post_like_array[Auth::user()->id][$myFriend->id]))?'postLike active':'postLike'); ?>" data-id="<?php echo e($myFriend->id); ?>" ><i class="fas fa-thumbs-up"> </i> Like</a>
                                    <?php if(!empty($myFriend->post_likes) && count($myFriend->post_likes) > 0): ?>
                                    <div class="wp-total-likes-name-and-count">
                                        <?php $__currentLoopData = $myFriend->post_likes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <span><?php echo e($items->user->first_name.' '.$items->user->last_name); ?></span>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(count($myFriend->post_likes) > 5): ?>
                                        <span>.. <?php echo e(count($myFriend->post_likes) - 5); ?> more</span>
                                        <?php endif; ?>
                                    </div>
                                    <?php endif; ?>
                                </span>
                                <!-- <span class="conn-unlike-icon"><a href="#"><i class="fas fa-thumbs-down"> 0</i></a></span> -->
                                <!-- <span class="expand-post-btn-icon"><a href="javascript:void(0)" title="Read more" class="r-bttn posts-view-popup" data-toggle="modal" data-target="#postModal" data-id="<?php echo e($myFriend->id); ?>" data-placement="top"><i class="fas fa-expand"></i></a></span> -->
                            </div>
                            <?php endif; ?>

                            <div class="conn-my-post-commemnt-content">
                                <?php echo $myFriend->description; ?></div>

                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
        <div class="col-md-6 p-0">
            <div class="wp-single-post-content-wrap-area">
                <?php if($post_type == 'media'): ?>
                <div class="wp-single-post-content-wrap">
                    <div class="media">
<?php
$headers = @get_headers($myFriend->user->avatar_location);
if ($headers && $headers[0] != 'HTTP/1.1 404 Not Found') {
    $url_exist = true;
} else {
    $url_exist = false;
}
?>
                        <?php if($url_exist): ?>
                        <img src="<?php echo e($myFriend->user->avatar_location); ?>" alt="<?php echo e($myFriend->user->name); ?>" class="mr-3 mt-1 rounded-circle" width="40px">
                        <?php else: ?>
                        <img src="<?php echo e(asset('images/user.png')); ?>" alt="<?php echo e($myFriend->user->name); ?>" class="mr-3 mt-1 rounded-circle" width="40px">
                        <?php endif; ?>

                        <div class="media-body">
                            <div class="conn-my-post-details-user-title">
                                <h5 class="publisher-name-text"><?php echo e($myFriend->user->first_name.' '.$myFriend->user->last_name); ?> </h5>
                                <p class="published-time-ago-text">Published about <?php echo e($myFriend->created_at->diffForHumans()); ?></p>
                            </div>
                            
                            <?php if($myFriend->user->add_likes == 1): ?>
                            <div class="conn-like-unlike-icon-wrap">
                                <?php
                                $likes = App\Models\Post\PostLikes::where('user_id', Auth::user()->id)->where('post_id', $myFriend->id)->first();
                                
                                if ($likes != null) {
                                        $postLike = 1;
                                } else {
                                        $postLike = 0;
                                }
                                ?>
                                <span class="conn-like-icon"><a href="javascript:void(0);" id="postLike-<?php echo e($myFriend->id); ?>" class="<?php echo e(($postLike)?'postLike active':'postLike'); ?>" data-id="<?php echo e($myFriend->id); ?>" ><i class="fas fa-thumbs-up"> </i> Like</a>
                                    <?php if(!empty($myFriend->post_likes) && count($myFriend->post_likes) > 0): ?>
                                    <div class="wp-total-likes-name-and-count">
                                        <?php $__currentLoopData = $myFriend->post_likes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <span><?php echo e($items->user->first_name.' '.$items->user->last_name); ?></span>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(count($myFriend->post_likes) > 5): ?>
                                        <span>.. <?php echo e(count($myFriend->post_likes) - 5); ?> more</span>
                                        <?php endif; ?>
                                    </div>
                                    <?php endif; ?>
                                </span>
                                <!-- <span class="conn-unlike-icon"><a href="#"><i class="fas fa-thumbs-down"> 0</i></a></span> -->
                                <span class="expand-post-btn-icon"><a href="javascript:void(0)" title="Read more" class="r-bttn posts-view-popup" data-toggle="modal" data-target="#postModal" data-id="<?php echo e($myFriend->id); ?>" data-placement="top"><i class="fas fa-expand"></i></a></span>
                            </div>
                            <?php endif; ?>
                            
                            <div class="conn-my-post-commemnt-content">
                                <?php echo $myFriend->description; ?></div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>


                <?php if($post_type != 'media'): ?>
                <div class="text-content-expand">
                    <span class="expand-post-btn-icon"><a href="javascript:void(0)" title="Read more" class="r-bttn posts-view-popup" data-toggle="modal" data-target="#postModal" data-id="<?php echo e($myFriend->id); ?>" data-placement="top"><i class="fas fa-expand"></i></a></span>
                </div>
                <?php endif; ?>
                <?php if(count($myFriend->post_comments)>0): ?>
                <?php $post_comments = $myFriend->post_comments ?>
                <?php if($myFriend->user->show_comment == 1): ?>
                <div class="wp-single-post-comment-listing-wrap">
                    <?php $__currentLoopData = $myFriend->post_comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="single-media-comment-list">
                        <div class="media">
<?php
$headers = @get_headers($comment->user->avatar_location);
if ($headers && $headers[0] != 'HTTP/1.1 404 Not Found') {
    $url_exist = true;
} else {
    $url_exist = false;
}
?>
                            <?php if($url_exist): ?>
                            <img src="<?php echo e($comment->user->avatar_location); ?>" alt="<?php echo e($comment->user->name); ?>" class="mr-3 mt-1 rounded-circle" width="40px">
                            <?php else: ?>
                            <img src="<?php echo e(asset('images/user.png')); ?>" alt="<?php echo e($comment->user->name); ?>" class="mr-3 mt-1 rounded-circle" width="40px">
                            <?php endif; ?>

                            <div class="media-body">
                                <div class="conn-my-post-details-user-title">
                                    <h5 class="publisher-name-text">
                                        <?php echo e(getUserName($comment->user_id)); ?>

                                        <span class="comments-text-content" style="white-space: pre-line;">
                                            <?php echo $comment->description; ?>

                                        </span>
                                        <div class="like-comment-replay-wrap-boxx">
                                            <!--<a href="javascript:void(0);" id="comment-<?php echo e($comment->id); ?>" class="<?php echo e((getCommentUserLike($comment->user_id,$comment->id))?'like-comment-replay-link lin commentLike active':'like-comment-replay-link lin commentLike'); ?>" data-id="<?php echo e($comment->id); ?>" data-post="<?php echo e($myFriend->id); ?>" ><i class="fas fa-thumbs-up"> </i> Like</a>-->
                                            <a href="javascript:void(0);" id="comment-<?php echo e($comment->id); ?>" class="<?php echo e((isset($comment_like_array[$myFriend->id][$comment->id]))?'like-comment-replay-link lin commentLike active':'like-comment-replay-link lin commentLike'); ?>" data-id="<?php echo e($comment->id); ?>" data-post="<?php echo e($myFriend->id); ?>" ><i class="fas fa-thumbs-up"> </i> Like</a>
                                            
                                            <?php if($comment->user_id != $logged_in_user->id): ?>
                                            <a href="javascript:void(0);" class="like-comment-replay-link link replay_comment" data-id="<?php echo e($comment->id); ?>"><i class="fas fa-reply"></i> Reply</a>
                                            <?php endif; ?>
                                        </div>
                                        <?php if(!empty($comment->replay_comment) && count($comment->replay_comment)>0): ?>
                                        <?php $__currentLoopData = $comment->replay_comment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $replay_comments): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="single-media-comment-list">
                                            <div class="media">
                                        <?php
                                        $headers = @get_headers($replay_comments->user->avatar_location);
                                        if ($headers && $headers[0] != 'HTTP/1.1 404 Not Found') {
                                            $url_exist = true;
                                        } else {
                                            $url_exist = false;
                                        }
                                        ?>
                                                <?php if($url_exist): ?>
                                                <img src="<?php echo e($replay_comments->user->avatar_location); ?>" alt="<?php echo e($replay_comments->user->name); ?>" class="mr-3 mt-1 rounded-circle" width="40px">
                                                <?php else: ?>
                                                <img src="<?php echo e(asset('images/user.png')); ?>" alt="<?php echo e($replay_comments->user->name); ?>" class="mr-3 mt-1 rounded-circle" width="40px">
                                                <?php endif; ?>

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
                                        <div class="wp-single-poste-single-commemnt-replay-wrap replay-form" id="replay-form-<?php echo e($comment->id); ?>">
                                            <div class="wp-single-poste-single-commemnt-replay-img-wrap">
                                                            <?php
                                                            $headers = @get_headers($logged_in_user->avatar_location);
                                                            if ($headers && $headers[0] != 'HTTP/1.1 404 Not Found') {
                                                                $url_exist = true;
                                                            } else {
                                                                $url_exist = false;
                                                            }
                                                            ?>
                                                <?php if($url_exist): ?>
                                                <img src="<?php echo e($logged_in_user->avatar_location); ?>" alt="<?php echo e($logged_in_user->name); ?>" class="mr-3 mt-1 rounded-circle" width="40px">
                                                <?php else: ?>
                                                <img src="<?php echo e(asset('images/user.png')); ?>" alt="<?php echo e($logged_in_user->name); ?>" class="mr-3 mt-1 rounded-circle" width="40px">
                                                <?php endif; ?>

                                            </div>
                                            <div class="wp-single-poste-single-commemnt-replay-form-wrap">
                                                <?php echo e(html()->form('POST', route('frontend.post.comment.send'))->class('post-comment-form')->id('replay-comment-form')->open()); ?>


                                                <?php echo e(html()->textarea('post_comment')
                                                                        ->class('form-control postcomment')
                                                                        ->placeholder('Post a Comment')
                                                                        ->attributes(['rows' =>'1'])); ?>

                                                <?php echo e(html()->hidden('post_id')
                                                                        ->value($myFriend->id)); ?>

                                                <?php echo e(html()->hidden('user_id')
                                                                        ->value($myFriend->user_id)); ?>

                                                <?php echo e(html()->hidden('replay')
                                                                        ->value('1')); ?>

                                                <?php echo e(html()->hidden('comment_id')
                                                                        ->value($comment->id)); ?>

                                                <?php echo e(html()->button('<i class="fab fa-telegram-plane"></i>')->class('btn btn-sumnit-comment post-comment post_btn_comment')); ?>

                                                

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
                <?php endif; ?>
                <?php if($myFriend->user->add_comment == 1): ?>
                <div class="wp-single-post-comment-wrap">
                    <div class="media connexus-comment-section-wrap connexus-input-section-wrap">
                                                            <?php
                                                            $headers = @get_headers($myFriend->user->avatar_location);
                                                            if ($headers && $headers[0] != 'HTTP/1.1 404 Not Found') {
                                                                $url_exist = true;
                                                            } else {
                                                                $url_exist = false;
                                                            }
                                                            ?>
                        <?php if($url_exist): ?>
                        <img src="<?php echo e($myFriend->user->avatar_location); ?>" alt="<?php echo e($myFriend->user->name); ?>" class="mr-3 mt-1 rounded-circle" width="40px">
                        <?php else: ?>
                        <img src="<?php echo e(asset('images/user.png')); ?>" alt="<?php echo e($myFriend->user->name); ?>" class="mr-3 mt-1 rounded-circle" width="40px">
                        <?php endif; ?>
                        <div class="media-body">
                            <?php echo e(html()->form('POST', route('frontend.post.comment.send'))->class('post-comment-form')->id('comment-form')->open()); ?>


                            <?php echo e(html()->textarea('post_comment')
                                                            ->class('form-control postcomment mainpost_comment error_postcomment')
                                                            ->placeholder('Post a Comment')
                                                            ->attributes(['rows' =>'1'])); ?>

                            <?php echo e(html()->hidden('post_id')->value($myFriend->id)); ?>

                            <?php echo e(html()->hidden('user_id')->value($myFriend->user_id)); ?>

                            <?php echo e(html()->hidden('replay')->value('0')); ?>

                            <?php echo e(html()->button('<i class="fab fa-telegram-plane"></i>')->class('btn btn-sumnit-comment post-comment post_btn_comment')); ?>

                            


                            <button class="btn btn-sumnit-comment post_btn_comment post-comment" type="button"><i class="fab fa-telegram-plane"></i></button>
                            <?php echo e(html()->form()->close()); ?>

                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
<div class="wp-single-post-list"><div class="col-lg-12"> <div class="col-lg-12" style="margin-top: 15px;">No Data found.</div></div></div>
<?php endif; ?>
<script>
    $('.user-post-img-video-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        mouseDrag: false,
        dots: false,
        autoplay: false,
        URLhashListener: true,
        video: true,
        lazyLoad: true,
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
    });
</script>
