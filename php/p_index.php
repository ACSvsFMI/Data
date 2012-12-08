<?php
$category = (defined('arg1') && arg1 > 0) ? arg1 : 0;
$status	  = (defined('arg2') && arg2 > 0) ? arg2 : 0;
$limit	  = (defined('arg3')) ? arg3 : 0;
$perPage  = 8;

$t_results = SQL_DB::sql_select(MYSQL_PRE.'users', NULL, "ORDER BY `datainsert` DESC");

$results = array();
for($n=($limit+1); $n<=$limit+$perPage; $n++)
{
	if(isset($t_results[$n]))
		$results[] = $t_results[$n];
	else
		break;
}

$max = count($results);
?>
    <div id="Content" class="clear">
    	<div id="Page" class="site_width center">
    		<?php include('php/navigator.php');?>
            <div class="title left"><h1>Lista utilizatori</h1></div>
            <form class="search right">
            	<fieldset>
                	<button class="right">Search</button>
                	<input class="right field" type="search" name="search" value="" />
                </fieldset>
            </form>
            <div class="cfix"></div>
            <div class="filter left"><select><option>Toate</option><option>Doar cele validate</option></select></div>
            <div class="pagination right clear">
				<?php echo pagination(array('admin', 'index', $category, $status), array(), $limit, $perPage, $max); ?>
            </div>
            <div class="cfix"></div>
            <div class="wp-table">
            	<div class="th">
                	<span class="td" style="width:20px;"></span>
                    <span class="td" style="width:420px;">Client</span>
                    <span class="td" style="width:80px;">Postari</span>
                    <span class="td" style="width:80px;">Postari</span>
                    <span class="td" style="width:80px;">Data</span>
                </div>
                <?php
				foreach($results as $row)
				{
					$datainsert = new DateTime($row['datainsert']);
					//$category = $catModel->get($row['category']);
					echo '<section class="tr">';
						echo '<div class="td" style="width:20px;">#'.$row['id'].'</div>';
                    	echo '<div class="td" style="width:420px;">';
							echo '<div class="image"><img src="https://lh4.googleusercontent.com/-TbJPTyRfwTk/AAAAAAAAAAI/AAAAAAAAAIE/OKXlm7KRQ4k/photo.jpg?sz=50" width="53" height="53" alt="" /></div>';
							echo '<div class="info"><h1><a href="" target="_blank">John Doe</a></h1><span>Senior web la Hosting<br />Senior web la Hosting</span></div>';
						echo '</div>';
                    	echo '<div class="td" style="width:80px;">999,999</div>';
						echo '<div class="td" style="width:80px;">999,999</div>';
						echo '<div class="td" style="width:80px;"><strong>'.$datainsert->format("H:i").'</strong><br /><strong>'.$datainsert->format("d M Y").'</strong><br /><span style="color:#666"></span></div>';
					echo '</section>';
				}
				?>
            </div>
        </div>
    </div>