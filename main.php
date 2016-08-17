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

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=El+Messiri:400,500,700" />
        <?php echo tpl_favicon(array('favicon')) ?>
        <?php tpl_includeFile('meta.html') ?>
        <title><?php tpl_pagetitle() ?> &ndash; <?php echo hsc($conf['title']) ?></title>
        <script>(function(H){H.className=H.className.replace(/\bno-js\b/,'js')})(document.documentElement)</script>
    </head>

    <body>
        <nav id="wiki-header" class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand hidden-sm hidden-xs" href="/"><?php echo $conf['title']; ?></a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <?php if($conf['useacl']): ?>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a class="dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Wiki Tools <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <?php
                                        tpl_toolsevent('pagetools', array(
                                            tpl_action('edit', true, 'li', true, '<span class="icon">&#0063;</span> ', ''),
                                            tpl_action('revert', true, 'li', true, '<span class="icon">&#0170;</span> ', ''),
                                            tpl_action('revisions', true, 'li', true, '<span class="icon">&#0089;</span> ', ''),
                                            tpl_action('', true, 'li class="divider"', true),
                                            tpl_action('backlink', true, 'li', true, '<span class="icon">&#0111;</span> ', ''),
                                            tpl_action('subscribe', true, 'li', true, '<span class="icon">&#0036;</span> ', ''),
                                            tpl_action('recent', true, 'li', true, '<span class="icon">&#0059;</span> ', ''),
                                            tpl_action('media', true, 'li', true, '<span class="icon">&#0097;</span> ', ''),
                                            tpl_action('index', true, 'li', true, '<span class="icon">&#0073;</span> ', '')
                                        ));
                                    ?>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Options <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <?php
                                        if(!empty($_SERVER['REMOTE_USER'])) {
                                            echo '<li class="menu-item">';
                                            tpl_userinfo(); /* Logged in as... */
                                            echo '</li>';
                                            echo '<li class="divider"></li>';
                                            tpl_toolsevent('usertools', array(
                                                tpl_action('admin', true, 'li', true, '<span class="icon">&#0094;</span> ', ''),
                                                tpl_action('profile', true, 'li', true, '<span class="icon">&#0046;</span> ', ''),
                                                tpl_action('register', true, 'li', true, '<span class="icon">&#0171;</span> ', ''),
                                                tpl_action('login', true, 'li', true, '<span class="icon">&#0119;</span> ', '')
                                            ));
                                        } else {
                                            tpl_toolsevent('usertools', array(
                                                tpl_action('login', true, 'li', true, '<span class="icon">&#0118;</span> ', '')
                                            ));
                                        }
                                    ?>
                                </ul>
                            </li>
                            <li class="navbar-form" role="search">
                                <div class="form-group">
                                    <?php tpl_searchform(); ?>
                                </div>
                            </li>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
            <div id="wiki-bcbar" class="breadcrumb-bar">
                <div class="container bcbar-trace">
                    <?php if($conf['breadcrumbs']): ?>
                        <?php tpl_breadcrumbs() ?>
                    <?php elseif($conf['youarehere']): ?>
                        <?php tpl_youarehere() ?>
                    <?php endif ?>
                </div>
            </div>
        </nav>
        <div id="dokuwiki__top" class="site <?php echo tpl_classes() ?>">
            <div class="wiki-content">
                <div class="container">
                    <div class="row">
                        <?php
                            // render the content into buffer for later use
                            ob_start();
                            html_msgarea();
                            tpl_content(false);
                            $buffer = ob_get_clean();

                        if($conf['maxtoclevel'] > 0 && strlen(tpl_toc(true)) > 0): ?>
                            <div class="col-md-3 hidden-sm hidden-xs">
                                <?php echo tpl_toc(); ?>
                            </div>
                            <div class="col-md-9">
                                <?php echo $buffer; ?>
                            </div>
                        <?php else: ?>
                            <div class="col-md-12 no-toc">
                                <?php echo $buffer; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <footer id="wiki-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-12"><?php tpl_pageinfo() ?><a class="hidden-xs" href="#" style="float: right;">Top of Page &uarr;</a></div>
                </div>
                <div class="row">
                    <div class="col-md-12"><?php tpl_license('') ?></div>
                </div>
                <?php if(tpl_getConf('showFooterButtons') > 0): ?>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <?php
                                tpl_license('button', true, false, false); // license button, no wrapper
                                $target = ($conf['target']['extern']) ? 'target="' . $conf['target']['extern'] . '"' : '';
                            ?>
                            <a href="https://www.flawedspirit.com/donate" title="Donate to the author" <?php echo $target?>><img src="<?php echo tpl_basedir(); ?>images/button-flawedspirit.png" width="80" height="15" alt="Donate to the author" /></a>
                            <a href="https://www.dokuwiki.org/donate" title="Donate to the Dokuwiki team" <?php echo $target?>><img src="<?php echo tpl_basedir(); ?>images/button-donate.gif" width="80" height="15" alt="Donate to the Dokuwiki team" /></a>
                            <a href="https://secure.php.net" title="Powered by PHP" <?php echo $target?>><img src="<?php echo tpl_basedir(); ?>images/button-php.gif" width="80" height="15" alt="Powered by PHP" /></a>
                            <a href="https://dokuwiki.org/" title="Driven by DokuWiki" <?php echo $target ?>><img src="<?php echo tpl_basedir(); ?>images/button-dw.png" width="80" height="15" alt="Driven by DokuWiki" /></a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </footer>
        <?php tpl_indexerWebBug(); ?>
    </body>
    <script type="text/javascript" src="<?php echo tpl_basedir(); ?>js/collapse.min.js"></script>
    <script type="text/javascript" src="<?php echo tpl_basedir(); ?>js/dropdown.min.js"></script>
    <script type="text/javascript" src="<?php echo tpl_basedir(); ?>js/ie10-viewport-bug-workaround.js"></script>
    <script type="text/javascript" src="<?php echo tpl_basedir(); ?>js/main.js"></script>
    <?php tpl_includeFile('footer.html'); ?>
</html>