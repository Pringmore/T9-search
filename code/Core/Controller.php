<?php
include_once( dirname(__FILE__) . "/Model.php");

/**
 * Base Controller 
 *
 * @author    Pringmore <lakehal.company@gmail.com>
 * @package   LEMP_T9-Search
 */
class Controller 
{	
	/**
     * To be able to manipulate data.
     *
     * @access public
     * @var    Model
     */
	public $model;
	
	/**
	 * The query that we have run.
	 *
	 * @access protected
	 * @var    PDOStatement
	 */
	protected $_stmt;

	/**
	 * To be used in case to display or not the error message on the View
	 *
	 * @access protected 
	 * @var    boolean
	 */
	public $_error_input = false;

	public function __construct()  
    {  
		$this->model = new Model();
	} 

	/**
	 * Check and validate the entered value we get from the search field
	 *
	 * @access public
	 * @param  string    $data The Input entered by user into the search field.
	 * @return boolean
	 */
	public function cleanInput($data)
	{ 
		if (preg_match('/^[2-9]+$/', $data)) {
			$this->_error_input = false;
			return true;
		} else {
			$this->_error_input = true;
			return false;
		}
	}
}