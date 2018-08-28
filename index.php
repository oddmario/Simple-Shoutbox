<?php
/*
	@author: mariolatiffathy
	@github: https://github.com/mariolatiffathy
	@project-repo: mariolatiffathy/Simple-Shoutbox
	@file-description: The main script
*/
if( isset( $_GET['send'] ) ) {
	header('Content-Type: application/json');
	if( isset($_POST['shout']) ) {
		$data = "<strong>".$_POST['name']."</strong>: ".$_POST['shout']."\n";
		$fp = fopen('Chat.txt', 'a');
		fwrite($fp, $data);
		echo json_encode(array(
			'status' => '200'
		));
	} else {
		echo json_encode(array(
			'status' => '403'
		));
	}
	die();
}
if( isset( $_GET['get'] ) ) {
	$num_of_shouts = 15;
	$file = new SplFileObject('Chat.txt');
	$file->seek($file->getSize());
	$linesTotal = $file->key()+1;
	foreach( new LimitIterator($file, $linesTotal-$num_of_shouts) as $line) {
		include('emotes.php');
		echo $line.'<br />';
	}
	die();
}
?>
<html>

	<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script>
		function GetShouts() {
			$.get({
			  url: '?get', 
			  cache: false
			}).then(function(rdata){
			  document.getElementById("shoutbox").innerHTML = rdata;
			});
		}
		function Shout() {
			var ShoutName = document.getElementById('name').value;
			var ShoutMsg = document.getElementById('msg').value;
			$.ajax({
					type : "POST",
					url  : "?send",
					data : { shout : ShoutMsg, name : ShoutName },
					success: function(res){  
						document.getElementById("lastLog").innerHTML = "Sent message: " + document.getElementById('msg').value;
						document.getElementById('msg').value = "";
					}
				});
		}
		$( document ).ready(function() {
			var t=setInterval(GetShouts,100);
			document.getElementById("lastLog").innerHTML = "No Logs";
		});
		</script>

		<style>
		#bloc1, #lastLog
		{
			display:inline;
		}
		</style>
	</head>

	<body>
	<center>
		<div id="shoutbox"></div>

		<input type="text" placeholder="Enter your name here..." id="name" />
		<br />
		<input type="text" placeholder="Enter your message here..." id="msg" />
		<button onclick="Shout();">Send</button>
		<br />
		<div id="bloc1"><strong>Last Log: </strong></div><div id="lastLog"></div>
		
		<hr>
		
		<h3>Emotes</h3>
		
		<p>:kek:</p>
		<p>:thinkwell:</p>
		<p>:doge:</p>
		<p>:lul:</p>
		<p>:ohgod:</p>
	</center>
	</body>

</html>
