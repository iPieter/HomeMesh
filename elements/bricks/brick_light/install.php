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
	mysqli_query($con,"CREATE TABLE brick_light (id int(11)  NOT NULL PRIMARY KEY, device_id int(11), name tinytext, default boolean)");
}


