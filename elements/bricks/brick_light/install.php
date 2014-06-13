<?php 

//check if there is already a version of this brick installed
$brick = mysqli_query($con,"SELECT * from bricks WHERE name='Light'");

if(mysqli_num_rows($brick) > 0){

    echo " already exists";

}else{
	//Add the brick to the brick database, only required step
	mysqli_query($con,"INSERT INTO bricks (name, version, sidebar, size, size_compact) VALUES ('Light', 1, true, 4, 1)");
	
	//Add own table for sensor logging
	//MUST start with 'brick_'
	mysqli_query($con,"CREATE TABLE brick_light (id int(11)  NOT NULL PRIMARY KEY, device_id int(11), name tinytext, selected boolean)");
	
	
	//Search the components database for keywords
	$components = mysqli_query($con,"SELECT * from components WHERE name IN ('light','lightsensor','lightlevel') ");

	//get the brick_id
	$brick = mysqli_query($con,"SELECT * from bricks WHERE name='Light'");
	$row_brick = mysqli_fetch_array($brick);

	//go trought this list, make a device brick for each one of them
	while ($row_components = mysqli_fetch_array($components)) {
		
		//add a connection between the brick and the component into the componenttype table
		mysqli_query($con,"INSERT INTO componenttype (component_id, brick_id) VALUES (".$row_components['id'].",". $row_brick['id'] . ")");
		
	}

}

mysqli_close($con);


