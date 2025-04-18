<?php
register_activation_hook ('SBM Image Field', 'streamreport_install');

function streamreport_install () {
	if (version_compare(get_bloginfo('version'),'4.6','<')) {
		deactivate_plugins (basename('SBM Image Field')); //Deactivate plugin	
	}
}

// If uninstall not called from WordPress exit
if (!defined('WP_UNINSTALL_PLUGIN'))
exit ();
// Delete option from options table
delete_option('streamreport_myplugin_options');
//remove any additional options and custom tables
?>