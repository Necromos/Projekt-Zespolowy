<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/neutraldesk/style.css" />

    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/css/neutraldesk/js/cufon-yui.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/css/neutraldesk/js/arial.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/css/neutraldesk/js/cuf_run.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/css/neutraldesk/js/custom.js"></script>
    

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
<div class="main" >
	<div class="header">
        <div class="header_resize" >
    		<div class="logo">
                <h1><small>Welcome to </small><?php echo CHtml::encode(Yii::app()->name); ?> <span>journal</span></h1>
            </div>       
            <div class="search">
                <form id="form1" name="form1" method="post" action="#">
                    <span>
                        <input name="q" type="text" class="keywords" id="textfield" maxlength="50" value="Search..." />
                    </span>
                    <input name="b" type="image" src="<?php echo Yii::app()->request->baseUrl; ?>/css/neutraldesk/images/search.gif" class="button" />
                </form>
            </div>
            <div class="clr"></div>
            <div class="menu">
                <?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'Article', 'url'=>array('/article/create'), 'visible'=>!Yii::app()->user->isGuest),
				//array('label'=>'Contact', 'url'=>array('/site/contact')),
				array('label'=>'Register', 'url'=>array('/user/register'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Update Profile', 'url'=>array('/user/update'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Add Review', 'url'=>array('/review/create'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Article categories', 'url'=>array('/category/create'), 'visible'=>Yii::app()->user->name=="admin"),
				array('label'=>'Login', 'url'=>array('/user/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/user/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
            </div><!-- mainmenu -->
            <div class="clr"></div>
        </div>
    </div>
	
	<?php echo $content; ?>
    
    <div class="headert_text_resize">
   		<div class="textarea">
        	<h2> Informatica is an international journal with its base in Europe.<small> It publishes peer-reviewed papers from <span>all areas of computer science</span>, <span>informatics</span> and <span>cognitive sciences</span>, with a focus on intelligent systems and software in general.</small></h2>     	
        </div>
        <img src="<?php echo Yii::app()->baseUrl; ?>/css/neutraldesk/images/img_main.jpg" alt="" />
        <div class="clr"></div>
    </div>
    <div class="fbg" >
        <div class="fbg_resize">
            <div class="blok">
                <h2><span>Footer column 1</span></h2>
            </div>    
            <div class="blok">
                <h2><span>Footer column 2</span></h2>
            </div>
            <div class="blok">
                <h2><span>Footer column 3</span></h2>
                <div></div>
                <h2>Footer column 3.2</h2>
                <div></div>
            </div>    
            <div class="clr"></div>    
        </div>
    </div>    
    <div class="footer">
        <div class="footer-resize">
            <p class="lf" >Copyright &copy; <?php echo date('Y'); ?> by Necromos Team.</p>
            <p class="rf" >All Rights Reserved.</p>
            <div class="clr"></div>
        </div>    
        <div class="clr"></div>
    </div><!-- footer -->
</div><!-- page -->

</body>
</html>