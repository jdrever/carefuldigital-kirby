<?php

return [
    'debug'  => true,
    'panel' =>
    [
      'install' => true,
      'css' => 'assets/css/panel.css',
    ],
    'routes' => [
      [
        'pattern' => 'feed/index.xml',
        'action'  => function() {
          $posts=site()->index()->listed()->filterBy('template','blog-post')->sortBy('publishedDate', 'desc');
          $content = snippet('rss', compact('posts'), true);
          // return response with correct header type
          return new Kirby\Cms\Response($content, 'application/xml',null, ['X-Content-Type-Options'=> 'nosniff'], 'utf-8');
        }
      ]
    ]
];