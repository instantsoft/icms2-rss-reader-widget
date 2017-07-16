<?php
/******************************************************************************/
//                                                                            //
//                                InstantMedia                                //
//	 		      http://instantmedia.ru/, support@instantmedia.ru            //
//                               written by Fuze                              //
//                                                                            //
/******************************************************************************/

class widgetRssReader extends cmsWidget {

    public function run(){

        cmsCore::includeFile('system/widgets/rss_reader/lastRSS.php');

        if(empty($this->options['rssurl'])){ return false; }

        $rss_links_options = explode("\n", $this->options['rssurl']);

        // проверяем включен ли nofollow для каждой ссылки
        foreach ($rss_links_options as $k => $v) {
            $link = explode('|', $v);
            $rss_links[$k] = $link[0];
            $nofollows[$k] = isset($link[1]) ? $link[1] : $this->options['nofollow'];
        }

        $rss = new lastRSS;

        $rss->cache_dir   = cmsConfig::get('cache_path');
        $rss->cache_time  = (int)$this->options['cachetime']*60;
        $rss->stripHTML   = true;
        $rss->cp          = 'UTF-8';
        $rss->items_limit = $this->options['item_count'];

        $out = array();

        foreach ($rss_links as $key => $rss_link) {

            $res = $rss->get($rss_link);

            if(!empty($res['items'])){
                foreach ($res['items'] as $item) {

                    $item['target_title'] = empty($res['title']) ?
                        (empty($res['image_title']) ? '' : $res['image_title']) :
                        $res['title'];

                    $item['target_description'] = empty($res['description']) ?
                        (empty($res['image_description']) ? '' : $res['image_description']) :
                        $res['description'];

                    $item['target_icon'] = empty($res['link']) ?
                        (empty($res['image_link']) ? '' : 'https://favicon.yandex.net/favicon/'.parse_url($res['image_link'], PHP_URL_HOST)) :
                        'https://favicon.yandex.net/favicon/'.parse_url($res['link'], PHP_URL_HOST);

                    $item['nofollow'] = $nofollows[$key];

                    $out[strtotime($item['pubDate'])] = $item;

                }
            }

        }

        if(!$out){ return false; }

        krsort($out);

        if(!empty($this->options['result_item_count'])){
            $out = array_slice($out, 0, $this->options['result_item_count']);
        }

        return array(
            'rss'=>$out
        );

    }

}
