<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name . ' - 文档抓取';
$this->breadcrumbs=array(
	'Doc','Grab',
);
?>


<div class="content-box">
      <!-- Start Content Box -->
      <div class="content-box-header">
        <h3 style="cursor: s-resize;"><?php echo $this->pageTitle;?></h3>
        <ul class="content-box-tabs">
          <li><a class="default-tab current" href="#tab1">Table</a></li>
          <!-- href must be unique and match the id of target div -->
        </ul>
        <div class="clear"></div>
      </div>
      <!-- End .content-box-header -->
      <div class="content-box-content">
        <div id="tab1" class="tab-content default-tab" style="display: block;">
          <div class="notification attention png_bg"> <a class="close" href="#"><img alt="close" title="Close this notification" src="resources/images/icons/cross_grey_small.png"></a>
            <div>页面采集尚出于测试阶段，提交的页面信息可能不能完全进入数据库 </div>
          </div>
          <form method="post" action="#">
            <fieldset>
            <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
            <p>
              <label>URL</label>
              <input type="text" name="medium-input" id="medium-input" class="text-input medium-input datepicker">
              <span class="input-notification success png_bg">请粘贴网址</span>
            </p>
            <p>
              <input type="submit" value="提交" class="button">
            </p>
            </fieldset>
            <div class="clear"></div>
            <!-- End .clear -->
          </form>
        </div>
        <!-- End #tab2 -->
      </div>
      <!-- End .content-box-content -->
    </div>