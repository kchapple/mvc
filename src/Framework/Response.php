<?php

namespace Ken\Framework;

/**
 * Response represents a (usually) JSON response back to client
 *
 * Copyright (C) 2013 Ken Chapple
 *
 * LICENSE: This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 3
 * of the License, or (at your option) any later version.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://opensource.org/licenses/gpl-license.php>;.
 *
 * @package Ken\Framework
 * @author  Ken Chapple
 * @link    http://kchaps.com
 **/

class Response extends AbstractModel
{
    public $status = null;
    public $message = null;

    public function __construct( $status, $message )
    {
        $this->status = $status;
        $this->message = $message;
    }
}
