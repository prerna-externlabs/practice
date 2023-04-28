<!--  // multiple form are use so use this method config ma one file and any required file are use mention them 
multiple form ho only contropller ma function bana kra usa mname dene hai or usa config folder ma file mbana he or usa store kra dana ha data -->
<?php 
$config=[

    'add_article_rules'=>[
        ['field' => 'article_title',
        'label' => 'Article Title',
        'rules' => 'required|alpha'
        ],
        ['field' => 'article_body',
        'label' => 'Article body',
        'rules' => 'required|alpha'
        ]
    ],

];
?>