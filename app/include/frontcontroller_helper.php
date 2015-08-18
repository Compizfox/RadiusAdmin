<?php
/*
	Filename:	frontcontroller_helper.php
	Date:		2015-04-27
    Author:		Lars Veldscholte
				lars@veldscholte.eu
				http://lars.veldscholte.eu

    Copyright 2015 Lars Veldscholte

    This file is part of RadiusAdmin.

    RadiusAdmin is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    RadiusAdmin is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with RadiusAdmin. If not, see <http://www.gnu.org/licenses/>.
*/

require(__DIR__ . "/db.php");

ini_set("display_errors", 1);
error_reporting(E_ALL);

// Default page is home
if(isset($_GET['page'])) {
	$page = $_GET['page'];
} else {
	$page = "home";
}

// Get info about pages from db
$stmt = $ra_db->prepare("SELECT * FROM menu WHERE page = :page");
$stmt->bindParam(":page", $page, PDO::PARAM_STR);
$stmt->execute();
$result = $stmt->fetch();

// Save this for later use
$current_pageid = $result['id'];

if(!empty($result)) {
	$page_exists = true;
} else {
	$page_exists = false;
}

?>