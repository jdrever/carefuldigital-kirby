<?php
return function($kirby, $pages, $page) {

    $alert = null;


    // Turnstile HTML input field name
    $fieldName = 'cf-turnstile-response';


    // URL for the Turnstile verification
    $verificationUrl = 'https://challenges.cloudflare.com/turnstile/v0/siteverify';

    $turnstileSiteKey = option('turnstile.siteKey');

    if (empty($turnstileSiteKey)) {
        throw new Exception('The Turnstile sitekey for Uniform is not configured');
    }

    $turnstileDiv='<div class="cf-turnstile" data-sitekey="'.$turnstileSiteKey.'" data-callback="javascriptCallback"></div>';
    $turnstileJs='<script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>';

    if($kirby->request()->is('POST') && get('submit')) {

        // check the honeypot
        if(empty(get('website')) === false) {
            go($page->url());
            exit;
        }

        $turnstileChallenge = kirby()->request()->get(self::fieldName);

        if (empty($turnstileChallenge)) {
            $this->reject(t('turnstile-empty'), self::fieldName);
        }

        $secretKey = option('turnstile.secretKey');

        if (empty($secretKey)) {
            throw new Exception('The Turnstile secret key is not configured');
        }

        $response = Remote::request($verificationUrl, [
          'method' => 'POST',
          'data' => [
            'secret' => $secretKey,
            'response' => $turnstileChallenge,
          ],
        ]);

        if ($response->code() !== 200 || $response->json()['success'] !== true) {
            $this->reject(t('turnstile-invalid'), $fieldName);
        }


        $data = [
            'name' => get('name'),
            'email' => get('email'),
            'text'  => get('text')
        ];

        $rules = [
            'name'  => ['required', 'minLength' => 3],
            'email' => ['required', 'email'],
            'text'  => ['required', 'minLength' => 3, 'maxLength' => 3000],
        ];

        $messages = [
            'name'  => 'Please enter a valid name',
            'email' => 'Please enter a valid email address',
            'text'  => 'Please enter a text between 3 and 3000 characters'
        ];

        // some of the data is invalid
        if($invalid = invalid($data, $rules, $messages)) {
            $alert = $invalid;

            // the data is fine, let's send the email
        } else {
            try {
                $kirby->email([
                    'template' => 'email',
                    'from'     => 'james@careful.digital',
                    'replyTo'  => $data['email'],
                    'to'       => 'james@careful.digital',
                    'subject'  => esc($data['name']) . ' sent you a message from your contact form',
                    'data'     => [
                        'text'   => esc($data['text']),
                        'sender' => esc($data['name'])
                    ]
                ]);

            } catch (Exception $error) {
                if(option('debug')):
                    $alert['error'] = 'The form could not be sent: <strong>' . $error->getMessage() . '</strong>';
                else:
                    $alert['error'] = 'The form could not be sent!';
                endif;
            }

            // no exception occurred, let's send a success message
            if (empty($alert) === true) {
                $success = 'Your message has been sent, thank you. We will get back to you soon!';
                $data = [];
            }
        }
    }

    return [
        'alert'   => $alert,
        'turnstileDiv' => $turnstileDiv,
        'turnstileJs' => $turnstileJs,
        'data'    => $data ?? false,
        'success' => $success ?? false
    ];
};