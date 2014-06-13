<?php
//list of all the text
$new_row = "	</div>
	<div class='row'>";

$cell = "<div class='col-md-3'> <div class='brick'><div  class='image'><img  class='device' src='images/devices/";
$cell_2 = ".jpg'/> </div> <div class='info'> <h1>";
$cell_3 = "</h2><ul class='list-unstyled'>";
$cell_4 = "</ul></div></div></div>";


//Get a list of all the devices in the database
$devices = mysqli_query($con,"SELECT * from devices");

//a counter for the while loop, to know when to add a new row
$i = 0;

//go trought this list, make a device brick for each one of them
while ($row_devices = mysqli_fetch_array($devices)) {
	$i++;
	
	//set cell3 back to default state
	$cell_3 = "</h2><ul class='list-unstyled'>";
	
	//check if the counter is a factor of 4
	if($i %5 == 0) {
		echo $new_row;
	}
	
	//get the name of the room it's in
	$room = mysqli_query($con,"SELECT name from rooms where id=" . $row_devices['room_id']);	
	$row_room = mysqli_fetch_array($room);

	//get all the components that are connected to the device
	$components = mysqli_query($con,"SELECT name from components where device_id=" . $row_devices['id']);	
	
	while ($row_component = mysqli_fetch_array($components)) {
		
		$cell_3 = $cell_3 . "<li>" . $row_component['name'] . "</li>";
		
	}
	
	//create the cell
	echo $cell . $row_devices['image_id'] .   $cell_2 . $row_devices['name'] . "</h1> <h2>" . $row_room['name'] . $cell_3 . $cell_4;

}


?> 