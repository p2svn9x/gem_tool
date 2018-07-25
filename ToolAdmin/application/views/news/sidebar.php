<div id="sidebars" class="g">
    <div class="sidebar">
        <ul class="sidebar_list">
            <li class="widget widget-sidebar">
                <form method="post" id="searchform" class="search-form" action="<?php echo news_url('search') ?>"
                      _lpchecked="1">
                    <fieldset>
                        <input type="text" name="name" id="filter_iname"
                               value="<?php echo $this->input->post('name') ?>">

                        <input type="submit" value="Tìm kiếm">

                    </fieldset>
                </form>
            </li>
            <li class="widget widget-sidebar"><h3>Mới nhất</h3>
                <ul>
                    <?php foreach ($news_list as $row) : ?>
                        <li>
                            <a href="<?php echo news_url($row->slug. '-'. $row->id.'.html') ?>"><?php echo $row->title; ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </li>
            <li class="widget widget-sidebar">
                <div class="ad-300"><a
                        href="#"><img
                            src="<?php echo public_url() ?>/news/images/sidebar.jpg" width="300"
                            height="250" alt=""></a></div>
            </li>
            <li class="widget widget-sidebar"><h3>Fanpage Facebook</h3>
                <iframe
                    src="http://www.facebook.com/plugins/likebox.php?href=https://www.facebook.com/nobitacnt&amp;width=190&amp;height=300&amp;show_faces=true&amp;colorscheme=light&amp;stream=false&amp;border_color&amp;header=true"
                    scrolling="no" style="border:none; overflow:hidden; width:190px; height:300px;"
                    allowtransparency="true" frameborder="0">
                </iframe>
            </li>
            <li class="widget widget-sidebar"><h3>Tags</h3>

                <div class="tagcloud">
                    <?php foreach($tag_list as $row): ?>
                    <a href="<?php echo news_url('tag/'.$row->slug. '-'. $row->id.'.html') ?>" class="tag-link-31 tag-link-position-1"
                                         title="2 topics" style="font-size: 10.065573770492pt;"><?php echo $row->tag_name ?></a>
                    <?php endforeach ?>
                </div>
            </li>
        </ul>
    </div>
    </div>
