<?php
/*
	Filename:	Group.php
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

require_once(__DIR__ . "/../include/db.php");
require_once(__DIR__ . "/RadUnit.php");

class Group extends RadUnit {
	public $users = [];

	protected function PostConstructor() {
		global $fr_db;

		// Retrieve all users that belong to this group
		$stmt = $fr_db->prepare("SELECT username FROM radusergroup WHERE groupname = :groupname ORDER BY priority ASC");
		$stmt->bindParam(":username", $this->name, PDO::PARAM_STR);
		$stmt->execute();
		$this->users = $stmt->fetch(PDO::FETCH_COLUMN);

		// Retrieve check attributes
		$this->checkattrs = $this->retrieveAttrs("radgroupcheck");

		// Retrieve reply attributes
		$this->replyattrs = $this->retrieveAttrs("radgroupreply");
	}
}

?>