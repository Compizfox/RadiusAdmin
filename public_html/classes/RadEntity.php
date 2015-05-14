<?php
/*
    Filename:   RadEntity.php
    Date:       2015-05-13
    Author:     Lars Veldscholte
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

abstract class RadEntity {
	public $name;
	public $checkattrs = [];
	public $replyattrs = [];

	function __construct($name) {
		$this->name = $name;
	}
}

abstract class RadEntityMapper {
	protected $db;
	protected $nameColumnName;
	protected $checkTableName;
	protected $replyTableName;

	function __construct(PDO $db) {
		$this->db = $db;
	}

	abstract function getByName($name);

	function getNameList() {
		$ncn = $this->nameColumnName;
		$ctn = $this->checkTableName;
		$rtn = $this->replyTableName;

		$sql = "SELECT $ncn FROM radusergroup
		  UNION SELECT $ncn FROM $ctn
		  UNION SELECT $ncn FROM $rtn";

		return $this->db->query($sql)->fetchAll(PDO::FETCH_COLUMN);
	}

	function getAll() {
		// Instantiate User/Group for name, return array of Users/Groups
		return array_map([$this, "getByName"], $this->getNameList());
	}

	protected function retrieveAttrs($tbl, $name) {
		$ncn = $this->nameColumnName;

		// Retrieve and return all attributes as an array of AttributeValuePairs
		$stmt = $this->db->prepare("SELECT id, attribute, op AS operator, value FROM $tbl WHERE $ncn = :name");
		$stmt->bindParam(":name", $name, PDO::PARAM_STR);
		$stmt->execute();

		// Can't use PDOStatement::fetchAll here, because the returned array must by indexed by the id
		$stmt->setFetchMode(PDO::FETCH_CLASS, "AttributeValuePair");
		$avps = [];
		while($avp = $stmt->fetch()) {
			$avps[$avp->id] = $avp;
		}

		return $avps;
	}

	protected function saveAttrs($tbl, $name, array $avps) {
		$ncn = $this->nameColumnName;

		// Find out whether AVPs exist in db that are deleted in the new object

		$db_avps = $this->retrieveAttrs($tbl, $name);

		// Let A be the set of AVPs in db, and B be the set of AVPs in new object. Get A - B ...
		foreach(array_diff_key($db_avps, $avps) as $avp) {
			// ... and proceed to delete them from the db
			$stmt = $this->db->prepare("DELETE FROM $tbl WHERE id = :id");
			$stmt->bindParam(":id", $avp->id, PDO::PARAM_INT);
			$stmt->execute();
		}

		// Now that all deleted AVPs are deleted, let's insert/update the new/modified AVPs
		$stmt = $this->db->prepare("REPLACE INTO $tbl (id, $ncn, attribute, op, value) VALUES (:id, :name, :attribute, :op, :value)");
		$stmt->bindParam(":name", $name, PDO::PARAM_STR);

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