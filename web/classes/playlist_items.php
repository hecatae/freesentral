<?php
/**
 * playlist_items.php
 * This file is part of the FreeSentral Project http://freesentral.com
 *
 * FreeSentral - is a Web Graphical User Interface for easy configuration of the Yate PBX software
 * Copyright (C) 2008-2009 Null Team
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301, USA.
 */
?>
<?php
require_once("framework.php");

class Playlist_Item extends Model
{
	public static function variables()
	{
		return array(
					"playlist_item_id" => new Variable("serial","!null"),
					"playlist_id" => new Variable("serial","!null","playlists",true),
					"music_on_hold_id" => new Variable("serial","!null","music_on_hold",true)
				);
	}

	function __construct()
	{
		parent::__construct();
	}
}
?>