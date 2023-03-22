<?php

return function ($kirby, $page)
{
  $taskComplete=false;
  $allInput=$page->children();

  if ($kirby->request()->is('POST'))
  {
    // check the honeypot
    if (empty(get('website')) === false)
    {
      go($page->url());
      exit;
    }
    $input = get('input');
    $title = date("Y-m-d h:i:sa") ;

    $content = [
      'title' => $title,
      'input' => $input,
    ];
    $page->createChild([
      'content' => $content,
      'slug' => Str::slug('intro-' . $title),
      'template' => 'guide-input',
    ]);

    try {
      $kirby->email([
          'template' => 'email',
          'from'     => 'james@careful.digital',
          'replyTo'  => 'james@careful.digital',
          'to'       => 'james@careful.digital',
          'subject'  => 'You have a Input to check from a guide',
          'data'     => [
            'sender' => 'james@careful.digital',
            'text' => 'Input:' . $input,
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

    $taskComplete=true;
  }
  return compact('taskComplete', 'allInput');
};
