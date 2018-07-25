<div id="content_box">
    <div id="post-846"
         class="g post post-846 type-post status-publish format-standard has-post-thumbnail hentry category-tin-tuc-su-kien cat-3-id has_thumb">
        <div class="single_post">
            <div class="post-date-ribbon">
                <div class="corner"></div><?php echo get_date($info->create_date) ?></div>
            <div class="breadcrumb"><a href="<?php echo news_url() ?>" rel="nofollow">Home</a>&nbsp;&nbsp;»&nbsp;&nbsp;
                <a href="<?php echo news_url('category/'.$cateinfo->slug. '-'. $cateinfo->id.'.html') ?>"
                   rel="nofollow">   <?php echo $info->catalog_name ?></a> &nbsp;&nbsp;»&nbsp;&nbsp;
                <?php echo $info->title ?>
            </div>
            <header>
                <h1 class="title single-title"><?php echo $info->title ?></h1>
                <span class="theauthor single-postmeta">Đăng trong mục <a
                        href="<?php echo news_url('category/'.$cateinfo->slug. '-'. $cateinfo->id.'.html') ?>"
                        rel="nofollow">   <?php echo $info->catalog_name ?></a> bởi <a
                        rel="nofollow" href="#"
                        title="Posts by bacay1102"><?php echo $info->usernamepost  ?></a> ngày <?php echo get_date($info->create_date) ?></span>
            </header>
            <!--.headline_area-->
            <div class="post-single-content box mark-links">
                <?php echo $info->content ?>


            </div>
        </div>
        <!--.post-content box mark-links-->
        <div class="postauthor">
            <h4>Tác giả</h4>
            <img alt="" src="http://1.gravatar.com/avatar/ae000be30c42ee1db419b50a6bbbe4de?s=85&amp;d=mm&amp;r=g"
                 srcset="http://1.gravatar.com/avatar/ae000be30c42ee1db419b50a6bbbe4de?s=170&amp;d=mm&amp;r=g 2x"
                 class="avatar avatar-85 photo" height="85" width="85">                                <h5>
                <?php  echo $info->usernamepost ?></h5>

            <p></p>
        </div>


        <div class="related-posts">
            <?php if($listnews != null): ?>
            <div class="postauthor-top"><h3>Bài viết có thể bạn quan tâm</h3></div>
            <ul>
                <?php foreach($listnews as $row): ?>
                <li class="">
                    <a rel="nofollow" class="relatedthumb" href="<?php echo news_url($row->slug. '-'. $row->id.'.html') ?>"
                       title="<?php echo $row->title; ?>">
										<span class="rthumb">
											 <img width="200" height="125"
                                                  src="<?php echo base_url('upload/news/'.$row->image_link)?>"
                                                  class="attachment-related size-related wp-post-image" alt="vqmm2"
                                                  title="">																					</span>
                        <span class="rp_title"><?php echo $row->title; ?></span>
                    </a>
                </li>
                <?php endforeach; ?>


            </ul>
            <?php else : ?>
            <div class="postauthor-top"></div>
            <?php endif; ?>
        </div>
        <!-- .related-posts -->

    </div>
    <!--.g post-->
    <!-- You can start editing here. -->
    <!-- If comments are open, but there are no comments. -->

</div>