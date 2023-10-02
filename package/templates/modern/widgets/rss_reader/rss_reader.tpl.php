<?php
$is_first = true;
?>
<ul class="rss-widget list-unstyled m-0 <?php if($widget->options['is_featured']){ ?>rss-widget__featured<?php } ?>">
    <?php foreach ($rss as $item) { ?>
        <li class="media flex-column flex-lg-row <?php if($is_first && $widget->options['is_featured']){ ?>border border-warning p-2<?php } else { ?>mt-3<?php } ?>">
            <?php if(!empty($item['enclosure'])){ ?>
                <img class="mr-3 mb-3 mb-lg-0" alt="<?php html($item['title']); ?>" src="<?php echo $item['enclosure']; ?>">
            <?php } ?>
            <div class="media-body">
                <h5 class="mt-0 mb-1">
                    <?php if($widget->options['is_link']){ ?>
                        <a <?php if($item['nofollow']){ ?>rel="nofollow"<?php } ?> href="<?php echo $item['link']; ?>">
                            <?php echo $item['title']; ?>
                        </a>
                    <?php } else { ?>
                        <?php echo $item['title']; ?>
                    <?php } ?>
                </h5>
                <?php if($widget->options['showdesc'] && !empty($item['description'])){ ?>
                    <p>
                        <?php if(empty($widget->options['cut_num'])){ ?>
                            <?php echo $item['description']; ?>
                        <?php } else { ?>
                            <?php echo string_short($item['description'], $widget->options['cut_num']); ?>
                        <?php } ?>
                    </p>
                <?php } ?>
                <div class="d-flex align-items-center small text-muted">
                    <?php if(!empty($item['target_icon'])){ ?>
                        <img alt="<?php html($item['title']); ?>" src="<?php echo $item['target_icon']; ?>" class="mr-1">
                    <?php } ?>
                    <span class="mr-3">
                        <?php echo $item['target_title']; ?>
                    </span>
                    <?php if(!empty($item['category'])){ ?>
                        <span class="mr-3">
                            <?php echo $item['category']; ?>
                        </span>
                    <?php } ?>
                    <span>
                        <?php echo html_date_time($item['pubDate']); ?>
                    </span>
                </div>
            </div>
        </li>
    <?php $is_first = false; ?>
    <?php } ?>
</ul>