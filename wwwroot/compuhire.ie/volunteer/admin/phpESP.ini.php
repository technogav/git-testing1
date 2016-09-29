<?php

// use http or https?
$ESPCONFIG['proto'] = 'http://';

// Base URL for phpESP
$ESPCONFIG['base_url'] = $ESPCONFIG['proto'] . $server['HTTP_HOST'] . '/volunteer/';

// Database connection information
// for the database type, change $ESPCONFIG['adodb_database_type'] (further down)
$ESPCONFIG['db_host'] = 'localhost';
$ESPCONFIG['db_user'] = 'compuhi_admin';
$ESPCONFIG['db_pass'] = 'Oskar2005';
$ESPCONFIG['db_name'] = 'compuhi_phpesp';
//$DB_PREFIX = "phpesp_";   // If you want your database tables to use a prefix, set it here.
//$OLD_DB_PREFIX = "";   // When switching prefixes, give here the current existing prefix in the db

?>
