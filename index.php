<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php session_start(); 
require("common.php"); 

$curpage = '1';
if (isset($_GET['page'])) {$curpage = $_GET['page'];}

if (empty($_SESSION['thread_per_page'])) {
	$_SESSION['thread_per_page'] = 10;
}
$per_page = $_SESSION['thread_per_page'];
if (isset($_GET['per_page'])) {
	$per_page = $_GET['per_page'];
	$_SESSION['thread_per_page']= $per_page;}
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
		<div id="page_list">
			<?php 
			$page_list = 'Goto Page: ';
			$query = 'SELECT COUNT(*) FROM Thread';
			$result = $db->query($query);
			$row = $result->fetch_row();
			$pagecount = ($row[0]+$per_page-1)/$per_page;
			$result->close();
			
			for ($i = 1; $i <= $pagecount; $i++){
				if($i != 1){$page_list .= ', ';}
				if($i == $curpage){
					$page_list .= '<b><u>'.$curpage.'</u></b>';
				}
				else {
					$page_list .= '<a href="'.$homepage.'index.php?per_page='.$per_page.'&page='.$i.'">'.$i.'</a>';
				}
				
			}
			print($page_list);
			 ?><br>
			 Results per page: <a href="index.php?per_page=5&page=1">5</a>, <a href="index.php?per_page=10&page=1">10</a>, <a href="index.php?per_page=20&page=1">20</a>

		</div>
		<table id="thread_link_table">
			<tr id="thread_link">
				<td id="table_header">Thread Title</td>
				<td id="table_header">Post Count</td>
				<td id="table_header">Created At</td>
				<td id="table_header">Created By</td>
				<td id="table_header">Last Edit At</td>
			</tr>	
			<?php  
			$query = 'SELECT Thread.T_ID, Title, Creation_Time, COUNT(*), Screen_Name, MAX(Post.Last_Edit_Time) FROM Thread, Post ,User WHERE Thread.T_ID=Post.T_ID AND Thread.U_ID=User.U_ID GROUP BY Thread.T_ID ORDER BY MAX(Post.Last_Edit_Time) DESC LIMIT '.(($curpage-1)*$per_page).','.$per_page;
			//print($query);
			$row_format = 
						'<tr id="thread_link">
						<td id="thread_link_name"><a href="thread.php?T_ID=%s">%s</a></td>
						<td id="thread_link_count">Posts: %s</td><td id="thread_link_date">%s</td>
						<td id="thread_link_user">%s</td>
						<td id="thread_link_date">%s</td>
						</tr>';
			$result = $db->query($query);
			while($row = $result->fetch_assoc()){
				printf($row_format, $row['T_ID'], $row['Title'], $row['COUNT(*)'] ,$row['Creation_Time'], $row['Screen_Name'], $row['MAX(Post.Last_Edit_Time)']);
			}
			?>
		</table>
		<div id="page_list">
			<?php print($page_list); ?>
		</div>
		<form id="newthread_form" action="createthread.php" method="get">
			<input type="submit" value="New Thread">

		</form>
	</div>
	<br>
	<?php include("footer.php");?>
</div>
</body>
</html>
