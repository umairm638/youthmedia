<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//live
//$servername = "localhost";
//$username = "youthmedia";
//$password = "youthmedia100";
//$dbname = "youthmedia";
//local
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "youthscreen";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
