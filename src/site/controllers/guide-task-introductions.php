<?php

return function ($kirby, $page)
{
  $taskComplete=false;
  $allIntentions = [];

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

    try {
      $kirby->email([
          'template' => 'email',
          'from'     => 'james@careful.digital',
          'replyTo'  => 'james@careful.digital',
          'to'       => 'james@careful.digital',
          'subject'  => 'You have an Introduction to check from a guide',
          'data'     => [
              'text' => 'Intentions:' . $intentions,
          ]
      ]);
    }
    catch (Exception $error) 
    {
      //TODO: proper handling of this error
      if(option('debug')):
          $alert['error'] = 'The form could not be sent: <strong>' . $error->getMessage() . '</strong>';
      else:
          $alert['error'] = 'The form could not be sent!';
      endif;
    }


    $allIntentions=$page->children();

    $taskComplete=true;
  }
  return compact('taskComplete', 'allIntentions');
};
