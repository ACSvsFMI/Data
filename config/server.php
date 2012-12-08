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
//------------------------------------------------------------------------------------------------------------------------ //
	define("PROIECT",	"Reparatii-Servicii.ro");
	define("DOMAIN",	"reparatii-servicii.ro");
//------------------------------------------------------------------------------------------------------------------------ //
//
//------------------------------------------------------------------------------------------------------------------------ //
if($_SERVER['HTTP_HOST'] == 'localhost')
{
	define("SITE_ROOT",		"http://localhost/clienti/meseriasul/");
	define("ADMIN_ROOT",	SITE_ROOT."administrator/");
	define("ROOT",			"http://localhost/clienti/meseriasul/");
}
else
if($_SERVER['HTTP_HOST'] == 'www.reparatii-servicii.ro' || $_SERVER['HTTP_HOST'] == 'reparatii-servicii.ro')
{
	define("SITE_ROOT",		"http://reparatii-servicii.ro/");
	define("ADMIN_ROOT",	SITE_ROOT."administrator/");
	define("ROOT",			"/");
}
//------------------------------------------------------------------------------------------------------------------------ //
?>