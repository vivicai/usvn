<?php
/**
 * Display group homepage.
 *
 * @author Team USVN <contact@usvn.info>
 * @link http://www.usvn.info
 * @license http://www.cecill.info/licences/Licence_CeCILL_V2-en.txt CeCILL V2
 * @copyright Copyright 2007, Team USVN
 * @since 0.7
 * @package usvn
 * @subpackage group
 *
 * This software has been written at EPITECH <http://www.epitech.net>
 * EPITECH, European Institute of Technology, Paris - FRANCE -
 * This project has been realised as part of
 * end of studies project.
 *
 * $Id$
 */

class GroupController extends USVN_Controller
{
	/**
     * Pre-dispatch routines
     *
     * Called before action method. If using class with
     * {@link Zend_Controller_Front}, it may modify the
     * {@link $_request Request object} and reset its dispatched flag in order
     * to skip processing the current action.
     *
     * @return void
     */
	public function preDispatch()
	{
		parent::preDispatch();

		$group = $this->getRequest()->getParam('group');
		$table = new USVN_Db_Table_Groups();
		$group = $table->fetchRow(array("groups_name = ?" => $group));

		$this->_group = $group;
	}

	/**
	 * Group row object
	 *
	 * @var USVN_Db_Table_Row_Group
	 */
	protected $_group;

	public function indexAction()
	{
		$this->view->group = $this->_group;
	}
}
