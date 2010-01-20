<div class="grid_12">
<p>Click on the title of a project to be taken to the relevant article.</p>
</div>
<div class="grid_6">
<ul class="project_list">
<?php $half = round( count( $projects ) / 2 ); $i = 0; ?>
<?php foreach( $projects as $k => $v ): ?>
<hr />
<li><span><h3><a href="projects/article:<?php echo $v[ "id" ]?>"><?php echo $v[ "title" ]?></a></h3>
	<?php echo substr( $v[ "body" ], 0, 200 );?>&hellip;
</span></li>
<?php if( $i++ == $half - 1 ): ?>
</ul>
</div>
<div class="grid_6">
<ul class="project_list">
<?php endif; ?>
<?php endforeach; ?>
</ul>
</div>