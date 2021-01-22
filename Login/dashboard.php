<?php
include("auth_session.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard - Client area</title>
    <link rel="stylesheet" href="css/style.css" />
</head>
	<body>

			<div class="container">
			  <h2>Account</h2>
			  <div class="w-full text-center">
						<a href="logout.php" class="txt3">
							Login
						</a>
					</div>
			  <ul class="responsive-table">
			    <li class="table-header">
			      <div class="col col-1">username</div>
			      <div class="col col-2">Date de création</div>

			    </li>
			    <?php

			    require('db.php');
			    $count = current($con->query("SELECT COUNT(*) FROM `users`")->fetch_object());
			    for ($i = 1; $i <= $count; $i++) {
			    	$t = $i - 1;
					echo "<li class='table-row $t'>";

								$usernameInfo = current($con->query("SELECT username FROM `users` WHERE id = '$i'")->fetch_object());
								$create_datetime = current($con->query("SELECT create_datetime FROM `users` WHERE id = '$i'")->fetch_object());
							    echo"<div class='col col-$i' data-label='Username'>";
							    echo $usernameInfo;
							    echo"</div>";

							    echo"<div class='col col-$i+1' data-label='Date de création'>";
							    echo $create_datetime;
							    echo"</div>";
					echo "</li>";
					}
						
					
				?>
			  </ul>
		</div>
	</body>
</html>
