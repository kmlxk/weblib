<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo CHtml::encode($this->pageTitle); ?></title>
<!--                       CSS                       -->
<!-- Reset Stylesheet -->
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/../libs/tpl-simpleadmin/resources/css/reset.css" type="text/css" media="screen" />
<!-- Main Stylesheet -->
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/../libs/tpl-simpleadmin/resources/css/style.css" type="text/css" media="screen" />
<!-- Invalid Stylesheet. This makes stuff look pretty. Remove it if you want the CSS completely valid -->
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/../libs/tpl-simpleadmin/resources/css/invalid.css" type="text/css" media="screen" />
<!--                       Javascripts                       -->
<!-- jQuery -->
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/../libs/tpl-simpleadmin/resources/scripts/jquery-1.3.2.min.js"></script>
<!-- jQuery Configuration -->
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/../libs/tpl-simpleadmin/resources/scripts/simpla.jquery.configuration.js"></script>
<!-- Facebox jQuery Plugin -->
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/../libs/tpl-simpleadmin/resources/scripts/facebox.js"></script>
<!-- jQuery WYSIWYG Plugin -->
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/../libs/tpl-simpleadmin/resources/scripts/jquery.wysiwyg.js"></script>
<!-- jQuery Datepicker Plugin -->
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/../libs/tpl-simpleadmin/resources/scripts/jquery.datePicker.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/../libs/tpl-simpleadmin/resources/scripts/jquery.date.js"></script>
</head>
<body>
<div id="body-wrapper">
  <!-- Wrapper for the radial gradient background -->
  <div id="sidebar">
    <div id="sidebar-wrapper">
      <!-- Sidebar with logo and menu -->
      <h1 id="sidebar-title"><a href="<?php echo Yii::app()->request->baseUrl; ?>/../libs/tpl-simpleadmin/#">Simpla Admin</a></h1>
      <!-- Logo (221px wide) -->
      <a href="<?php echo Yii::app()->request->baseUrl; ?>/../libs/tpl-simpleadmin/http://www.865171.cn"><img id="logo" src="<?php echo Yii::app()->request->baseUrl; ?>/../libs/tpl-simpleadmin/resources/images/logo.png" alt="Simpla Admin logo" /></a>
      <!-- Sidebar Profile links -->
      <div id="profile-links"> Hello, <a href="<?php echo Yii::app()->request->baseUrl; ?>/../libs/tpl-simpleadmin/#" title="Edit your profile">865171</a>, you have <a href="<?php echo Yii::app()->request->baseUrl; ?>/../libs/tpl-simpleadmin/#messages" rel="modal" title="3 Messages">3 Messages</a><br />
        <br />
        <a href="<?php echo Yii::app()->request->baseUrl; ?>/../libs/tpl-simpleadmin/#" title="View the Site">View the Site</a> | <a href="<?php echo Yii::app()->request->baseUrl; ?>/../libs/tpl-simpleadmin/#" title="Sign Out">Sign Out</a> </div>
      <ul id="main-nav">
        <!-- Accordion Menu -->
        <li> <a href="<?php echo Yii::app()->request->baseUrl; ?>/../libs/tpl-simpleadmin/http://www.865171.cn/" class="nav-top-item no-submenu">
          <!-- Add the class "no-submenu" to menu items with no sub menu -->
          Dashboard </a> </li>
        <li> <a href="<?php echo Yii::app()->request->baseUrl; ?>/../libs/tpl-simpleadmin/#" class="nav-top-item current">
          <!-- Add the class "current" to current menu item -->
          Articles </a>
          <ul>
            <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/../libs/tpl-simpleadmin/#">Write a new Article</a></li>
            <li><a class="current" href="<?php echo Yii::app()->request->baseUrl; ?>/../libs/tpl-simpleadmin/#">Manage Articles</a></li>
            <!-- Add class "current" to sub menu items also -->
            <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/../libs/tpl-simpleadmin/#">Manage Comments</a></li>
            <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/../libs/tpl-simpleadmin/#">Manage Categories</a></li>
          </ul>
        </li>
        <li> <a href="<?php echo Yii::app()->request->baseUrl; ?>/../libs/tpl-simpleadmin/#" class="nav-top-item"> Pages </a>
          <ul>
            <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/../libs/tpl-simpleadmin/#">Create a new Page</a></li>
            <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/../libs/tpl-simpleadmin/#">Manage Pages</a></li>
          </ul>
        </li>
        <li> <a href="<?php echo Yii::app()->request->baseUrl; ?>/../libs/tpl-simpleadmin/#" class="nav-top-item"> Image Gallery </a>
          <ul>
            <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/../libs/tpl-simpleadmin/#">Upload Images</a></li>
            <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/../libs/tpl-simpleadmin/#">Manage Galleries</a></li>
            <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/../libs/tpl-simpleadmin/#">Manage Albums</a></li>
            <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/../libs/tpl-simpleadmin/#">Gallery Settings</a></li>
          </ul>
        </li>
        <li> <a href="<?php echo Yii::app()->request->baseUrl; ?>/../libs/tpl-simpleadmin/#" class="nav-top-item"> Events Calendar </a>
          <ul>
            <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/../libs/tpl-simpleadmin/#">Calendar Overview</a></li>
            <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/../libs/tpl-simpleadmin/#">Add a new Event</a></li>
            <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/../libs/tpl-simpleadmin/#">Calendar Settings</a></li>
          </ul>
        </li>
        <li> <a href="<?php echo Yii::app()->request->baseUrl; ?>/../libs/tpl-simpleadmin/#" class="nav-top-item"> Settings </a>
          <ul>
            <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/../libs/tpl-simpleadmin/#">General</a></li>
            <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/../libs/tpl-simpleadmin/#">Design</a></li>
            <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/../libs/tpl-simpleadmin/#">Your Profile</a></li>
            <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/../libs/tpl-simpleadmin/#">Users and Permissions</a></li>
          </ul>
        </li>
      </ul>
      <!-- End #main-nav -->
      <div id="messages" style="display: none">
        <!-- Messages are shown when a link with these attributes are clicked: href="<?php echo Yii::app()->request->baseUrl; ?>/../libs/tpl-simpleadmin/#messages" rel="modal"  -->
        <h3>3 Messages</h3>
        <p> <strong>17th May 2009</strong> by Admin<br />
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna. Cras in mi at felis aliquet congue. <small><a href="<?php echo Yii::app()->request->baseUrl; ?>/../libs/tpl-simpleadmin/#" class="remove-link" title="Remove message">Remove</a></small> </p>
        <p> <strong>2nd May 2009</strong> by Jane Doe<br />
          Ut a est eget ligula molestie gravida. Curabitur massa. Donec eleifend, libero at sagittis mollis, tellus est malesuada tellus, at luctus turpis elit sit amet quam. Vivamus pretium ornare est. <small><a href="<?php echo Yii::app()->request->baseUrl; ?>/../libs/tpl-simpleadmin/#" class="remove-link" title="Remove message">Remove</a></small> </p>
        <p> <strong>25th April 2009</strong> by Admin<br />
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna. Cras in mi at felis aliquet congue. <small><a href="<?php echo Yii::app()->request->baseUrl; ?>/../libs/tpl-simpleadmin/#" class="remove-link" title="Remove message">Remove</a></small> </p>
        <form action="#" method="post">
          <h4>New Message</h4>
          <fieldset>
          <textarea class="textarea" name="textfield" cols="79" rows="5"></textarea>
          </fieldset>
          <fieldset>
          <select name="dropdown" class="small-input">
            <option value="option1">Send to...</option>
            <option value="option2">Everyone</option>
            <option value="option3">Admin</option>
            <option value="option4">Jane Doe</option>
          </select>
          <input class="button" type="submit" value="Send" />
          </fieldset>
        </form>
      </div>
      <!-- End #messages -->
    </div>
  </div>
  <!-- End #sidebar -->
  <div id="main-content">
    <?php 
    if (Yii::app()->user->hasFlash('message')) {
        $msg = Yii::app()->user->getFlash('message');
        $msg = json_decode($msg, true);
        echo '<div class="notification ',$msg['icon'],' png_bg"> <a class="close" href="#"><img alt="close" title="Close this notification" src="resources/images/icons/cross_grey_small.png"></a>
<div>',$msg['message'],'</div></div>';
    }
    ?>
    <?php echo $content; ?>
    
    <div id="footer"> <small>
      <!-- Remove this notice or replace it with whatever you want -->
      &#169; Copyright &copy; <?php echo date('Y'); ?> <a href="http://www.dev91.com/">dev91.com</a> | Powered by kmlxk0[at]gmail.com | <a href="#">Top↑</a> </small> </div>
    <!-- End #footer -->
  </div>
  <!-- End #main-content -->
</div>
</body>
<!-- Download From www.exet.tk-->
</html>
