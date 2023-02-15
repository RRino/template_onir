<?php
defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Uri\Uri;
?>

<?php defined( '_JEXEC' ) or die( 'Restricted access' );
$app = JFactory::getApplication();
$titolo = $this->params->get('titolo');
$sitetitle = $this->params->get('sitetitle');
$logo = $this->params->get('logo');
$logofile = $this->params->get('logofile');
$header_fixed = $this->params->get('header');
$templateparams  = $app->getTemplate(true)->params; 
$menu   = $app->getMenu()->getActive();
$pageclass = $menu !== null ? $menu->getParams()->get('pageclass_sfx', '') : '';

?>

<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>"
    lang="<?php echo $this->language; ?>">

    
<head>
    <jdoc:include type="head" />
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
        href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/bootstrap.min.css" type="text/css" />

    <link rel="stylesheet" 
        href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/sass/style.css" type="text/css" />

    <link rel="stylesheet"
        href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/fontawesome.min.css" type="text/css" />

    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/media/system/css/joomla-fontawesome.min.css" type="text/css" />

    <script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/bootstrap.min.js"></script>
</head>

<?php $x=1 ?>

<body id="<?php echo $pageclass ? htmlspecialchars($pageclass) : 'default'; ?>">
    <div class="grid-rcontainer">

     <?php if($header_fixed == 1) : ?>
        <div class="box header-fixed">
    <?php endif; ?>

    <?php if($header_fixed == 0) : ?>
        <div class="box header">
    <?php endif; ?>

            <?php if ($this->countModules('topbar')) : ?>
            <div class="box topbar">
                <jdoc:include type="modules" name="topbar" style="none" />
            </div>
            <?php endif; ?>


            <?php if ($this->countModules('below-top')) : ?>
            <div class="box  below-top">
                <jdoc:include type="modules" name="below-top" style="none" />
            </div>
            <?php endif; ?>



            <div class="box  navbar-brand">
            <?php echo $sitetitle ?>
            </div>

            <?php if($logo == 1) : ?>
            <div class="box  logo">
               <img src="<?php echo $logofile ?>">
            </div>
            <?php endif; ?>

            <?php if ($this->countModules('menu', true) || $this->countModules('search', true)) : ?>
            <div class="box  menu">
                <?php if ($this->countModules('menu', true)) : ?>
                <jdoc:include type="modules" name="menu" style="none" />
                <?php endif; ?>
                <?php if ($this->countModules('search', true)) : ?>
                <div class="box  search">
                    <jdoc:include type="modules" name="search" style="none" />
                </div>
                <?php endif; ?>
            </div>
            <?php endif; ?>



            <div class="box nav">
            </div>

        </div>





        <?php if ($this->countModules('banner', true)) : ?>
        <div class="box banner">
            <jdoc:include type="modules" name="banner" style="none" />
        </div>
        <?php endif; ?>


        <?php if ($this->countModules('top-a', true)) : ?>
        <div class="box top-a">
            <jdoc:include type="modules" name="top-a" style="card" />
        </div>
        <?php endif; ?>

        <?php if ($this->countModules('top-b', true)) : ?>
        <div class="box top-b">
            <jdoc:include type="modules" name="top-b" style="card" />
        </div>
        <?php endif; ?>



        <div class="box breadcrumbs">
            <jdoc:include type="modules" name="breadcrumbs" style="none" />
        </div>

        <?php if ($this->countModules('main-top', true)) : ?>
        <div class="box main-top">
            <jdoc:include type="modules" name="main-top" style="card" />
        </div>
        <?php endif; ?>

        <div class="box main-bottom">
            <jdoc:include type="modules" name="main-bottom" style="card" />
        </div>

        <div class="box bottom-a">

        </div>

        <?php if ($this->countModules('bottom-a', true)) : ?>
        <div class="box bottom-a">
            <jdoc:include type="modules" name="bottom-a" style="card" />
        </div>
        <?php endif; ?>

        <?php if ($this->countModules('sidebar-right', true)) { ?>
        <div class="box main-right">Main 3
            <jdoc:include type="message" />
            <jdoc:include type="component" />
        </div>

        <div class="box right-main">
            <jdoc:include type="modules" name="sidebar-right" style="card" />
        </div>


        <?php }else{ ?>
        <div class="box main">
            <jdoc:include type="message" />
            <jdoc:include type="component" />
        </div>
        <div class="box right-none">
        </div>
        <?php } ?>



        <?php if ($this->countModules('footer', true)) : ?>

        <div class="box footer">
            <jdoc:include type="modules" name="footer" style="none" />
        </div>

        <?php endif; ?>


        <div class="box debug">
            <jdoc:include type="modules" name="debug" style="none" />
        </div>
    </div>

</body>

</html>