<?php
/* SVN FILE: $Id$ */
/**
 * Short description for file.
 *
 * Long description for file
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) Tests <https://trac.cakephp.org/wiki/Developement/TestSuite>
 * Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 *  Licensed under The Open Group Test Suite License
 *  Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          https://trac.cakephp.org/wiki/Developement/TestSuite CakePHP(tm) Tests
 * @package       cake
 * @subpackage    cake.tests.fixtures
 * @since         CakePHP(tm) v 1.2.0.4667
 * @version       $Revision: 18 $
 * @modifiedby    $LastChangedBy: root $
 * @lastmodified  $Date$
 * @license       http://www.opensource.org/licenses/opengroup.php The Open Group Test Suite License
 */
/**
 * Short description for class.
 *
 * @package       cake
 * @subpackage    cake.tests.fixtures
 */
class MessageFixture extends CakeTestFixture {
/**
 * name property
 *
 * @var string 'Message'
 * @access public
 */
	var $name = 'Message';
/**
 * fields property
 *
 * @var array
 * @access public
 */
	var $fields = array(
		'id' => array('type' => 'integer', 'key' => 'primary'),
		'thread_id' => array('type' => 'integer', 'null' => false),
		'name' => array('type' => 'string', 'null' => false)
	);
/**
 * records property
 *
 * @var array
 * @access public
 */
	var $records = array(
		array('thread_id' => 1, 'name' => 'Thread 1, Message 1'),
		array('thread_id' => 2, 'name' => 'Thread 2, Message 1'),
		array('thread_id' => 3, 'name' => 'Thread 3, Message 1')
	);
}
?>