<?php
register_activation_hook ('TFS Custom Text', 'tfs_custom_text_install');

function sbm_install () {
	if (version_compare(get_bloginfo('version'),'1.0','<')) {
		deactivate_plugins (basename('TFS Custom Text')); //Deactivate plugin	
	}
}

// If uninstall not called from WordPress exit
if (!defined('WP_UNINSTALL_PLUGIN'))
exit ();
// Delete option from options table
delete_option('tfs_custom_text_myplugin_options');
//remove any additional options and custom tables
?>