<?php

return function ($kirby, $page)
{

  if ($kirby->request()->is('POST'))
  {
    // check the honeypot
    if (empty(get('website')) === false)
    {
      go($page->url());
      exit;
    }
    $intentions = get('intentions');
    $title = date("Y-m-d h:i:sa") ;

    $content = [
      'title' => $title,
      'intentions' => $intentions,
    ];
    $page->createChild([
      'content' => $content,
      'slug' => Str::slug('intro-' . $title),
      'template' => 'guide-task-introduction',
    ]);

    if ($page->hasChildren())
    {
      go($page->children()->first()->url());
    }
    if ($page->hasNext())
    {
      go($page->next()->url());
    }
  }
};
