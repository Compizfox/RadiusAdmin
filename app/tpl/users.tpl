{*
    Filename:   users.tpl
    Date:       2015-05-30
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
*}

{extends file="abstract/radentities.tpl"}

{block name=title}RadiusAdmin - Users{/block}
{block name=pagename}Users list{/block}

{block name=tableheaders}
	<th>Username</th>
	<th>Groupname</th>
{/block}

{block name=body prepend}
	{assign "linkpage" "users_edit"}
{/block}