<?php
/*
	Filename:	RadUnit.php
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
require_once(__DIR__ . "/AttributeValuePair.php");

abstract class RadUnit {
	public $name;
	public $checkattrs = [];
	public $replyattrs = [];

	function __construct($name = NULL) {
		// This weird construction is needed because PDO::FETCH_CLASS instantiates the class with correct $name, but calls the constructor afterwards without arguments

		if(isset($name)) {
			$this->name = $name;
		}

		if(isset($this->name)) {
			$this->PostConstructor();
		}
	}

	abstract protected function PostConstructor();

	protected function retrieveAttrs($tbl) {
		global $fr_db;

		// Retrieve and return all attributes as an array of AttributeValuePairs
		$stmt = $fr_db->prepare("SELECT attribute, op AS operator, value FROM $tbl WHERE username = :username");
		$stmt->bindParam(":username", $this->name, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_CLASS, "AttributeValuePair");
	}
}

?>