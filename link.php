<!DOCTYPE html>
<html>
<?php
$name=$_POST['name'];
if(empty($name)) {
	echo "The user name is not set";
} else {
	echo "The user name is $name";
}
?>
</body>
</html>