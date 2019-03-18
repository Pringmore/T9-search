<?php
include_once ('Core/Controller.php');
include_once ('Core/Model.php');

/**
 * Home Controller 
 *
 * @author    Pringmore <lakehal.company@gmail.com>
 * @package   LEMP_T9-Search
 */
class Home extends Controller 
{   
	/**
	 * Redirect the app to the Home View
	 *
	 * @access public
	 */ 
    public function index()
	{
		require_once('Views/home/index.php');
	}

	/**
	 * Call the right Model in order to take care of data manipulation regarding the search process
	 *
	 * @access public
	 * @param  string    $input The data entered by user into the search field.
	 */
	public function search($input)
	{	
		$this->_stmt = $this->model->prepare($input);
		$this->index();
	}
}