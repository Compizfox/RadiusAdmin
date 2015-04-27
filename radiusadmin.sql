SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


CREATE TABLE IF NOT EXISTS menu (
id int(11) NOT NULL,
  parent_id int(11) NOT NULL DEFAULT '0',
  `page` varchar(255) CHARACTER SET latin1 NOT NULL,
  `options` varchar(25) NOT NULL,
  title varchar(255) CHARACTER SET latin1 NOT NULL,
  glyphicon varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

INSERT INTO menu (id, parent_id, page, options, title, glyphicon) VALUES
(1, 0, 'home', '', 'Home', 'glyphicon glyphicon-home'),
(2, 0, 'users', '', 'Users', 'glyphicon glyphicon-user'),
(3, 0, 'groups', '', 'Groups', 'fa fa-group'),
(4, 0, 'accounting', '', 'Accounting', 'glyphicon glyphicon-list'),
(5, 0, 'clients', '', 'Clients', 'fa fa-server'),
(6, 0, 'log', '', 'Log', '');


ALTER TABLE menu
 ADD PRIMARY KEY (id), ADD KEY parent_id (parent_id);


ALTER TABLE menu
MODIFY id int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
