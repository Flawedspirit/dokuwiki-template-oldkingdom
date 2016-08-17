<?php

/**
* OLD KINGDOM TEMPLATE
*
* @link     https://flawedspirit.com
* @author   Flawedspirit <flawedspirit@gmail.com>
* @license  GPL 2 (http://gnu.org/licenses/old-licenses/gpl-2.0.html)
*/

if (!defined('DOKU_INC')) die(); 
?>

<!DOCTYPE html>
<html lang="en" dir="ltr" class="no-js">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <?php tpl_metaheaders() ?>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=El+Messiri:400,500,600,700" />
        <?php echo tpl_favicon(array('favicon')) ?>
        <?php tpl_includeFile('meta.html') ?>
        <title><?php tpl_pagetitle() ?> &ndash; <?php echo hsc($conf['title']) ?></title>
        <script>(function(H){H.className=H.className.replace(/\bno-js\b/,'js')})(document.documentElement)</script>
    </head>
    <body>
        <div id="media-manager" class="dokuwiki">
            <div class="wiki-content manager-bg">
                <div class="container">
                    <?php html_msgarea() ?>
                    <h1><?php echo hsc($lang['mediaselect'])?></h1>
                 
                    <?php /* keep the id! additional elements are inserted via JS here */?>
                    <div id="media-opts"></div>
                 
                    <?php tpl_mediaTree() ?>
                 
                    <?php tpl_mediaContent() ?>
                </div>
            </div>
        </div>
    </body>
</html>