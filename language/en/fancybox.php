<?php
/**
 *
 * Fancybox extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2015 Jeff Cocking
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

/**
 * DO NOT CHANGE
 */
if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

$lang = array_merge($lang, array(
	'FANCYBOX_SETTINGS'				=> 'Fancybox Extension Configurations',
	'FANCYBOX_BUTTON'				=> 'Additional control panel',
	'FANCYBOX_BUTTON_EXPLAIN'		=> 'An additional control panel appears above the Fancybox images. Allows automated slide shows.',
	'FANCYBOX_GALLERY'				=> 'View thumbnails',
	'FANCYBOX_GALLERY_EXPLAIN'		=> 'Shows a thumbnail image of all images in the Fancybox gallery below the image. User can select specific images.',
	'FANCYBOX_SMALL'				=> 'Include non-thumbnail images in gallery',
	'FANCYBOX_SMALL_EXPLAIN'		=> 'Turns on Fancybox for images that do not have thumbnails.  Supports phpBB if thumbnails are turned off.',
));
