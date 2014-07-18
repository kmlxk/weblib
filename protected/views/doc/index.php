
<!-- Docs page layout -->
<div class="bs-header" id="content">
    <div class="container">
        <h1>weblib</h1>
        <p>我的收藏夹，个人感兴趣的文档。</p>

    </div>
</div>

<div class="container bs-docs-container">
    <div class="row">
        <div class="col-md-3">
            <div class="bs-sidebar hidden-print" role="complementary">

                <ul class="nav bs-sidenav">
                    <?php
                    foreach ($dpDoc->getData() as $doc) {
                        echo '<li>', CHtml::link(CHtml::encode($doc->title), array('doc/view', 'id' => $doc->id)), '</li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
        <div class="col-md-9" role="main">


            <?php
            $this->widget('zii.widgets.CListView', array(
                'dataProvider' => $dpDoc,
                'itemView' => '_view',
            ));
            ?>


        </div>
    </div>

</div>