<?php
/**
 	Filename:   menu.php
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

// We need the base page_id (highest level parent of current page)
$base_pageid_finder = new BasePageidFinder($ra_db);
$baseid = $base_pageid_finder->getBasePageid($current_pageid);

// Draw topmenu (all menuitems for topmenu have parent_id=0 in db)
$topmenu = new Menu($ra_db, 0, 1, $baseid);
$smarty->assign("topmenu_items", $topmenu->getMenuData());

// Draw leftmenu

// The left menu should always contain the children of the highest parent level
$leftmenu = new Menu($ra_db, $baseid, 2);
$smarty->assign("leftmenu_items", $leftmenu->getMenuData());
?>