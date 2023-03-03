<?php

return [
  'debug'  => $_SERVER['HTTP_HOST'] == 'localhost:8081' ? true : false,
  'cache' => [
    'pages' => [
      'active' => true,
    ]
  ],
  'panel' =>
  [
    'install' => true,
    'css' => 'assets/css/panel.css',
  ],
  'routes' => [
    [
      'pattern' => 'feed/index.xml',
      'action'  => function ()
      {
        $posts = site()->index()->listed()->filterBy('template', 'blog-post')->sortBy('publishedDate', 'desc');
        $content = snippet('rss', compact('posts'), true);
        // return response with correct header type
        return new Kirby\Cms\Response($content, 'application/xml', null, ['X-Content-Type-Options' => 'nosniff'], 'utf-8');
      }
    ]
  ],
  'thumbs' => [
    'srcsets' => [
      'default' => [
        '300w'  => ['width' => 300],
        '600w'  => ['width' => 600],
        '900w'  => ['width' => 900],
        '1200w' => ['width' => 1200],
        '1800w' => ['width' => 1800]
      ],
      'avif' => [
        '300w'  => ['width' => 300, 'format' => 'avif'],
        '600w'  => ['width' => 600, 'format' => 'avif'],
        '900w'  => ['width' => 900, 'format' => 'avif'],
        '1200w' => ['width' => 1200, 'format' => 'avif'],
        '1800w' => ['width' => 1800, 'format' => 'avif']
      ],
      'webp' => [
        '300w'  => ['width' => 300, 'format' => 'webp'],
        '600w'  => ['width' => 600, 'format' => 'webp'],
        '900w'  => ['width' => 900, 'format' => 'webp'],
        '1200w' => ['width' => 1200, 'format' => 'webp'],
        '1800w' => ['width' => 1800, 'format' => 'webp']
      ],
    ]
  ]
];
