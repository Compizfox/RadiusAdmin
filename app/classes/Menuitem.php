<?php
/*
	Filename:	menuitem.php
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

class Menuitem {
	public $id;
	public $parent_id;
	public $page;
	public $options;
	public $title;
	public $glyphicon;
	public $activeonly;
	public $visible = true;
	public $active = false;
	public $submenuitems = [];

	function __construct($id, $parent_id, $page, $options, $title, $glyphicon, $activeonly) {
		$this->id = $id;
		$this->parentid = $parent_id;
		$this->page = $page;
		$this->options = $options;
		$this->title = $title;
		$this->glyphicon = $glyphicon;
		$this->activeonly = $activeonly;
	}

	public function setActive($active) {
		$this->active = $active;

		// Set visibility to false if the menuitem is visible if active only, and not active
		if($this->activeonly && !$this->active) $this->visible = false;
	}

	function populateSubmenu($db, $levels) {
		$submenu = new Menu($db, $this->id, $levels);
		$this->submenuitems = $submenu->getMenuData();
	}

	function getUrl() {
		return "index.php?page=" . $this->page . $this->options;
	}
}