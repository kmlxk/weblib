<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
    

<link href="<?php echo Yii::app()->request->baseUrl; ?>/../libs/bootstrap3-doc/v3.bootcss.com/dist/css/bootstrap.min.css" rel="stylesheet" />
<!-- Documentation extras -->
<link href="<?php echo Yii::app()->request->baseUrl; ?>/../libs/bootstrap3-doc/v3.bootcss.com/docs-assets/css/docs.css" rel="stylesheet" />
<link href="<?php echo Yii::app()->request->baseUrl; ?>/../libs/bootstrap3-doc/v3.bootcss.com/getting-started/highlight.js/7.3/styles/github.min.css" rel="stylesheet" />
<style>
body{font-family:"ff-tisa-web-pro-1","ff-tisa-web-pro-2","Lucida Grande","Helvetica Neue",Helvetica,Arial,"Hiragino Sans GB","Hiragino Sans GB W3","WenQuanYi Micro Hei",sans-serif;}
h1, .h1, h2, .h2, h3, .h3, h4, .h4, .lead {font-family:"ff-tisa-web-pro-1","ff-tisa-web-pro-2","Lucida Grande","Helvetica Neue",Helvetica,Arial,"Hiragino Sans GB","Hiragino Sans GB W3","Microsoft YaHei UI","Microsoft YaHei","WenQuanYi Micro Hei",sans-serif;}
pre code { background: transparent; }
@media (min-width: 768px) {
    .bs-docs-home .bs-social, 
    .bs-docs-home .bs-masthead-links {
      margin-left: 0;
    }
}

.bs-docs-section p {
	line-height: 2;
}

.bs-docs-section p.lead {
	line-height: 1.4;
}
</style>

<!--[if lt IE 9]><script src="<?php echo Yii::app()->request->baseUrl; ?>/../libs/bootstrap3-doc/v3.bootcss.com/docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/../libs/bootstrap3-doc/v3.bootcss.com/getting-started/html5shiv/3.7.0/html5shiv.min.js"></script>
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/../libs/bootstrap3-doc/v3.bootcss.com/getting-started/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->

    
</head>

<body>
    
    
    <a class="sr-only" href="#content">Skip to main content</a>

    <!-- Docs master nav -->
    <header class="navbar navbar-inverse navbar-fixed-top bs-docs-nav" role="banner">
  <div class="container">
    <div class="navbar-header">
      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="<?php echo Yii::app()->request->baseUrl; ?>" class="navbar-brand">
      <?php echo CHtml::encode(Yii::app()->name); ?>
      </a>
    </div>
    <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
      <ul class="nav navbar-nav">
        <li class="active">
          <a href="<?php echo Yii::app()->request->baseUrl; ?>/../libs/bootstrap3-doc/v3.bootcss.com/getting-started">PHP</a>
        </li>
        <li>
          <a href="<?php echo Yii::app()->request->baseUrl; ?>/../libs/bootstrap3-doc/v3.bootcss.com/css">CSS</a>
        </li>
        <li>
          <a href="<?php echo Yii::app()->request->baseUrl; ?>/../libs/bootstrap3-doc/v3.bootcss.com/components">组件</a>
        </li>
        <li>
          <a href="<?php echo Yii::app()->request->baseUrl; ?>/../libs/bootstrap3-doc/v3.bootcss.com/javascript">JavaScript插件</a>
        </li>
        <li>
          <a href="<?php echo Yii::app()->request->baseUrl; ?>/../libs/bootstrap3-doc/v3.bootcss.com/customize">定制</a>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li>
          <a href="<?php echo Yii::app()->request->baseUrl; ?>/../libs/bootstrap3-doc/v3.bootcss.com/about">关于</a>
        </li>
      </ul>
    </nav>
  </div>
