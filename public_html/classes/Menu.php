<?php
/*
	Filename:	topmenu.php
	Date:		2015-04-26
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

require_once(__DIR__ . "/Menuitem.php");

class Menu {
	private $parent_id;
	private $levels;
	private $baseid;
	private $menuitems = [];

	function __construct($parent_id, $levels = 1, $baseid = null) {
		$this->parent_id = $parent_id;
		$this->levels = $levels;
		$this->baseid = $baseid;
		$this->populate();
	}

	private function populate() {
		global $ra_db;

		$stmt = $ra_db->prepare("SELECT id, parent_id, page, options, title, glyphicon, activeonly FROM menu WHERE parent_id = :parent_id ORDER BY id ASC");
		$stmt->bindParam(":parent_id", $this->parent_id, PDO::PARAM_INT);
		$stmt->execute();

		// Call addMenuItem() for every row
		$stmt->fetchAll(PDO::FETCH_FUNC, [$this, "addMenuItem"]);
	}

	function addMenuItem($id, $parent_id, $mpage, $options, $title, $glyphicon, $activeonly) {
		global $page;
		$item = new Menuitem($id, $parent_id, $mpage, $options, $title, $glyphicon, $activeonly);

		// If current page is this item, make it active
		// If this is the topmenu ($parent_id=0), also make menuitem active if current page is child
		$item->setActive(($page == $mpage) || ($this->baseid == $id));

		// If levels > 1, menuitem should recursively lookup for submenuitems
		if($this->levels > 1) {
			$item->populateSubmenu($this->levels - 1);
		}

		$this->menuitems[] = $item;
	}

	function getMenuData() {
		// Return an array of Menuitems
		return $this->menuitems;
	}
}

// TODO: This class is the only class in the project to use the Active Record ORM pattern. I probably want to switch that to Data Mapper sometime