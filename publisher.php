<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'db_connect.php';

if ($_GET['id']) {
	$id = $_GET['id'];
	$sql_request = "SELECT media.title FROM media WHERE fk_publisher = '$id'";
	$result = $connect->query($sql_request); 
	$connect->close(); 
?>

<!DOCTYPE html>
<html>
<head>
   <title>Media by Publisher</title>
</head>

<body>
	<fieldset>
		<?php 
		if($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				echo  
				"<div>" .$row['title']."</div>" ;
			}
		} else {
			echo  "<tr><td colspan='5'><center>No Data Avaliable</center></td></tr>";
		}
		?>
		<a  href= "home.php"><button type="button">Back</button></a>
	</fieldset>

</body>
</html>

<?php
}
?>