<?php
$this->addMainCSS('templates/default/css/rss_widget.css');
$is_first = true;
?>
<div class="rss_widget widget_content_list <?php if($widget->options['is_featured']){ ?>featured<?php } ?>">
    <?php foreach ($rss as $item) { ?>
        <div class="item <?php if($is_first){ ?>item-first<?php } ?>">
            <?php if(!empty($item['enclosure'])){ ?>
                <div class="image">
                    <img alt="<?php html($item['title']); ?>" src="<?php echo $item['enclosure']; ?>">
                </div>
            <?php } ?>
            <div class="info">
                <div class="title">
                    <?php if($widget->options['is_link']){ ?>
                        <a <?php if($item['nofollow']){ ?>rel="nofollow"<?php } ?> href="<?php echo $item['link']; ?>"><?php echo $item['title']; ?></a>
                    <?php } else { ?>
                        <h3><?php echo $item['title']; ?></h3>
                    <?php } ?>
                </div>
                <?php if($widget->options['showdesc'] && !empty($item['description'])){ ?>
                    <div class="teaser">
                        <?php if(empty($widget->options['cut_num'])){ ?>
                            <?php echo $item['description']; ?>
                        <?php } else { ?>
                            <?php echo string_short($item['description'], $widget->options['cut_num']); ?>
                        <?php } ?>
                    </div>
                <?php } ?>
                <div class="details">
                    <span class="author">
                        <span>
                            <?php if(!empty($item['target_icon'])){ ?>
                                <img class="target_icon_img" alt="<?php html($item['title']); ?>" src="<?php echo $item['target_icon']; ?>">
                            <?php } ?>
                            <?php echo $item['target_title']; ?>
                        </span>
                        <?php if(!empty($item['category'])){ ?>
                            <?php echo $item['category']; ?>
                        <?php } ?>
                    </span>
                    <span class="date">
                        <?php echo html_date_time($item['pubDate']); ?>
                    </span>
                </div>
            </div>
        </div>
    <?php $is_first = false; ?>
    <?php } ?>
</div>