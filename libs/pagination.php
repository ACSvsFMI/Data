<?php  if ( ! defined('ANTIHACK')) exit('No direct script access allowed');
// ------------------------------------------------------------------------
//
// adauga parametrului specificat adresa de baza, ROOT-ul
function pagination($page, $limit, $perPage, $max)
{
	if($limit)
	{
		$back = (($limit - $perPage) > 0) ? $limit - $perPage : 0;
		$bt_back = true;
	}
	else
		$bt_back = false;
	
	if(($limit+$perPage) < $max)
	{
		$next = (($limit+$perPage) < $max) ? $limit+$perPage : $max;
		$bt_next = true;
	}
	else
		$bt_next = false;
	
	$html_code = NULL;
	if($bt_back)
		$html_code .= '<a class="left" href="index.php?page='.$page.'&amp;limit='.$back.'"><span>&lsaquo;</span></a>';
	else
		$html_code .= '<span class="left"><span>&lsaquo;</span></span>';
	
	$html_code .= '<div class="page-info">Pagina '.(ceil($limit/$perPage)+1).' / '.ceil($max/$perPage).'</div>';
	
	if($bt_next)
		$html_code .= '<a href="index.php?page='.$page.'&amp;limit='.$next.'" class="right" rel="2"><span>&rsaquo;</span></a>';
	else
		$html_code .= '<span class="right"><span>&rsaquo;</span></span>';
					
	return $html_code;
}

// END url helper

/* End of file url.php */
/* Location: ./system/helpers/url.php */