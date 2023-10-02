<?php
/******************************************************************************/
//                                                                            //
//                                InstantMedia                                //
//	 		                  https://instantmedia.ru/                        //
//                               written by Fuze                              //
//                                                                            //
/******************************************************************************/

class formWidgetRssReaderOptions extends cmsForm {

    public function init() {

        return [
            [
                'type'   => 'fieldset',
                'title'  => LANG_OPTIONS,
                'childs' => [
                    new fieldText('options:rssurl', [
                        'title' => LANG_WD_RSSURL,
                        'hint'  => LANG_WD_RSSURL_HINT,
                        'rules' => [
                            ['required']
                        ]
                    ]),
                    new fieldCheckbox('options:nofollow', [
                        'title'   => LANG_WD_NOFOLLOW,
                        'default' => 1
                    ]),
                    new fieldCheckbox('options:showdesc', [
                        'title'   => LANG_WD_SHOWDESC,
                        'default' => 1
                    ]),
                    new fieldCheckbox('options:is_link', [
                        'title'   => LANG_WD_IS_LINK,
                        'default' => 1
                    ]),
                    new fieldCheckbox('options:is_featured', [
                        'title'   => LANG_WD_IS_FEATURED,
                        'default' => 1
                    ]),
                    new fieldNumber('options:cut_num', [
                        'title' => LANG_WD_CUT_NUM,
                        'units' => LANG_WD_CUT_NUM_UNITS
                    ]),
                    new fieldNumber('options:item_count', [
                        'title'   => LANG_WD_ITEM_COUNT,
                        'units'   => LANG_WD_ITEM_COUNT_UNITS,
                        'default' => 4
                    ]),
                    new fieldNumber('options:result_item_count', [
                        'title'   => LANG_WD_RESULT_ITEM_COUNT,
                        'units'   => LANG_WD_ITEM_COUNT_UNITS,
                        'hint'    => LANG_WD_RESULT_ITEM_COUNT_HINT,
                        'default' => 4
                    ]),
                    new fieldNumber('options:cachetime', [
                        'title'   => LANG_WD_CACHETIME,
                        'units'   => LANG_MINUTES,
                        'default' => 5
                    ])
                ]
            ]
        ];
    }
}
