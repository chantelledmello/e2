<?php

return [
    '/' => ['AppController', 'index'],
    '/about' => ['AppController', 'about'],
    '/products' => ['ProductController', 'index'],
    '/product' => ['ProductController', 'show'],
    '/products/save-review' => ['ProductController', 'saveReview'],
    '/practice-db' => ['AppController', 'practiceDB'],
    '/practice-db2' => ['AppController', 'practiceDB2'],
    '/products/new' => ['ProductController', 'newProduct'],
    '/products/save-product' => ['ProductController', 'saveProduct'],
];
