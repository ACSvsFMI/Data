<?php
// ANTIHACK verificare access din exterior ------------------------------------------------------------------------------- //
if(!defined('ANTIHACK'))
{
	header('HTTP/1.0 403 Forbidden');
	header('Status: 403 Forbidden');
	die(include("../module/e_403.php"));
}
//------------------------------------------------------------------------------------------------------------------------ //
//
//
// --- Default ----------------------------------------------------------------------------------------------------------- //
	define("DEFAULT_PAGE",      "index");
	define("DEFAULT_LANGUAGE",  "romanian");
	define("DEFAULT_LANG",      "ro");
//------------------------------------------------------------------------------------------------------------------------ //
?>