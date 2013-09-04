<?php
session_start();
if(isset($_SESSION['nums']) && !empty($_SESSION['nums'])){
	$usedNumbers = explode(";",$_SESSION['nums']);
	foreach($usedNumbers as $num){
		echo "<li>" . $num . "</li>";
	}
}
else{
	echo "Make sure you enter in the fields!";
}

?>