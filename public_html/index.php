<?php
/*
	Filename:   index.php
	Date:       2015-04-26
	Author:     Lars Veldscholte
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

require("../app/include/autoloader.php");
require("../app/include/db.php");
require("../app/include/frontcontroller_helper.php");

// Initialize menu
require("../app/include/menu.php");

// Serve 404 page if page doesn't exist in db
if ($page_exists) {
	$file = "../app/pages/" . $page . ".php";

	// Include file if exists
	file_exists($file) and include($file);

	$smarty->display("$page.tpl");
} else {
	header("HTTP/1.0 404 Not Found");
	$smarty->display("404.tpl");
}

?>