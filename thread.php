<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php 
session_start(); 
require("common.php"); 

if (!empty($_GET['T_ID'])) {$T_ID = $_GET['T_ID'];}
else{
	exit('<meta http-equiv="refresh" content="0; url=' . urldecode($homepage) . '"/>'); 
}

$curpage = '1';
if (isset($_GET['page'])) {$curpage = $_GET['page'];}

if (empty($_SESSION['post_per_page'])) {
	$_SESSION['post_per_page'] = 10;
}
$per_page = $_SESSION['post_per_page'];
if (isset($_GET['per_page'])) {
	$per_page = $_GET['per_page'];
	$_SESSION['post_per_page']= $per_page;}
?>

<html>
<head>
<title>Mike and Chris's Super Forum</title>
<link rel="stylesheet" type="text/css" href="mikechrisforum.css" />
</head>

<body>
<div id="wrap" >
	<?php include "header.php" ?>
	<br>
	<div id="page_body">
		<div id="thread_name"> 
			<?php 
			$query = 'SELECT Title, U_ID FROM Thread WHERE T_ID='.$T_ID;
			if($result = $db->query($query)){
				$row = $result->fetch_row();
				$title = $row[0];
				$owner = $row[1];
				$result->close();
			}
			else{
				$title = "Database Error, please contact administrator.";
				$owner = 'None';
			}
			print($title);
			if ($_SESSION['U_ID'] === $owner){
				$buttons = '<form id="deletethread_form" action="deletethread.php" method="post">
							<input type="hidden" name="T_ID" value="'.$T_ID.'">
							<input type="submit" value="Delete Thread">
							</form>';
				print($buttons);
			}
			?>
		</div>
		<div id="page_list">
			<?php 
			$page_list = 'Goto Page: ';
			$query = 'SELECT COUNT(*) FROM Post WHERE T_ID='.$T_ID;
			if($result = $db->query($query)){
				$row = $result->fetch_row();
				$pagecount = ($row[0]+$per_page-1)/$per_page;
				$result->close();
			}
			else{
				$pagecount = 1;
			}
			
			for ($i = 1; $i <= $pagecount; $i++){
				if($i != 1){$page_list .= ', ';}
				if($i == $curpage){
					$page_list .= '<b><u>'.$curpage.'</u></b>';
				}
				else {
					$page_list .= '<a href="'.$homepage.'thread.php?T_ID='.$T_ID.'&per_page='.$per_page.'&page='.$i.'">'.$i.'</a>';
				}
				
			}
			print($page_list);
			?><br>
			 Results per page: <a href="<?php print('thread.php?T_ID='.$T_ID.'&per_page=5&page=1') ?>">5</a>, <a href="<?php print('thread.php?T_ID='.$T_ID.'&per_page=10&page=1') ?>">10</a>, <a href="<?php print('thread.php?T_ID='.$T_ID.'&per_page=20&page=1') ?>">20</a>

		</div>
		<table id="post_item_table">
			<tr id="post_item">
				<td id="table_header">User</td>
				<td id="table_header">Content</td>
				<td id="table_header">Post Time</td>
				<td id="table_header">Edited At</td>
				<td id="table_header">Options</td>
			</tr>
			<?php  
			$query = 'SELECT User.U_ID, P_Number, Screen_Name, Content, Post_Time, Last_Edit_Time FROM Post NATURAL JOIN User WHERE T_ID='.$T_ID.' ORDER BY Post_Time ASC LIMIT '.(($curpage-1)*$per_page).','.$per_page;
			//print($query);
			$row_format = 
						'<tr id="post_item">
						<td id="post_item_user"><a href="user.php?U_ID=%s">%s</a></td>
						<td id="post_item_content">%s</td>
						<td id="post_item_date">%s</td>
						<td id="post_item_date">%s</td>
						<td id="post_item_buttons">%s</td>
						</tr>';
			if($result = $db->query($query)){
				while($row = $result->fetch_assoc()){
					if($_SESSION['U_ID'] == $row['U_ID']){
						$buttons = 
								'<table><tr><td><form action="posteditor.php" method="post">
								<input type="hidden" name="P_Number" value="'.$row['P_Number'].'">
								<input type="hidden" name="curpage" value="'.$curpage.'">
								<input type="submit" value="Edit">
								</form></td><td>
								<form action="deletepost.php" method="post">
								<input type="hidden" name="P_Number" value="'.$row['P_Number'].'">
								<input type="hidden" name="T_ID" value="'.$T_ID.'">
								<input type="hidden" name="curpage" value="'.$curpage.'">
								<input type="submit" value="Delete">
								</form></td></tr></table>';
					}
					else{
						$buttons = '';
					}

					printf($row_format, $row['U_ID'], $row['Screen_Name'], $row['Content'] ,$row['Post_Time'],$row['Last_Edit_Time'], $buttons);
				}
			}
			else{
				printf($row_format, '', 'Admin', 'Database Error, please contact administrator.' , 'Never', 'Never', '');
			}

			?>
		</table>
		<div id="page_list">
			<?php print($page_list); ?>
		</div>
		<?php 
		if(!isset($_SESSION['U_ID'])){
			print('<br>Login to post');
		}
		else { ?>
		<form id="newpost_form"action="newpost.php" method="post">
			New Post:<br> <textarea id="newpost_content" name="content" rows=6 cols=50></textarea>
			<br>
			<input type="hidden" name="T_ID" value="<?php print($T_ID); ?>">
			<input id="newpost_submit" type="submit">
		</form>
		<?php } ?>
	</div>
	<br>
	<?php include "footer.php" ?>
</div>
</body>
</html>
