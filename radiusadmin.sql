SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE IF NOT EXISTS `dictionary` (
  `attributeid` int(11) NOT NULL,
  `attribute` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=167 DEFAULT CHARSET=latin1;

INSERT INTO `dictionary` (`attributeid`, `attribute`) VALUES
(1, 'ARAP-Challenge-Response'),
(2, 'ARAP-Features'),
(3, 'ARAP-Password'),
(4, 'ARAP-Security'),
(5, 'ARAP-Security-Data'),
(6, 'ARAP-Zone-Access'),
(7, 'Access-Accept'),
(8, 'Access-Challenge'),
(9, 'Access-Reject'),
(10, 'Access-Request'),
(11, 'Accounting-Request'),
(12, 'Accounting-Response'),
(13, 'Acct-Authentic'),
(14, 'Acct-Delay-Time'),
(15, 'Acct-Input-Gigawords'),
(16, 'Acct-Input-Octets'),
(17, 'Acct-Input-Packets'),
(18, 'Acct-Interim-Interval'),
(19, 'Acct-Link-Count'),
(20, 'Acct-Multi-Session-Id'),
(21, 'Acct-Output-Gigawords'),
(22, 'Acct-Output-Octets'),
(23, 'Acct-Output-Packets'),
(24, 'Acct-Session-Id'),
(25, 'Acct-Session-Time'),
(26, 'Acct-Status-Type'),
(27, 'Acct-Terminate-Cause'),
(28, 'Acct-Tunnel-Connection'),
(29, 'Acct-Tunnel-Packets-Lost'),
(30, 'CHAP-Challenge'),
(31, 'CHAP-Password'),
(32, 'Callback-Id'),
(33, 'Callback-Number'),
(34, 'Called-Station-Id'),
(35, 'Calling-Station-Id'),
(36, 'Chargeable-User-Identity'),
(37, 'Class'),
(38, 'Configuration-Token'),
(39, 'Connect-Info'),
(40, 'DNS-Server-IPv6-Address'),
(41, 'DS-Lite-Tunnel-Name'),
(42, 'Delegated-IPv6-Prefix'),
(43, 'Delegated-IPv6-Prefix-Pool'),
(44, 'EAP-Message'),
(45, 'Error-Cause'),
(46, 'Event-Timestamp'),
(47, 'Extended-Type-1'),
(48, 'Extended-Type-2'),
(49, 'Extended-Type-3'),
(50, 'Extended-Type-4'),
(51, 'Extended-Vendor-Specific-1'),
(52, 'Extended-Vendor-Specific-2'),
(53, 'Extended-Vendor-Specific-3'),
(54, 'Extended-Vendor-Specific-4'),
(55, 'Extended-Vendor-Specific-5'),
(56, 'Extended-Vendor-Specific-6'),
(57, 'Filter-ID'),
(58, 'Filter-Id'),
(59, 'Framed-AppleTalk-Link'),
(60, 'Framed-AppleTalk-Network'),
(61, 'Framed-AppleTalk-Zone'),
(62, 'Framed-Compression'),
(63, 'Framed-IP-Address'),
(64, 'Framed-IP-Netmask'),
(65, 'Framed-IPX-Network'),
(66, 'Framed-IPv6-Address'),
(67, 'Framed-IPv6-Pool'),
(68, 'Framed-IPv6-Prefix'),
(69, 'Framed-IPv6-Route'),
(70, 'Framed-Interface-Id'),
(71, 'Framed-MTU'),
(72, 'Framed-Management-Protocol'),
(73, 'Framed-Pool'),
(74, 'Framed-Protocol'),
(75, 'Framed-Route'),
(76, 'Framed-Routing'),
(77, 'Idle-Timeout'),
(78, 'Login-IP-Host'),
(79, 'Login-IPv6-Host'),
(80, 'Login-LAT-Group'),
(81, 'Login-LAT-Node'),
(82, 'Login-LAT-Port'),
(83, 'Login-LAT-Service'),
(84, 'Login-Service'),
(85, 'Login-TCP-Port'),
(86, 'Long-Extended-Type-1'),
(87, 'Long-Extended-Type-2'),
(88, 'MS-ARAP-Challenge'),
(89, 'MS-ARAP-Password-Change-Reason'),
(90, 'MS-Acct-Auth-Type'),
(91, 'MS-Acct-EAP-Type'),
(92, 'MS-BAP-Usage'),
(93, 'MS-CHAP-CPW-1'),
(94, 'MS-CHAP-CPW-2'),
(95, 'MS-CHAP-Challenge'),
(96, 'MS-CHAP-Domain'),
(97, 'MS-CHAP-Error'),
(98, 'MS-CHAP-LM-Enc-PW'),
(99, 'MS-CHAP-MPPE-Keys'),
(100, 'MS-CHAP-NT-Enc-PW'),
(101, 'MS-CHAP-Response'),
(102, 'MS-CHAP2-CPW'),
(103, 'MS-CHAP2-Response'),
(104, 'MS-CHAP2-Success'),
(105, 'MS-Filter'),
(106, 'MS-Link-Drop-Time-Limit'),
(107, 'MS-Link-Utilization-Threshold'),
(108, 'MS-MPPE-Encryption-Policy'),
(109, 'MS-MPPE-Encryption-Types'),
(110, 'MS-MPPE-Recv-Key'),
(111, 'MS-MPPE-Send-Key'),
(112, 'MS-New-ARAP-Password'),
(113, 'MS-Old-ARAP-Password'),
(114, 'MS-Primary-DNS-Server'),
(115, 'MS-Primary-NBNS-Server'),
(116, 'MS-RAS-Vendor'),
(117, 'MS-RAS-Version'),
(118, 'MS-Secondary-DNS-Server'),
(119, 'MS-Secondary-NBNS-Server'),
(120, 'Management-Policy-Id'),
(121, 'Management-Privilege-Level'),
(122, 'Management-Transport-Protection'),
(123, 'Message-Authenticator'),
(124, 'Mobile-Node-Identifier'),
(125, 'NAS-IP-Address'),
(126, 'NAS-IPv6-Address'),
(127, 'NAS-Identifier'),
(128, 'NAS-Port'),
(129, 'NAS-Port-Id'),
(130, 'NAS-Port-Type'),
(131, 'PKM-AUTH-Key'),
(132, 'PKM-CA-Cert'),
(133, 'PKM-Config-Settings'),
(134, 'PKM-Cryptosuite-List'),
(135, 'PKM-SA-Descriptor'),
(136, 'PKM-SAID'),
(137, 'PKM-SS-Cert'),
(138, 'Password-Retry'),
(139, 'Port-Limit'),
(140, 'Proxy-State'),
(141, 'Reply-Message'),
(142, 'Route-IPv6-Information'),
(143, 'Service-Selection'),
(144, 'Service-Type'),
(145, 'Session-Timeout'),
(146, 'State'),
(147, 'Stateful-IPv6-Address-Pool'),
(148, 'Termination-Action'),
(149, 'Tunnel-Assignment-ID'),
(150, 'Tunnel-Client-Auth-ID'),
(151, 'Tunnel-Client-Endpoint'),
(152, 'Tunnel-Link-Reject'),
(153, 'Tunnel-Link-Start'),
(154, 'Tunnel-Link-Stop'),
(155, 'Tunnel-Medium-Type'),
(156, 'Tunnel-Password'),
(157, 'Tunnel-Preference'),
(158, 'Tunnel-Private-Group-ID'),
(159, 'Tunnel-Reject'),
(160, 'Tunnel-Server-Auth-ID'),
(161, 'Tunnel-Server-Endpoint'),
(162, 'Tunnel-Start'),
(163, 'Tunnel-Stop'),
(164, 'Tunnel-Type'),
(165, 'User-Name'),
(166, 'User-Password');

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `page` varchar(255) CHARACTER SET latin1 NOT NULL,
  `options` varchar(25) NOT NULL,
  `title` varchar(255) CHARACTER SET latin1 NOT NULL,
  `glyphicon` varchar(255) NOT NULL,
  `activeonly` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

INSERT INTO `menu` (`id`, `parent_id`, `page`, `options`, `title`, `glyphicon`, `activeonly`) VALUES
(1, 0, 'home', '', 'Home', 'glyphicon glyphicon-home', 0),
(2, 0, 'users', '', 'Users', 'glyphicon glyphicon-user', 0),
(3, 0, 'groups', '', 'Groups', 'fa fa-group', 0),
(4, 0, 'accounting', '', 'Accounting', 'glyphicon glyphicon-list', 0),
(5, 0, 'clients', '', 'Clients', 'fa fa-server', 0),
(6, 0, 'log', '', 'Log', '', 0),
(7, 2, 'users_new', '', 'New user', 'glyphicon glyphicon-plus', 0),
(8, 2, 'users_edit', '', 'Edit user', '', 1),
(9, 3, 'groups_new', '', 'New Group', 'glyphicon glyphicon-plus', 0),

(10, 3, 'groups_edit', '', 'Edit group', '', 1);

CREATE TABLE IF NOT EXISTS `serialized` (
  `name` varchar(25) NOT NULL,
  `data` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `serialized` (`name`, `data`) VALUES
('operatorlist', '["=", ":=", "==", "+=", "!=", ">", ">=", "<", "<=", "=~", "!~", "=*", "!*"]');


ALTER TABLE `dictionary`
  ADD PRIMARY KEY (`attributeid`);

ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_id` (`parent_id`);

ALTER TABLE `serialized`
  ADD PRIMARY KEY (`name`);


ALTER TABLE `dictionary`
  MODIFY `attributeid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=167;
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
