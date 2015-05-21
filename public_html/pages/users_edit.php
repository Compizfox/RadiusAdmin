<?php
/*
	Filename:	users_edit.php
	Date:		2015-04-29
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

require_once(__DIR__ . "/../classes/User.php");
require_once(__DIR__ . "/../classes/Group.php");
require_once(__DIR__ . "/../include/db.php");

if($_SERVER['REQUEST_METHOD'] == "POST") {
	// Construct User from POST data
	$user = new User($_POST['username']);

	// Groups
	if(isset($_POST['groups'])) $user->groups = $_POST['groups'];

	// Check attributes
	if(isset($_POST['checkattrs-id'])) {
		for($i = 0; $i < count($_POST['checkattrs-id']); $i++) {
			$user->checkattrs[] = new AttributeValuePair($_POST['checkattrs-id'][$i], $_POST['checkattrs-attribute'][$i], $_POST['checkattrs-operator'][$i], $_POST['checkattrs-value'][$i]);
		}
	}

	// Reply attributes
	if(isset($_POST['replyattrs-id'])) {
		for($i = 0; $i < count($_POST['replyattrs-id']); $i++) {
			$user->replyattrs[] = new AttributeValuePair($_POST['replyattrs-id'][$i], $_POST['replyattrs-attribute'][$i], $_POST['replyattrs-operator'][$i], $_POST['replyattrs-value'][$i]);
		}
	}

	// Save User in db
	$usermapper = new UserMapper($fr_db);
	$usermapper->save($user);

	// PRG-redirect
	header("Location: index.php?page=users_edit&user={$_POST['username']}");
	exit();
} else {
	if(empty($_GET['user'])) {
		die("No user specified.");
	}

	// Get user
	$usermapper = new UserMapper($fr_db);
	$user = $usermapper->getByName($_GET['user']);

	if(empty($user)) {
		die("Non-existent user specified.");
	}

	$smarty->assign("user", $user);

	// Get list of all groups
	$groupmapper = new GroupMapper($fr_db);
	$grouplist = $groupmapper->getNameList();
	$smarty->assign("grouplist", $grouplist);

	// operator list
	$operatorlist = ["=", ":=", "==", "+=", "!=", ">", ">=", "<", "<=", "=~", "!~", "=*", "!*"];
	$smarty->assign("operatorlist", $operatorlist);

	// Attribute list
	$attributelist = $ra_db->query("SELECT attribute FROM dictionary")->fetchAll(PDO::FETCH_COLUMN);
	$smarty->assign("attributelist", $attributelist);
}

?>