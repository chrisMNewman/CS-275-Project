<?php 
	session_start(); 
	require("common.php"); 
?>


<html>
<head>
	<title>Mike and Chris's Super Forum</title>
	<link rel="stylesheet" type="text/css" href="mikechrisforum.css" />
</head>
<body>
	<div id="wrap" >
	<?php include "header.php" ?> <br>

	<div id="page_body">
		<?php 
			$P_Number = $db->real_escape_string(trim($_POST['P_Number']));
			$curpage = $db->real_escape_string(trim($_POST['curpage']));

			if(empty($P_Number)){
				exit('<meta http-equiv="refresh" content="0; url=' . urldecode($homepage) . '"/>'); 
			}

			$query = 'SELECT Content, T_ID FROM Post WHERE P_Number='.$P_Number;
			$result = $db->query($query);
			$row = $result->fetch_row();
			$content = $row[0];
			$T_ID = $row[1];
			$result->close();
		?>
		<form id="editpost_form" action="editpost.php" method="post">
			<label for="editpost_content">Edit Post:</label><br> 
			<textarea id="editpost_content" name="content" rows=6 cols=50><?php print($content); ?></textarea>
			<br>
			<input type="hidden" name="P_Number" value="<?php print($P_Number); ?>">
			<input type="hidden" name="T_ID" value="<?php print($T_ID); ?>">
			<input type="hidden" name="curpage" value="<?php print($curpage); ?>">
			<input id="editpost_submit" type="submit">
		</form>
	</div>
	<br>
	<?php include "footer.php" ?> <br>
</div>
</body>
</html>