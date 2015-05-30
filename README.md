RadiusAdmin
===========
A FreeRADIUS webinterface

RadiusAdmin is a project of mine, with the intention of being a webinterface for FreeRADIUS (mainly for user/group management). RadiusAdmin is written in PHP and works by manipulating FreeRADIUS' SQL database. Naturally, this requires that you use the rlm_sql module for authorization and/or accounting.

FreeRADIUS' database consists of the following tables:

- radcheck
- radreply
- radgroupcheck
- radgroupreply
- radusergroup

In rlm_sql, the tables mentioned above are analogous to the *users* file in [rlm_files](http://freeradius.org/radiusd/man/rlm_files.html).

In addition, the rlm_sql schema includes some other tables:

- nas
- radacct
- radpostauth

These tables are meant for client (nas) management, accounting and post-authentication logging respectively. RadiusAdmin provides a frontend (in the case of accounting and post-auth, mostly statistics and reports) for these functions too. Of course, the again calls for the use of rlm_sql in those sections of FreeRADIUS config. For more info, please see [rlm_sql's documentation](http://wiki.freeradius.org/modules/Rlm_sql).

RadiusAdmin doesn't augment or replace FreeRADIUS' default SQL schema: it just needs access to the existing database and uses another database for RadiusAdmin's own data storage needs. This is done not to pollute FreeRADIUS' database with RadiusAdmin's own stuff.

### (Planned) Features
- Add, remove and edit users and groups
- Manage user-group relations
- Manage every user's or group's check and reply attributes
- Manage clients (nasses)
- Show statistics and graphs about accounting and post-auth data

### Development status
Currently, RadiusAdmin is in a very early stage. Most features are not done yet, and it is thus not ready for use.

### Used tools and libraries
RadiusAdmin uses the following server-side tools, languages and libraries:

- Primary language: PHP
- Database access layer: PDO
- Templating engine: Smarty

In addition, RadiusAdmin also uses the following front-end frameworks:

- Javascript library: jQuery
- Front-end framework: Bootstrap
- Bootstrap theme: Bootswatch Flatly
- Icon packs: Glyphicons and Font Awesome

### Screenshots

![](https://host.tuxplace.nl/screenshots/2015-04-27-23-04-42.png)
![](https://host.tuxplace.nl/screenshots/2015-04-29-23-42-29.png)
![](https://host.tuxplace.nl/screenshots/2015-04-29-23-42-45.png)
![](https://host.tuxplace.nl/screenshots/2015-04-29-23-43-21.png)

### Installation

#### Requirements
The development target for RadiusAdmin is PHP 5.6, but it will probably work on older PHP versions > 5.3 too.

#### Databases
RadiusAdmin needs access to 2 databases: FreeRADIUS' database and RadiusAdmin's own database. These two database don't necessarily have to reside on the same server, although the example config file assumes they do.

The schema for FreeRADIUS' database can be found in _raddb/mods-config/sql/main/*/schema.sql_. RadiusAdmin's schema is *radiusadmin.sql* and should be in this directory.

RadiusAdmin is made with MySQL in mind, but can probably work with other RDBMSs as well by editing *public_html/include/db.php*.

#### Instructions
Download a stable release or clone the development branch (bleeding edge!). You only need to extract the contents of the *public_html* folder to the docroot. Create a database and user for RadiusAdmin and import the SQL file. Copy *public_html/config.php.example* to *config.php* and edit the file to reflect your database settings.

