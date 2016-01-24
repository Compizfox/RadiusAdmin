<?php
/**
 	Filename:   Session.php
 	Date:       2015-10-28
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

class Session {
	function __construct() {
		session_start();
	}

	function __set($name, $value) {
		$_SESSION[$name] = $value;
	}

	function __get($name) {
		if(!isset($_SESSION[$name])) {
			throw new Exception("Session variable '$name' is undefined");
		}

		return $_SESSION[$name];
	}

	function __isset($name) {
		return isset($_SESSION[$name]);
	}

	function __unset($name) {
		unset($_SESSION[$name]);
	}

	public function reset() {
		session_destroy();
		$_SESSION = [];
		session_start();
	}
}

?>