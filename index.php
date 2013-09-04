<?php
	session_start();
	// session_unset();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>RandNoRepeat</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.js"></script>
    <style type="text/css">
    .center{
    	text-align: center;
    }
    ul {
    	list-style-type: none;
    }
    .footer{
    	text-align: center;
		padding: 30px 0;
		margin-top: 70px;
		border-top: 1px solid #e5e5e5;
		background-color: #f5f5f5;
    }
    </style>
  </head>
  <body>
  	<div class="container center">
    	<h1>Random No Repeat</h1>
    	<h2>By Ozair Patel</h2>
    	<br><br>
    		From: <input class="input-mini" type="text" id="from" placeholder="1" required><br>
    		To: <input class="input-mini" type="text" id="to" placeholder="100" required><br>
    		<input type="submit" id="submit" class="btn" value="Generate"><br><br>
    		<div id="alert"></div>
    	<h4 id="result">Result: RANDOM!</h5>
    	<legend>
    		<h5>Past Numbers</h6><a href="killses.php"><button id="reset" class="btn btn-danger pull-right">Reset</button></a>
    	</legend>
    	<ul id="used">
    	</ul>
    	<footer class="footer">
    		<h5>Powered By <a href="http://getbootstrap.com/">BootStrap</a>, <a href="http://httpd.apache.org/">Apache</a>, <a href="http://www.php.net">PHP 5</a>, and <a href="http://jquery.com">jQuery</a>.</h5> 
    	</footer>
	</div>
	<script>
        $(document).ready(function(){
            $("#used").load("usernum.php");
        });
		$("#submit").click(function(){
    			var from = $("#from").val();
    			var to = $("#to").val();
                var from_int = parseInt(from);
                var to_int = parseInt(to);
                if(from !== "" && to !== ""){
                    if(to_int <= from_int){
                        $('#alert').prepend('<div class="alert alert-danger"><strong>Error:</strong> Your from integer must be smaller than your to integer!</div>');
                        return false;
                    }
                    var totalInts = to_int - from_int + 1;
        			var path = "generate.php?from=" + from + "&to=" + to + "&totalInts=" + Math.abs(totalInts);
        			$("#result").load(path, function(){
        				$("#used").load("usernum.php");
                        		$('#alert').empty();
        			});
                }else{
                    $('#alert').prepend('<div class="alert alert-danger"><strong>Error:</strong> No values entered!</div>');
                }
		});
	</script>
  </body>
</html>
