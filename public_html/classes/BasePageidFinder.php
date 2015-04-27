<?php
/*
	Filename:	BasePageidFinder.php
	Date:		2015-04-27
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

class BasePageidFinder {
	private $stmt;
	private $pageid;

	function __construct() {
		global $ra_db;

		$this->stmt = $ra_db->prepare("SELECT parent_id FROM menu WHERE id = :id");
		$this->stmt->bindParam(":id", $this->pageid, PDO::PARAM_INT);
	}

	function getBasePageid($pageid) {
		$this->pageid = $pageid;
		$this->stmt->execute();

		$parent_id = $this->stmt->fetchColumn();

		// If parent_id of current pageid is zero, then this pageid is the highest level
		if($parent_id == 0) {
			return $pageid;

		} else {
			return $this->getBasePageid($parent_id);
		}
	}
}