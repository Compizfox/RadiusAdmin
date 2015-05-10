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

require_once(__DIR__ . "/AttributeValuePair.php");

class User {
	public $name;
	public $checkattrs = [];
	public $replyattrs = [];
	public $groups = [];

	function __construct($name) {
		$this->name = $name;
	}
}

Class UserMapper {
	private $db;

	function __construct(PDO $db) {
		$this->db = $db;
	}

	function getAll() {
		$sql = "SELECT username AS name FROM radusergroup
		  UNION SELECT username AS name FROM radcheck
		  UNION SELECT username AS name from radreply";

		// Instantiate User for every row, return array of Users
		return $this->db->query($sql)->fetchAll(PDO::FETCH_FUNC, [$this, "getByName"]);
	}

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
		// Insert/update User-Group relations
		$stmt = $this->db->prepare("REPLACE INTO radusergroup (username, groupname, priority) VALUES (:username, :groupname, :priority)");
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

	private function retrieveAttrs($tbl, $name) {
		// Retrieve and return all attributes as an array of AttributeValuePairs
		$stmt = $this->db->prepare("SELECT id, attribute, op AS operator, value FROM $tbl WHERE username = :username");
		$stmt->bindParam(":username", $name, PDO::PARAM_STR);
		$stmt->execute();

		// Can't use PDOStatement::fetchAll here, because the returned array must by indexed by the id
		$stmt->setFetchMode(PDO::FETCH_CLASS, "AttributeValuePair");
		$avps = [];
		while($avp = $stmt->fetch()) {
			$avps[$avp->id] = $avp;
		}

		return $avps;
	}

	private function saveAttrs($tbl, $username, array $avps) {
		// Find out whether AVPs exist in db that are deleted in the new User object

		$db_avps = $this->retrieveAttrs($tbl, $username);

		// Let A be the set of AVPs in db, and B be the set of AVPs in new User object. Get A - B ...
		foreach(array_diff_key($db_avps, $avps) as $avp) {
			// ... and proceed to delete them from the db
			$stmt = $this->db->prepare("DELETE FROM $tbl WHERE id = :id");
			$stmt->bindParam(":id", $avp->id, PDO::PARAM_INT);
			$stmt->execute();
		}

		// Now that all deleted AVPs are deleted, let's insert/update the new/modified AVPs
		$stmt = $this->db->prepare("REPLACE INTO $tbl (id, username, attribute, op, value) VALUES (:id, :username, :attribute, :op, :value)");
		$stmt->bindParam(":username", $username, PDO::PARAM_STR);

		foreach($avps as $avp) {
			$stmt->bindParam(":id", $avp->id, PDO::PARAM_INT);
			$stmt->bindParam(":attribute", $avp->attribute, PDO::PARAM_STR);
			$stmt->bindParam(":op", $avp->operator, PDO::PARAM_STR);
			$stmt->bindParam(":value", $avp->value, PDO::PARAM_STR);
			$stmt->execute();
		}
	}
}

?>