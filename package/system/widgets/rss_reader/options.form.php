<?php
/******************************************************************************/
//                                                                            //
//                                InstantMedia                                //
//	 		      http://instantmedia.ru/, support@instantmedia.ru            //
//                               written by Fuze                              //
//                                                                            //
/******************************************************************************/

class formWidgetRssReaderOptions extends cmsForm {

    public function init() {

        return array(
            array(
                'type'   => 'fieldset',
                'title'  => LANG_OPTIONS,
                'childs' => array(
                    new fieldText('options:rssurl', array(
                        'title' => LANG_WD_RSSURL,
                        'hint'  => LANG_WD_RSSURL_HINT,
                        'rules' => array(
                            array('required')
                        )
                    )),
                    new fieldCheckbox('options:nofollow', array(
                        'title'   => LANG_WD_NOFOLLOW,
                        'default' => 1
                    )),
                    new fieldCheckbox('options:showdesc', array(
                        'title'   => LANG_WD_SHOWDESC,
                        'default' => 1
                    )),
                    new fieldCheckbox('options:is_link', array(
                        'title'   => LANG_WD_IS_LINK,
                        'default' => 1
                    )),
                    new fieldCheckbox('options:is_featured', array(
                        'title'   => LANG_WD_IS_FEATURED,
                        'default' => 1
                    )),
                    new fieldNumber('options:cut_num', array(
                        'title' => LANG_WD_CUT_NUM,
                        'units' => LANG_WD_CUT_NUM_UNITS
                    )),
                    new fieldNumber('options:item_count', array(
                        'title'   => LANG_WD_ITEM_COUNT,
                        'units'   => LANG_WD_ITEM_COUNT_UNITS,
                        'default' => 4
                    )),
                    new fieldNumber('options:result_item_count', array(
                        'title'   => LANG_WD_RESULT_ITEM_COUNT,
                        'units'   => LANG_WD_ITEM_COUNT_UNITS,
                        'hint'    => LANG_WD_RESULT_ITEM_COUNT_HINT,
                        'default' => 4
                    )),
                    new fieldNumber('options:cachetime', array(
                        'title'   => LANG_WD_CACHETIME,
                        'units'   => LANG_MINUTES,
                        'default' => 5
                    ))
                )
            )
        );
    }

}
