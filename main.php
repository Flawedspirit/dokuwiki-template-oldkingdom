<?php
/**
 * DokuWiki OldKingdom Template
 *
 * @link     TBA
 * @author   Flawedspirit <me@flawedspirit.com>
 * @license  GPL 2 (http://www.gnu.org/licenses/gpl.html)
 */

if (!defined('DOKU_INC')) die();

@require_once(dirname(__FILE__) . '/tpl_functions.php');
header('X-UA-Compatible: IE=edge,chrome=1');

?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $conf['lang'] ?>" lang="<?php echo $conf['lang'] ?>" dir="<?php echo $lang['direction'] ?>" class="no-js">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    
    <!-- Must be placed in header for things to work properly -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha384-tsQFqpEReu7ZLhBV2VZlAu7zcOV+rXbYlF2cqB8txI/8aZajjp4Bqd+V6D5IgvKT" crossorigin="anonymous"></script>
    <?php tpl_metaheaders() ?>

    <?php tpl_includeFile('meta.html') ?>
    <?php echo tpl_favicon(array('favicon', 'mobile')) ?>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=El+Messiri:400,500,700" />
    
    <title><?php tpl_pagetitle() ?> &ndash; <?php echo hsc($conf['title']) ?></title>
    <script>(function(H){H.className=H.className.replace(/\bno-js\b/,'js')})(document.documentElement)</script>       
</head>

<body id="dokuwiki__top">
    <div id="dokuwiki__site" class="<?php echo tpl_classes(); ?>">
        <!-- -=== NAV ===- -->
        <?php
            @require_once(dirname(__FILE__) . '/tpl_nav.html');

            html_msgarea();
            tpl_includeFile('header.html');

            // render the content into buffer for later use
            ob_start();
            tpl_content();
            $buffer = ob_get_clean();
        ?>

        <div id="breadcrumb" class="separator-bar drop-shadow-2">
            <!-- BREADCRUMBS -->
            <?php if($conf['breadcrumbs'] || $conf['youarehere']): ?>
                <div class="container">
                    <?php if($conf['youarehere']): ?>
                        <div class="youarehere"><?php tpl_youarehere() ?></div>
                    <?php endif ?>
                    <?php if($conf['breadcrumbs']): ?>
                        <div class="trace"><?php tpl_breadcrumbs() ?></div>
                    <?php endif ?>
                </div>
            <?php endif ?>
        </div>

        <!-- -=== CONTENT ===- -->
        <main role="main" class="drop-shadow-2">
            <div id="content" class="container py-3">
                <?php echo $buffer; ?>
            </div>
        </main>

        <div id="page_info" class="separator-bar drop-shadow-2">
            <div class="container">
                <?php tpl_pageinfo(); ?>
            </div>
        </div>

        <!-- -=== FOOTER ===- -->
        <footer id="dokuwiki__footer" class="container pt-3">
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
            <?php tpl_license('button'); ?>
        </footer>

        <?php tpl_includeFile('footer.html'); ?>
    </div>    
    <div class="no"><?php tpl_indexerWebBug(); ?></div>
</body>
</html>
