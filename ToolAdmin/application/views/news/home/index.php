<div id="content_box" class="home_page">
    <?php foreach ($list as $row): ?>

    <div class="post excerpt last ">
        <div class="post-date-ribbon"><div class="corner"></div><?php echo mdate('%d-%m-%Y',$row->create_date)?></div>
        <header>
            <h2 class="title">
                <a href="<?php echo news_url($row->slug. '-'. $row->id.'.html') ?>" rel="bookmark"><?php echo $row->title; ?></a>
            </h2>
            <div class="post-info">
                <div class="author_mt hp_meta"><span class="mt_icon"> </span>Bởi <a rel="nofollow" href="" title="Posts by <?php echo $row->usernamepost; ?>"><?php echo $row->usernamepost; ?></a></div>
                <div class="cat_mt hp_meta"><span class="mt_icon"> </span><a href="" rel="nofollow"></a><?php echo $row->catalog_name; ?></div>
                <div class="comment_mt hp_meta"><span class="mt_icon"> </span> <a href="#"> <?php echo $row->count_view ?> Lượt xem </a></div>
            </div>
        </header>
        <a href="<?php echo news_url($row->slug. '-'. $row->id.'.html') ?>" title="<?php echo $row->title; ?>" rel="nofollow" id="featured-thumbnail">

            <div class="featured-thumbnail"><img width="150" height="150" src="<?php echo base_url('upload/news/'.$row->image_link)?>" class="attachment-featured size-featured wp-post-image" alt="1" title="<?php echo $row->title; ?>"></div>	</a>
        <div class="post-content image-caption-format-1">
            <?php echo $row->description; ?>		</div>
        <div class="readMore"><a href="<?php echo news_url($row->slug. '-'. $row->id.'.html') ?>" title="" rel="bookmark">Đọc thêm</a></div>
    </div><!--.post excerpt-->

        <?php endforeach; ?>
    <div class="pagination">

        <?php echo $this->pagination->create_links()?>

    </div>

</div>