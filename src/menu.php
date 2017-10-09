<?php


$menu_cms = [
    'label' => '<i class="fa fa-lg fa-fw fa-magic"></i> <span class="menu-item-parent">' . Yii::t('app/menu/cms', 'Cms') . '</span>',
    'url' => ["/cms/content"],
    'indexLabelMenu' => 'Content',
    "items" => [
        [
            "label" => Yii::t('app/menu/cms', 'Content'),
            "url" => ["/cms/content"]
        ]
    ]
];

$menuItems= [
    '10' => $menu_cms,
];



