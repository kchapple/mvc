<?php

namespace Ken\Framework;

/**
 * Abstract model implementation with some default behavior such
 * as ability to push args into members and convert object to JSON
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

abstract class AbstractModel
{
    public function __construct( $args = null )
    {
        if ( is_array( $args ) ) {
            foreach ( $args as $arg => $value ) {
                $member = $arg;
                $this->{$member} = $value;
            }
        }
    }
    
    public function toArray()
    {
        return get_object_vars( $this );
    }
    
    public function toJson()
    {
        $vars = $this->toArray();
        return json_encode( $vars );
    }
    
    public function methodsToArray()
    {
        $reflection = new \ReflectionClass( get_class( $this ) );
        $methods = $reflection->getMethods( \ReflectionMethod::IS_PUBLIC );
        
        $data = array();
        foreach ( $methods as $method ) {
            $methodName = $method->getName();
            if ( strpos( $methodName, "get" ) === 0 ) {
                $property = str_replace( "get", "", $methodName );
                $data[$property] = $this->{$methodName}();
            }
            
        }
         
        return $data;
    }
    
    public function methodsToJson()
    {
        return json_encode( $this->methodsToArray() );
    }
}

