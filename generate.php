<?php
session_start();
	
	if(count(explode(";", $_SESSION['nums'])) != (int)$_GET['totalInts']){
		if(isset($_SESSION['nums']) && !empty($_SESSION['nums'])){
			$userNumbers = explode(";", $_SESSION['nums']);
			do {
				$number = mt_rand($_GET['from'], $_GET['to']);
			} while ($number == in_array($number, $userNumbers));
			//echo "Imploded: \"" . $implodedNumbers . "\"";
			$_SESSION['nums'] = $_SESSION['nums'] . ";" . $number;
			echo $number;
			//print_r($_SESSION);
		}else{
			$number = mt_rand($_GET['from'], $_GET['to']);
			$_SESSION['nums'] = $number;
			echo $number;
		}
	}else{
		echo "No more numbers to generate.";
	}
?>