<?php
/*
    Filename:   users_new.php
    Date:       2015-05-21
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

require_once(__DIR__ . "/../classes/User.php");
require_once(__DIR__ . "/../classes/Group.php");
require_once(__DIR__ . "/../include/db.php");

// Assign empty user to Smarty so Smarty won't whine about $user not existing
$user = new User("");
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
?>