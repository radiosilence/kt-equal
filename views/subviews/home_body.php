<h2>Welcome to Site</h2>
<p>What's on the agenda for today? Have a read of some articles&hellip;</p>
<ul id="articles">
<?php foreach( $articles as $article ): ?>
<li id="<?php echo $article[ "id" ] ?>">
<h3>
	<a href="articles/<?php echo $article[ "seo_url" ]?>"><?php echo $article[ "title" ] ?></a>
</h3>
<em>Added <?php echo $article[ "date_added" ] ?>; <strong><?php echo $article[ "author" ]?></strong>, <?php echo $article[ "publisher" ] ?> (<?php echo $article[ "date" ] ?>)</em>
<p><?php echo $article[ "excerpt" ] ?></p></li>
<?php endforeach; ?>
</ul>