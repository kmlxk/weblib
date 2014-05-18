<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name . ' - 添加';
$this->breadcrumbs = array(
    'Doc', 'Add',
);

$cs=Yii::app()->clientScript;
$cs->registerScriptFile(Yii::app()->request->baseUrl .'/../libs/ueditor1_4_2-utf8-php/ueditor.config.js', CClientScript::POS_HEAD);
$cs->registerScriptFile(Yii::app()->request->baseUrl .'/../libs/ueditor1_4_2-utf8-php/ueditor.all.min.js', CClientScript::POS_HEAD);
$cs->registerScriptFile(Yii::app()->request->baseUrl .'/../libs/ueditor1_4_2-utf8-php/lang/zh-cn/zh-cn.js', CClientScript::POS_HEAD);
?>

<div class="content-box">
    <!-- Start Content Box -->
    <div class="content-box-header">
        <h3 style="cursor: s-resize;"><?php echo $this->pageTitle; ?></h3>
        <ul class="content-box-tabs">
            <li><a class="default-tab current" href="#tab1">Table</a></li>
            <!-- href must be unique and match the id of target div -->
        </ul>
        <div class="clear"></div>
    </div>
    <!-- End .content-box-header -->
    <div class="content-box-content">
        <div id="tab1" class="tab-content default-tab" style="display: block;">
            <form method="post" action="<?php echo $this->createUrl('admin/doc/save');?>">
                <fieldset>
                    <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
                    <p>
                        <label>标题</label>
                        <input type="text" name="title" id="medium-input" class="text-input medium-input datepicker">
                        <span class="input-notification success png_bg"></span>
                    </p>
                    <p>
                        <label>网址</label>
                        <input type="text" name="url" id="medium-input" class="text-input medium-input datepicker">
                        <span class="input-notification success png_bg"></span>
                    </p>
                    <p>
                        <label>标签</label>
                        <input type="text" name="tags" id="medium-input" class="text-input medium-input datepicker">
                        <span class="input-notification success png_bg">竖线|分割多个标签</span>
                    </p>
                    <p>
                        <script id="editor" type="text/plain" style="width:100%;height:250px;"></script>
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


<script type="text/javascript">

    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    var ue = UE.getEditor('editor');

</script>