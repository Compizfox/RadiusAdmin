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

require_once(__DIR__ . "/RadEntity.php");

class User extends RadEntity {
	public $groups = [];
}

Class UserMapper extends RadEntityMapper {
	protected $nameColumnName = "username";
	protected $checkTableName = "radcheck";
	protected $replyTableName = "radreply";

	function getByName($name) {
		// Instantiate User
		$user = new User($name);

		// Retrieve all groups this user is in, into $groups[]
		$stmt = $this->db->prepare("SELECT groupname FROM radusergroup WHERE username = :username ORDER BY priority ASC");
		$stmt->bindParam(":username", $name, PDO::PARAM_STR);
		$stmt->execute();
		$user->groups = $stmt->fetchAll(PDO::FETCH_COLUMN);

		// Retrieve check attributes into $checkattrs;
		$user->checkattrs = $this->retrieveAttrs("radcheck", $name);

		// Retrieve reply attributes into $replyattrs
		$user->replyattrs = $this->retrieveAttrs("radreply", $name);

		return $user;
	}

	function save(User $user) {
		// First delete all User-Group relations for this User
		$stmt = $this->db->prepare("DELETE FROM radusergroup WHERE username = :username");
		$stmt->bindParam(":username", $user->name, PDO::PARAM_STR);
		$stmt->execute();

		// Insert new User-Group relations
		$stmt = $this->db->prepare("INSERT INTO radusergroup (username, groupname, priority) VALUES (:username, :groupname, :priority)");
		$stmt->bindParam(":username", $user->name, PDO::PARAM_STR);

		foreach($user->groups as $priority => $groupname) {
			$stmt->bindParam(":priority", $priority, PDO::PARAM_INT);
			$stmt->bindParam(":groupname", $groupname, PDO::PARAM_STR);
			$stmt->execute();
		}

		// Insert/update check attributes
		$this->saveAttrs("radcheck", $user->name, $user->checkattrs);

		// Insert/update reply attributes
		$this->saveAttrs("radreply", $user->name, $user->replyattrs);
	}
}

?>