</header>


    <!-- Docs page layout -->
    <div class="bs-header" id="content">
      <div class="container">
        <h1>起步</h1>
        <p>简要介绍Bootstrap，以及如何下载、使用，基本模版和案例，等等。</p>
        
      </div>
    </div>

    <!-- Callout for the old docs link -->
    

    <div class="container bs-docs-container">
      <div class="row">
        <div class="col-md-3">
          <div class="bs-sidebar hidden-print" role="complementary">
            <ul class="nav bs-sidenav">
              
                <li>
  <a href="#download">下载Bootstrap</a>
  <ul class="nav">
    <li><a href="#download-compiled">编译后的CSS、JS和字体文件</a></li>
    <li><a href="#download-additional">额外的下载渠道</a></li>
    <li><a href="#download-cdn">Bootstrap CDN</a></li>
  </ul>
</li>
<li>
  <a href="#whats-included">包含了哪些文件</a>
  <ul class="nav">
    <li><a href="#whats-included-precompiled">编译版</a></li>
    <li><a href="#whats-included-source">源码</a></li>
  </ul>
</li>
<li>
  <a href="#template">基本模版</a>
</li>
<li>
  <a href="#examples">案例</a>
</li>

                                  
            </ul>
          </div>
        </div>
        <div class="col-md-9" role="main">
          
<?php echo $content; ?>
<!-- end of main content -->

        </div>
      </div>

    </div>

    <!-- Footer
    ================================================== -->
    <footer class="bs-footer" role="contentinfo">
      <div class="container">
        

        <p>Designed and built with all the love in the world by <a href="http://twitter.com/mdo" target="_blank">@mdo</a> and <a href="http://twitter.com/fat" target="_blank">@fat</a>.</p>
        <p>Code licensed under <a href="http://www.apache.org/licenses/LICENSE-2.0" target="_blank">Apache License v2.0</a>, documentation under <a href="http://creativecommons.org/licenses/by/3.0/">CC BY 3.0</a>.</p>
        <p>Bootstrap中文文档版权归<a href="http://www.bootcss.com/">Bootstrap中文网</a>及<a href="mailto:wangsai@bootcss.com">译者</a>所有。</p>
        <ul class="footer-links">
          <li>当前版本： v3.0.3</li>
          <li class="muted">&middot;</li>
          <li><a href="http://v2.bootcss.com/">Bootstrap 2.3.2 中文文档</a></li>
          <li class="muted">&middot;</li>
          <li><a href="http://www.bootcss.com">Bootstrap中文网</a></li>
          <li class="muted">&middot;</li>
          <li><a href="http://blog.getbootstrap.com">官方博客</a></li>
          <li class="muted">&middot;</li>
          <li><a href="https://github.com/twbs/bootstrap/issues?state=open">Issues</a></li>
          <li class="muted">&middot;</li>
          <li><a href="https://github.com/twbs/bootstrap/releases">Releases</a></li>
        </ul>
      </div>
    </footer>

    <!-- JS and analytics only. -->
    <!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/../libs/bootstrap3-doc/v3.bootcss.com/getting-started/jquery/1.10.2/jquery.min.js"></script>

<!-- Bootstrap core JS file
  注意：此文件跟随官网最新版本更新，随时会有改变。建议使用下面v3.0.3版本的CDN链接！
 -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/../libs/bootstrap3-doc/v3.bootcss.com/dist/js/bootstrap.js"></script>

<!-- Hi，如果你要在自己的网站上引入bootstrap JS文件的话，请使用当前最新版本v3.0.3的CDN链接，页面加载速度会更快！
<script src="twitter-bootstrap/3.0.3/js/bootstrap.min.js"></script>
-->

<script src="<?php echo Yii::app()->request->baseUrl; ?>/../libs/bootstrap3-doc/v3.bootcss.com/getting-started/holder/2.0/holder.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/../libs/bootstrap3-doc/v3.bootcss.com/getting-started/highlight.js/7.3/highlight.min.js"></script>
<script >hljs.initHighlightingOnLoad();</script>

<script src="<?php echo Yii::app()->request->baseUrl; ?>/../libs/bootstrap3-doc/v3.bootcss.com/docs-assets/js/application.js"></script>


</body>
</html>
