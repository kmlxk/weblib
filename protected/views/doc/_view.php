<div class="post">
	<h3>
		<?php echo CHtml::link(CHtml::encode($data->title), array('doc/view', 'id'=>$data->id)); ?>
	</h3>
	<span>
		<b>发表:</b> <?php echo $data->author . ' ' . date('Y-m-d',$data->created); ?>
        | 
		<?php
			$this->beginWidget('CMarkdown', array('purifyOutput'=>true));
			echo $data->content;
			$this->endWidget();
		?>
        <b>标签:</b>
		<?php echo $data->tags; ?> | 
		<?php echo CHtml::link('原文', $data->url); ?> | 
		<b>更新时间:</b> <?php echo date('Y-m-d',$data->updated); ?>
	</span>
</div>
