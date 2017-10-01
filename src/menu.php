<?php


$menu_cms = [
    'label' => '<span class="icon"><i class="fa fa-magic"></i></span> <span class="menu-item-parent">' . Yii::t('app/menu/cms', 'Cms') . '</span>',
    'url' => ["/cms/content"],
    'indexLabelMenu' => 'Content',
    "items" => [
        [
            "label" => Yii::t('app/menu/cms', 'Content'),
            "url" => ["/cms/content"]
        ]
    ]
];

return [
    '11' => $menu_cms,
];
