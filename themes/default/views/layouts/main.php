<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />

        <!-- blueprint CSS framework -->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
        <!--[if lt IE 8]>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
        <![endif]-->

        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>./css/main.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
        
        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/jquery.maskedinput.js'); ?>
        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/default.js'); ?>
        
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>

    <body>

        <div class="container" id="page">

            <div id="header">
                <?php
                $this->widget('bootstrap.widgets.TbNavBar', array(
                    'type' => 'inverse',
                    'fixed' => 'top',
                    'brand' => 'GeComE',
                    'items' => array(
                        array(
                            'class' => 'bootstrap.widgets.TbMenu',
                            'htmlOptions' => array('class' => 'pull-right'),
                            'items' => array(
                                array('label' => 'Cadastre-se', 'url' => array('/cliente/create'), 'visible' => Yii::app()->user->isGuest),
                                array('label' => 'User', 'url' => array('#'), 'visible' => !Yii::app()->user->isGuest, 'items' => array(
                                        array('label' => 'Item', 'url' => '#'),
                                    )
                                ),
                                '---',
                                array('label' => 'Login', 'url' => array('/userGroups'), 'visible' => Yii::app()->user->isGuest),
                                array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest),
                            ),
                        ),
                    ),
                ));
                ?>
            </div>            

            <?php
            if (isset($this->breadcrumbs)):
                $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
                    'links' => $this->breadcrumbs,
                    'separator' => '>',
                ));
            endif
            ?>
            
            <?php 
            $url = Yii::app()->request->url;
            $check = 'userGroups';
            $check2 = 'site';
            $check3 = 'cliente';
            if (!strstr($url, $check) && !strstr($url, $check2)
                    && !strstr($url, $check3)) {
                $model = new SearchForm;
                $this->renderPartial('//site/search_form', array('model' => $model));
            }
            ?>

<?php echo $content; ?>

            <div class="clear"></div>

            <div id="footer">
                Copyright &copy; <?php echo date('Y'); ?> by GeComE.<br/>
                All Rights Reserved.<br/>
            </div><!-- footer -->

        </div><!-- page -->

    </body>
</html>
