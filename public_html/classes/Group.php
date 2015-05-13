<?php
/*
	Filename:	Group.php
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

class Group extends RadEntity {
	public $users = [];
}

Class GroupMapper extends RadEntityMapper {
	protected $nameColumnName = "groupname";

	function getNameList() {
		$ncn = $this->nameColumnName;

		$sql = "SELECT $ncn FROM radusergroup
		  UNION SELECT $ncn FROM radgroupcheck
		  UNION SELECT $ncn FROM radgroupreply";

		return $this->db->query($sql)->fetchAll(PDO::FETCH_COLUMN);
	}

	function getByName($name) {
		// Instantiate Group
		$group = new Group($name);

		// Retrieve all users in this group, into $users[]
		$stmt = $this->db->prepare("SELECT username FROM radusergroup WHERE groupname = :groupname ORDER BY priority ASC");
		$stmt->bindParam(":groupname", $name, PDO::PARAM_STR);
		$stmt->execute();
		$group->users = $stmt->fetchAll(PDO::FETCH_COLUMN);

		// Retrieve check attributes into $checkattrs;
		$group->checkattrs = $this->retrieveAttrs("radgroupcheck", $name);

		// Retrieve reply attributes into $replyattrs
		$group->replyattrs = $this->retrieveAttrs("radgroupreply", $name);

		return $group;
	}

	function save(Group $group) {
		// Insert/update User-Group relations
		$stmt = $this->db->prepare("REPLACE INTO radusergroup (username, groupname, priority) VALUES (:username, :groupname, :priority)");
		$stmt->bindParam(":groupname", $group->name, PDO::PARAM_STR);

		foreach($group->users as $priority => $username) {
			$stmt->bindParam(":priority", $priority, PDO::PARAM_INT);
			$stmt->bindParam(":username", $username, PDO::PARAM_STR);
			$stmt->execute();
		}

		// Insert/update check attributes
		$this->saveAttrs("radgroupcheck", $group->name, $group->checkattrs);

		// Insert/update reply attributes
		$this->saveAttrs("radgroupreply", $group->name, $group->replyattrs);
	}
}

?>