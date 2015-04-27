<?php
/*
	Filename:	User.php
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

require_once(__DIR__ . "/../include/db.php");

class User {
	public $username;
	public $groups = [];
	public $checkattrs = [];
	public $replyattrs = [];

	function __construct() {
		$this->populate();
	}

	private function populate() {
		global $fr_db;

		// Retrieve all groups this user is in into groups[]
		$stmt = $fr_db->prepare("SELECT groupname FROM radusergroup WHERE username = :username ORDER BY priority ASC");
		$stmt->bindParam(":username", $this->username, PDO::PARAM_STR);
		$stmt->execute();
		$this->groups = $stmt->fetch(PDO::FETCH_COLUMN);
	}
}