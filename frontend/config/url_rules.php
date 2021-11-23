<?php

return [
    //SiteController
    '' => 'site/index',
    '/' => 'site/index',
    'dostavka' => 'site/delivery',
    'oplata' => 'site/payment',
    'kontakty' => 'site/contacts',

    //ReviewsController
    'reviews/add' => 'reviews/add',
    'reviews/add-main' => 'reviews/add-main',
    'otzyvy' => 'reviews/index',

    //OrderController
    'order' => 'order/index',
    'order/new' => 'order/new',
    'order/one-click' => 'order/one-click',

    //GoodsController
    'goods/<slug:(\w|-)+>' => 'goods/view',

    //CatalogController
    'akcii' => 'catalog/discount',
    '<slug:(\w|-)+>' => 'catalog/view-main',
    'bukety/<slug:(\w|-)+>' => 'catalog/view-child',
    'kompozitsii/<slug:(\w|-)+>' => 'catalog/view-child',
];