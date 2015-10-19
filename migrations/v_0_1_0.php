<?php
/**
 *
 * Fancybox extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2015 Jeff Cocking
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace lotusjeff\fancybox\migrations;

class v_0_1_0 extends \phpbb\db\migration\migration
{
	public function effectively_installed()
	{
		return;
	}
	static public function depends_on()
	{
		return array('\phpbb\db\migration\data\v310\gold');
	}

	public function update_data()
	{
		return array(
			array('config.add', array('fancybox_button', 0)),
			array('config.add', array('fancybox_gallery', 0)),
			array('config.add', array('fancybox_small', 0)),
		);
	}
}
