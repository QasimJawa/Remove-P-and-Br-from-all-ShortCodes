<?php
/*
Plugin Name: Remove P and Br from all ShortCodes
Plugin URI: http://mqasim.com/
Description: Plugin will View all the available shortcodes on your Wordpress blog and remove the p and br from shortcodes
Author: M.Qasim Jawa
Author URI: http://mqasim.com/

*/
/**
 * Copyright (c) 2012 Qasim Jawa. All rights reserved.
 *
 * Released under the GPL license
 * http://www.opensource.org/licenses/gpl-license.php
 *
 * This is an add-on for WordPress
 * http://wordpress.org/
 *
 * **********************************************************************
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * **********************************************************************
 */
// if(is_admin() )
// {
    function shortcode_jawa_empty_paragraph_fix($content)
        {
        global $shortcode_tags;
        $shortcodes = array();
        foreach($shortcode_tags as $code => $function)
            {
            $shortcodes[] = $code;
            }

         //print_r($shortcodes);
        // define your shortcodes to filter, '' filters all shortcodes

        
        foreach($shortcodes as $shortcode)
            {
            $array = array(
                '<p>[' . $shortcode => '[' . $shortcode,
                '<p>[/' . $shortcode => '[/' . $shortcode,
                $shortcode . ']</p>' => $shortcode . ']',
                $shortcode . ']<br />' => $shortcode . ']'
            );
            $content = strtr($content, $array);
            }

        return $content;
        }

    add_filter('the_content', 'shortcode_jawa_empty_paragraph_fix');
