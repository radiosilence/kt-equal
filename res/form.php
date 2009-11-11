<?php
 
define( "RES_FORM_CLASS_TITLE", ' class="title"' );
 
define( "RES_FORM_FIELD_HIDDEN", '<input type="hidden" name="%1$s" id="%1$s" value="%2$s"/>' );
define( "RES_FORM_FIELD_CHAR", '<p><label for="%1$s">%2$s</label><br /><input%4$s type="text" name="%1$s" id="%1$s" value="%3$s" /></p>' );
define( "RES_FORM_FIELD_NUMBER", '<p><label for="%1$s">%2$s</label><br /><input%4$s type="text" name="%1$s" id="%1$s" value="%3$s"/></p>' );
define( "RES_FORM_FIELD_DATETIME", '<p><label for="%1$s">%2$s</label><br /><input type="text" name="%1$s" id="%1$s" value="%3$s"/>(Date)</p>' );
define( "RES_FORM_FIELD_TEXT", '<p><label for="%1$s">%2$s</label><br /><textarea%4$s name="%1$s" id="%1$s">%3$s</textarea></p>' );
define( "RES_FORM_FIELD_PASSWORD", '<p><label for="%1$s">%2$s</label><br /><input%3$s type="password" name="%1$s" id="%1$s"/>(Password)</p>' );
define( "RES_FORM_FIELD_TICK", '<p><label for="%1$s">%2$s</label><br /><input%4$s type="checkbox" name="%1$s" id="%1$s" %3$s/></p>' );
define( "RES_FORM_FIELD_TICK_CHECKED", "checked" );
define( "RES_FORM_FIELD_TICK_UNCHECKED", "unchecked" );
 
define( "RES_FORM_FIELD_SELECT_DEF", "\n\t\t\t\t\t"
. '<option id="null">Select...</option>'
);
 
define( "RES_FORM_FIELD_SELECT_1", "\t\t\t\t\t<option" );
define( "RES_FORM_FIELD_SELECT_2", ' value="%s"' );
define( "RES_FORM_FIELD_SELECT_3", ">%s</option>" );
define( "RES_FORM_FIELD_SELECT_SEL", " selected" );
define( "RES_FORM_FIELD_SELECT_NO", "<option>NO OPTIONS</option>" );
define( "RES_FORM_FIELD_SELECT", '<p><label for="%1$s">%2$s</label><br />'
. '<select%4$s name="%1$s">%3$s</select></p>'
);
 
define( "RES_FORM_FIELD_AJAJ","<p>"
. '<label for="%1$s">%2$s</label><br />'
. '<input type="text" class="ajaj_search%6$s" '
. 'search_type="%3$s" '
. 'name="%1$s" '
. 'id="%1$s" '
. 'value="%5$s" '
. 'valkey="%4$s" '
. 'store="%7$s" '
. '/></p>'
);
 
define( "RES_FORM_FIELD_AJAJ_CLASS_TITLE", " title" );
?>