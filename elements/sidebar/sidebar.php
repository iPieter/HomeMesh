<link rel="stylesheet" type="text/css" href="css/sidebar.css">


<div id="sidebar">

	<div id="user">
		<?php 
		//get the username and image from the current user
		//only one user for the moment: admin
		$username = "Admin";
		$image = "images/users/". $username . ".jpg";
		
		echo "<div id='avatar'> <img src=". $image ." alt=". $username ."/> </div>";
		echo "		<div class='dropdown'><a role='button' href='#'  data-toggle='dropdown' class='dropdown-toggle'> <div id='username'>  <span class='text'> $username </span>";
		?>
		<span class="icon-arrow-down"></span> </div> </a> 
		

		  	<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
		    <li role="presentation"><a role="menuitem" tabindex="-1" href="settings/account_settings.php" data-target="#">User settings</a></li>
		    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Help and support</a></li>
		    <li role="presentation" class="divider"></li>
		    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Log out</a></li>
		  </ul>
		</div>
		
	</div>
	
	<hr>
	
	
	
</div>

<script>

$(document).ready(function () {
	 $('.dropdown-toggle').dropdown();
});

</script>