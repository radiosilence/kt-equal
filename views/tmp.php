
							<?php foreach( $navs as $n => $nav ): ?>
							<li><a href="<?php echo $n?>" id="n_<?php echo $n?><?php echo ( $nav[ "active" ] ? "_active" : null )?>"><?php echo $nav[ "title" ]?></a></li>
							<?php endforeach; ?>