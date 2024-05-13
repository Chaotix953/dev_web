<?php

session_start();
$products = [
    'ville'    => [
        [
            'reference'   => 'b01',
            'designation' => '3 bulbes de bégonias',
            'photo'       => 'https://www.google.com/imgres?q=morocco&imgurl=https%3A%2F%2Fcdn.britannica.com%2F44%2F3044-050-39B7D0E9%2FMorocco.jpg&imgrefurl=https%3A%2F%2Fwww.britannica.com%2Fplace%2FMorocco&docid=Y2cpnQHzvn30dM&tbnid=rRP5fDo6iRzmSM&vet=12ahUKEwiZnMSM59uFAxWLT6QEHWVUCnwQM3oECEsQAA..i&w=2000&h=1660&hcb=2&ved=2ahUKEwiZnMSM59uFAxWLT6QEHWVUCnwQM3oECEsQAA',
            'price'       => 80.00,
            'name'        => 'product 1',
        'quantity'=>1
        ],
        [
            'reference'   => 'b02',
            'designation' => '10 bulbes de dahlias',
            'photo'       => 'bulbes_dahlia.jpg',
            'price'       => 90.00,
            'name'        => 'product 2',
             'quantity'=>10
        ],
        [
            'reference'   => 'b03',
            'designation' => '50 glaïeuls',
            'photo'       => 'bulbes_glaieul.jpg',
            'price'       => 95.00,
            'name'        => 'product 3',
             'quantity'=>14
        ],
        [
            'reference'   => 'b02',
            'designation' => '10 bulbes de dahlias',
            'photo'       => 'bulbes_dahlia.jpg',
            'price'       => 90.00,
            'name'        => 'product 4',
             'quantity'=>41
        ],
        [
            'reference'   => 'b03',
            'designation' => '50 glaïeuls',
            'photo'       => 'bulbes_glaieul.jpg',
            'price'       => 95.00,
            'name'        => 'product 5',
             'quantity'=>0
        ],
    ],
    'sport'    => [
        [
            'reference'   => 'm01',
            'designation' => 'Lot de 3 marguerites',
            'photo'       => 'massif_marguerite.jpg',
            'price'       => 85.00,
            'name'        => 'product 1',
             'quantity'=>19
        ],
        [
            'reference'   => 'm02',
            'designation' => 'Pour un bouquet de 6 pensées',
            'photo'       => 'massif_pensee.jpg',
            'price'       => 96.00,
            'name'        => 'product 2',
             'quantity'=>10
        ],
        [
            'reference'   => 'm03',
            'designation' => 'Mélange varié de 10 plantes à massif',
            'photo'       => 'massif_melange.jpg',
            'price'       => 95.00,
            'name'        => 'product 3',
             'quantity'=>0
        ],
        [
            'reference'   => 'm02',
            'designation' => 'Pour un bouquet de 6 pensées',
            'photo'       => 'massif_pensee.jpg',
            'price'       => 96.00,
            'name'        => 'product 4',
             'quantity'=>10
        ],
        [
            'reference'   => 'm03',
            'designation' => 'Mélange varié de 10 plantes à massif',
            'photo'       => 'massif_melange.jpg',
            'price'       => 95.00,
            'name'        => 'product 5',
             'quantity'=>12
        ],
    ],
    'sandales' => [
        [
            'reference'   => 'r01',
            'designation' => '1 pied spécial grandes fleurs',
            'photo'       => 'rosiers_gdefleur.jpg',
            'price'       => 80.00,
            'name'        => 'product 1',
             'quantity'=>13
        ],
        [
            'reference'   => 'r02',
            'designation' => 'Une variété sélectionnée pour son parfum',
            'photo'       => 'rosiers_parfum.jpg',
            'price'       => 96.00,
            'name'        => 'product 2',
             'quantity'=>14
        ],
        [
            'reference'   => 'r03',
            'designation' => 'Rosier arbuste',
            'photo'       => 'rosiers_arbuste.jpg',
            'price'       => 8.00,
            'name'        => 'product 3',
             'quantity'=>15
        ],
        [
            'reference'   => 'r03',
            'designation' => 'Rosier arbuste',
            'photo'       => 'rosiers_arbuste.jpg',
            'price'       => 86.00,
            'name'        => 'product 4',
             'quantity'=>17
        ],
        [
            'reference'   => 'r03',
            'designation' => 'Rosier arbuste',
            'photo'       => 'rosiers_arbuste.jpg',
            'price'       => 89.00,
            'name'        => 'product 5',
             'quantity'=>19
        ],
    ],
];

function extractProduct(array $products){
    $preparedProduct=[];
    foreach($products as $category){
        foreach($category as $product){
            $preparedProduct[]=$product;
        }
    }
    return $preparedProduct;
}

$_SESSION['products'] = $products;


