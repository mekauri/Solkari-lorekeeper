<?php

/*
|--------------------------------------------------------------------------
| Helpers
|--------------------------------------------------------------------------
|
| Miscellaneous helper functions, primarily used for formatting.
|
*/

/**
 * Returns class name if the current URL corresponds to the given path.
 *
 * @param  string  $path
 * @param  string  $class
 * @return string
 */
function set_active($path, $class = 'active') {
    return call_user_func_array('Request::is', (array)$path) ? $class : '';
}

/**
 * Adds a help icon with a tooltip.
 *
 * @param  string  $text
 * @return string
 */
function add_help($text) {
    return '<i class="fas fa-question-circle help-icon" data-toggle="tooltip" title="'.$text.'"></i>';
}

/**
 * Generates breadcrumb links from the given array.
 *
 * @param  array  $links
 * @return string
 */
function breadcrumbs($links) {
    $ret = '<nav><ol class="breadcrumb">';
    $ret .= '<li class="breadcrumb-item"><a href="'.url('/').'">'.config('lorekeeper.settings.site_name', 'Lorekeeper').'</a></li>';

    $count = 0;
    foreach($links as $key => $link) {
        $isLast = ($count == count($links) - 1);

        $ret .= '<li class="breadcrumb-item';
        $ret .= $isLast ? ' active' : '';
        $ret .= '">';

        if (!$isLast) {
            $ret .= '<a href="'.url($link).'">';
        }
        $ret .= $key;
        if (!$isLast) {
            $ret .= '</a>';
        }

        $ret .= '</li>';
        $count++;
    }
    $ret .= '</ol></nav>';

    return $ret;
}

/**
 * Formats the timestamp to a standard format.
 *
 * @param  \Illuminate\Support\Carbon\Carbon  $timestamp
 * @param  bool  $showTime
 * @return string
 */
function format_date($timestamp, $showTime = true) {
    $formattedDate = $timestamp->format('j F Y' . ($showTime ? ', H:i:s' : ''));
    if ($showTime) {
        $timezoneAbbr = strtoupper($timestamp->timezone->getAbbreviatedName($timestamp->isDST()));
        $formattedDate .= ' <abbr data-toggle="tooltip" title="UTC'.$timestamp->timezone->toOffsetName().'">'.$timezoneAbbr.'</abbr>';
    }
    return $formattedDate;
}

/**
 * Formats the timestamp in a more human-readable way.
 *
 * @param  \Illuminate\Support\Carbon\Carbon  $timestamp
 * @param  bool  $showTime
 * @return string
 */
function pretty_date($timestamp, $showTime = true) {
    $tooltip = $timestamp->format('F j Y' . ($showTime ? ', H:i:s' : '')) . ' ' . strtoupper($timestamp->timezone->getAbbreviatedName($timestamp->isDST()));
    return '<abbr data-toggle="tooltip" title="'.$tooltip.'">'.$timestamp->diffForHumans().'</abbr>';
}

/**
 * Formats a number to fit the specified number of digits.
 *
 * @param  int  $number
 * @param  int  $digits
 * @return string
 */
function format_masterlist_number($number, $digits) {
    return sprintf('%0'.$digits.'d', $number);
}

/**
 * Parses a piece of user-entered text for HTML output and optionally handles pings.
 *
 * @param  string  $text
 * @param  array   $pings
 * @return string|null
 */
function parse($text, &$pings = null) {
    if (!$text) return null;

    require_once(base_path().'/vendor/ezyang/htmlpurifier/library/HTMLPurifier.auto.php');

    $config = HTMLPurifier_Config::createDefault();
    $config->set('Attr.EnableID', true);
    $config->set('HTML.DefinitionID', 'include');
    $config->set('HTML.DefinitionRev', 2);
    $config->set('Cache.DefinitionImpl', null); // TODO: remove this later!

    if ($def = $config->maybeGetRawHTMLDefinition()) {
        $def->addElement('include', 'Block', 'Empty', 'Common', ['file*' => 'URI', 'height' => 'Text', 'width' => 'Text']);
        $def->addAttribute('a', 'data-toggle', 'Enum#collapse,tab');
        $def->addAttribute('a', 'aria-expanded', 'Enum#true,false');
        $def->addAttribute('a', 'data-target', 'Text');
        $def->addAttribute('div', 'data-parent', 'Text');
    }

    $purifier = new HTMLPurifier($config);
    $text = $purifier->purify($text);

    $users = $characters = null;
    $text = parseUsers($text, $users);
    $text = parseCharacters($text, $characters);
    $text = parseGalleryThumbs($text, $submissions);

    if ($pings) {
        $pings = ['users' => $users, 'characters' => $characters];
    }

    return $text;
}

