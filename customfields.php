<?php
/**
 * @copyright	Copyright (c) 2016 R2H B.V. (http://www.r2h.nl). All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

// no direct access
defined('_JEXEC') or die;

jimport('joomla.plugin.plugin');

/**
 * Content - Customfields Plugin
 *
 * @package		Joomla.Plugin
 * @subpakage	R2HB.V..Customfields
 */
class PlgContentCustomfields extends JPlugin {

	protected $autoloadLanguage = true;
	
	function onContentPrepareForm($form, $data) {
		$app = JFactory::getApplication();
		$option = $app->input->get('option');
		switch($option) {
			case 'com_content':
				if ($app->isAdmin()) {
					JForm::addFormPath(__DIR__ . '/forms');
					$form->loadFile('fields', false);
				}
				return true;
		}
		return true;
	}
}