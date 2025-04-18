<?php
register_activation_hook ('TFS Custom Fields', 'sbm_install');

function sbm_install () {
	if (version_compare(get_bloginfo('version'),'4.6','<')) {
		deactivate_plugins (basename('TFS Custom Fields')); //Deactivate plugin	
	}
}

// If uninstall not called from WordPress exit
if (!defined('WP_UNINSTALL_PLUGIN'))
exit ();
// Delete option from options table
delete_option('sbm_myplugin_options');
//remove any additional options and custom tables
?>