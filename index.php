<?php

// trimite tipul MIME si codarea caracterelor
header("Content-Type: text/html; charset=utf-8");
//------------------------------------------------------------------------------------------------------------------------ //
define('ANTIHACK', TRUE);
require_once('config/_autoload.php');
//------------------------------------------------------------------------------------------------------------------------ //
//
//
//
// system includes ------------------------------------------------------------------------------------------------------- //
include_once('libs/SQL_DB.php');
include_once('libs/Validator.php');
include_once('libs/Form_data.php');
include_once('design/layout.php');
//------------------------------------------------------------------------------------------------------------------------ //
// END index site

/* End of file index.php */
/* Location: ./index.php */
?>