/**
 * Parses a piece of user-entered text to find and link user mentions.
 *
 * @param  string  $text
 * @param  mixed   $users
 * @return string
 */
function parseUsers($text, &$users) {
    $matches = [];
    $users = [];
    $count = preg_match_all('/\B@([A-Za-z0-9_-]+)/', $text, $matches);

    if ($count) {
        $matches = array_unique($matches[1]);
        foreach ($matches as $match) {
            $user = \App\Models\User\User::where('name', $match)->first();
            if ($user) {
                $users[] = $user;
                $text = preg_replace('/\B@'.$match.'/', $user->displayName, $text);
            }
        }
    }

    return $text;
}

/**
 * Parses a piece of user-entered text to find and link character mentions.
 *
 * @param  string  $text
 * @param  mixed   $characters
 * @return string
 */
function parseCharacters($text, &$characters) {
    $matches = [];
    $characters = [];
    $count = preg_match_all('/\[character=([^\[\]&<>?"\']+)\]/', $text, $matches);

    if ($count) {
        $matches = array_unique($matches[1]);
        foreach ($matches as $match) {
            $character = \App\Models\Character\Character::where('slug', $match)->first();
            if ($character) {
                $characters[] = $character;
                $text = preg_replace('/\[character='.$match.'\]/', $character->displayName, $text);
            }
        }
    }

    return $text;
}

/**
 * Parses a piece of user-entered text to find and link gallery submission thumbs.
 *
 * @param  string  $text
 * @param  mixed   $submissions
 * @return string
 */
function parseGalleryThumbs($text, &$submissions) {
    $matches = [];
    $submissions = [];
    $count = preg_match_all('/\[thumb=([^\[\]&<>?"\']+)\]/', $text, $matches);

    if ($count) {
        $matches = array_unique($matches[1]);
        foreach ($matches as $match) {
            $submission = \App\Models\Gallery\GallerySubmission::where('id', $match)->first();
            if ($submission) {
                $submissions[] = $submission;
                $text = preg_replace(
                    '/\[thumb='.$match.'\]/',
                    '<a href="'.$submission->url.'" data-toggle="tooltip" title="'.$submission->displayTitle.' by '.nl2br(htmlentities($submission->creditsPlain)).(isset($submission->content_warning) ? '<br/><strong>Content Warning:</strong> '.nl2br(htmlentities($submission->content_warning)) : '').'">'.view('widgets._gallery_thumb', ['submission' => $submission]).'</a>',
                    $text
                );
            }
        }
    }

    return $text;
}

/**
 * Generates a random string of characters.
 *
 * @param  int  $characters
 * @return string
 */
function randomString($characters) {
    $src = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    $code = '';
    for ($i = 0; $i < $characters; $i++) {
        $code .= $src[mt_rand(0, strlen($src) - 1)];
    }
    return $code;
}

/**
 * Checks if a URL is from an authentication site and belongs to a user.
 *
 * @param  string  $url
 * @param  bool  $failOnError
 * @return \App\Models\User\User|string
 */
function checkAlias($url, $failOnError = true) {
    if (!$url) return;

    $recipient = null;
    $matches = [];

    // Check if URL is from an authentication site
    foreach (Config::get('lorekeeper.sites') as $key => $site) {
        if (isset($site['auth']) && $site['auth']) {
            preg_match_all($site['regex'], $url, $matches, PREG_SET_ORDER, 0);
            if (!empty($matches)) {
                $urlSite = $key;
                $urlAlias = $matches[0][1];
                $recipient = \App\Models\User\UserAlias::where('site', $urlSite)->where('alias', $urlAlias)->first();
            }
        }
    }

    if (!$recipient && $failOnError) {
        throw new \Exception('Cannot verify recipient alias.');
    }

    return $recipient ? $recipient->user : $url;
}
