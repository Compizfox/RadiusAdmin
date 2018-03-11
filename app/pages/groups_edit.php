<?php
/**
 	Filename:   groups_edit.php
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

if($_SERVER['REQUEST_METHOD'] == "POST") {
	// Construct RadEntity from POST data
	$group = new RadEntity($_POST['name']);

	// Groups
	if(isset($_POST['children'])) $group->children = $_POST['children'];

	// Check attributes
	if(isset($_POST['checkattrs-id'])) {
		for($i = 0; $i < count($_POST['checkattrs-id']); $i++) {
			$group->checkattrs[] = new AttributeValuePair($_POST['checkattrs-id'][$i], $_POST['checkattrs-attribute'][$i], $_POST['checkattrs-operator'][$i], $_POST['checkattrs-value'][$i]);
		}
	}

	// Reply attributes
	if(isset($_POST['replyattrs-id'])) {
		for($i = 0; $i < count($_POST['replyattrs-id']); $i++) {
			$group->replyattrs[] = new AttributeValuePair($_POST['replyattrs-id'][$i], $_POST['replyattrs-attribute'][$i], $_POST['replyattrs-operator'][$i], $_POST['replyattrs-value'][$i]);
		}
	}

	// Save group in db
	$groupmapper = new GroupMapper($fr_db);
	$groupmapper->save($group);

	// PRG-redirect
	header("Location: index.php?page=groups_edit&name={$_POST['name']}");
	exit();
} else {
	if(empty($_GET['name'])) {
		die("No group specified.");
	}

	// Get user
	$groupmapper = new GroupMapper($fr_db);
	$group = $groupmapper->getByName($_GET['name']);

	if(empty($group)) {
		die("Non-existent group specified.");
	}

	$smarty->assign("entity", $group);

	// Get list of all users
	$usermapper = new UserMapper($fr_db);
	$userlist = $usermapper->getNameList();
	$smarty->assign("childrenlist", $userlist);

	// operator list
	$operatorlist = json_decode($ra_db->query("SELECT data FROM serialized WHERE name = 'operatorlist'")->fetchColumn());
	$smarty->assign("operatorlist", $operatorlist);

	// Attribute list
	$attributelist = $ra_db->query("SELECT attribute FROM dictionary")->fetchAll(PDO::FETCH_COLUMN);
	$smarty->assign("attributelist", $attributelist);
}

?>
