<?php
/**
 	Filename:   Menuitem.php
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

	function __construct(int $id, int $parent_id, string $page, string $options, string $title, string $glyphicon, bool $activeonly) {
		$this->id = $id;
		$this->parentid = $parent_id;
		$this->page = $page;
		$this->options = $options;
		$this->title = $title;
		$this->glyphicon = $glyphicon;
		$this->activeonly = $activeonly;
	}

	public function setActive(bool $active) {
		$this->active = $active;

		// Set visibility to false if the menuitem is visible if active only, and not active
		if($this->activeonly && !$this->active) $this->visible = false;
	}

	function populateSubmenu(PDO $db, int $levels) {
		$submenu = new Menu($db, $this->id, $levels);
		$this->submenuitems = $submenu->getMenuData();
	}

	function getUrl(): string {
		return "index.php?page=" . $this->page . $this->options;
	}
}