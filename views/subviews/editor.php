<form method="<?php echo $form[ "method" ]?>" id="<?php $form[ "name" ]?>" action="<?php echo $form[ "action" ]?>"><?php foreach( $form[ "fieldsets" ] as $fieldset_name => $fieldset ): ?>
			<fieldset id="<?php echo $fieldset_name ?>"><legend><?php echo $fieldset[ "title" ]?></legend>
<?php 	foreach( $fieldset[ "fields" ] as $field_name => $field ): ?>
				<?php echo $field;?>
				
<?php 	endforeach; ?>
			</fieldset>
<?php endforeach; ?>
		<button id="submit" class="positive"><img src="css_lib/plugins/buttons/icons/tick.png" /> Submit</button>
		<button id="reset" class="negative"><img src="css_lib/plugins/buttons/icons/cross.png" /> Reset</button>
</form>