<?php
/**
 	Filename:   frontcontroller_helper.php
 	Date:       2016-01-20
 	Author:     Lars Veldscholte
 	            lars@veldscholte.eu
 	            http://lars.veldscholte.eu

 	Copyright 2016 Lars Veldscholte

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

// First try to get an exact match for both page and options
$exactmatch = array_filter($result = $stmt->fetchAll(), function($row) {
	// Compare querystring (after page, beginning with &) with options in dbase
	return $row['options'] == substr($_SERVER['QUERY_STRING'], strpos($_SERVER['QUERY_STRING'], "&"));
});

if(!empty($exactmatch)) {
	$current_pageid = reset($exactmatch)['id'];
} else {
	// If there is not exact match, go with the (first, and probably only) row that matches the page
	$current_pageid = $result[0]['id'];
}

if(!empty($result)) {
	$page_exists = true;
} else {
	$page_exists = false;
}

$smarty = new Smarty;
$smarty->setTemplateDir("../app/tpl/");
$smarty->setCompileDir("../tmp/templates_c/");
$smarty->setCacheDir("../tmp/cache/");

?>