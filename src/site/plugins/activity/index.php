<?php
Kirby::plugin(
  'careful-commons/activity-block',
  [
    'blueprints' => [
      'blocks/activity' => __DIR__ . '/blueprints/blocks/activity.yml',
    ],
    'snippets' => [
      'blocks/activity' => __DIR__ . '/snippets/blocks/activity.php',
    ],
  ]
);
