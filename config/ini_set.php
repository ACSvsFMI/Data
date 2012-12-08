<?php if ( ! defined('ANTIHACK')) exit('No direct script access allowed');
//------------------------------------------------------------------------------------------------------------------------ //
//
//------------------------------------------------------------------------------------------------------------------------ //
	session_start();
	set_time_limit(300);
	//error_reporting(0);
//------------------------------------------------------------------------------------------------------------------------ //
	@ini_set("session.save_handler", "files");
	ini_set('register_global', 0);
	ini_set('log_errors', '1');
	ini_set('ignore_repeated_errors', '1');
	ini_set('ignore_repeated_source', '1');
	ini_set('log_errors_max_len', '1024');
	ini_set('arg_separator.input', '&');
	ini_set('arg_separator.output', '&');
//------------------------------------------------------------------------------------------------------------------------ //
?>