<?php

/*
	Search Form
	
	Creates the Business Pro search form 
	
	Copyright (C) 2011 CyberChimps
*/

?>

<form method="get" class="searchform" action="<?php echo home_url(); ?>/">
		<div><input type="text" name="s" class="s" value="Search" id="searchsubmit" onfocus="if (this.value == 'Search') this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}" /></div>
	<div><input type="submit" class="searchsubmit" value="" /></div>
</form>