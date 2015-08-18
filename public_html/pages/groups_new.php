<?php
/*
    Filename:   groups_new.php
    Date:       2015-06-21
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

// Assign empty RadEntity to Smarty so Smarty won't whine about $entity not existing
$entity = new RadEntity("");
$smarty->assign("entity", $entity);

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
?>