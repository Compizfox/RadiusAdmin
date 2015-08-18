{*
    Filename:   users_edit.tpl
    Date:       2015-05-31
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

{extends file="abstract/radentity_edit.tpl"}

{block name=title}RadiusAdmin - Edit user{/block}
{block name=pagename}Edit user {$entity->name}{/block}

{block name=formaction}index.php?page=users_edit{/block}
{block name=label1}Groups user is member of (top is highest priority){/block}
{block name=label2}Add groups{/block}
