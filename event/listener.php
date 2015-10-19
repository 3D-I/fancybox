<?php
/**
 *
 * Fancybox extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2015 Jeff Cocking
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace lotusjeff\fancybox\event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Event listener
 */
class listener implements EventSubscriberInterface
{
	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\template\template */
	protected $template;

	/** @var \phpbb\user */
	protected $user;

	/**
	 * Constructor
	 *
	 * @param \phpbb\config\config        $config             Config object
	 * @param \phpbb\template\template    $template           Template object
	 * @param \phpbb\user                 $user               User object
	 * @access public
	 */
	public function __construct(\phpbb\config\config $config, \phpbb\template\template $template, \phpbb\user $user)
	{
		$this->config = $config;
		$this->template = $template;
		$this->user = $user;
	}

	/**
	 * Assign functions defined in this class to event listeners in the core
	 *
	 * @return array
	 * @static
	 * @access public
	 */
	static public function getSubscribedEvents()
	{
		return array(
			'core.page_header'					=> 'set_fancybox_tpl_data',
			'core.acp_board_config_edit_add'	=> 'add_fancybox_acp_config',
		);
	}

	/**
	 * Set Fancybox template data
	 *
	 * @return null
	 * @access public
	 */
	public function set_fancybox_tpl_data()
	{
		$this->template->assign_vars(array(
			'S_FANCYBOX_BUTTON'	=> (int) $this->config['fancybox_button'],
			'S_FANCYBOX_GALLERY'	=> (int) $this->config['fancybox_gallery'],
			'S_FANCYBOX_SMALL'	=> (int) $this->config['fancybox_small'],
		));
	}

	/**
	 * Add Fancybox settings to the ACP
	 *
	 * @param object $event The event object
	 * @return null
	 * @access public
	 */
	public function add_fancybox_acp_config($event)
	{
		if ($event['mode'] == 'post' && isset($event['display_vars']['vars']['legend3']))
		{
			$this->user->add_lang_ext('lotusjeff/fancybox', 'fancybox');
			$display_vars = $event['display_vars'];

			$my_config_vars = array(
				'legend_fancybox'		=> 'FANCYBOX_SETTINGS',
				'fancybox_button'	=> array('lang' => 'FANCYBOX_BUTTON', 'validate' => 'bool', 'type' => 'radio:yes_no', 'explain' => true),
				'fancybox_gallery'		=> array('lang' => 'FANCYBOX_GALLERY', 'validate' => 'bool', 'type' => 'radio:yes_no', 'explain' => true),
				'fancybox_small'	=> array('lang' => 'FANCYBOX_SMALL', 'validate' => 'bool', 'type' => 'radio:yes_no', 'explain' => true),
			);

			$display_vars['vars'] = phpbb_insert_config_array($display_vars['vars'], $my_config_vars, array('before' => 'legend3'));

			$event['display_vars'] = $display_vars;
		}
	}
}
