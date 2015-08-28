<?php 


# ================================================
# Check for existiong "bp-custom.php" 
# ================================================

if (bp_plugin_is_active()) {
	
	if (!file_exists(WP_PLUGIN_DIR . '/bp-custom.php')) {
		// if there isn't one we will move the example file and rename it (this is for thumbnail size settings)
		if (!copy(dirname(__FILE__).'/example-bp-custom.php', WP_PLUGIN_DIR . '/bp-custom.php')) {
			// This would be the place for an error message...
		}
	}
}



?>