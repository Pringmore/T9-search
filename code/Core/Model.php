<?php
include_once ('Core/Database.php');

/**
 * Manages the interactions required for the T9 Search 
 *
 * @author    Pringmore <lakehal.company@gmail.com>
 * @package   LEMP_T9-Search
 */
class Model extends Database
{   
    /**
	 * Generate dynamically a search expression.
	 *
	 * @access public
	 * @param  string    $data  The input that the user entered into the search field
	 * @return string    $Exp is the dynamically generated exp. used to search for entities
	 */
    public function generateExp($data) 
    {   
        /**
         * The expression that we will use to match between input and DB entities starting with $data value.
         *
         * @var    string
         */
        $Exp = $data . "%";
                
        return $Exp;
    }

    /**
	 * Handles the the transformation of the user input into query into an output.
     * with a public function we can have access to some other private functions
     *
	 * @access public
	 * @param  string         $input  The data that the user entered into the search field
	 * @return \PDOStatement  $_stmt  is the statement which contains the search results
	 */ 
    public function prepare($input) 
    {   
        $sql = "SELECT vorname, nachname From Contacts WHERE VornameWert LIKE :ExpOne OR NachnameWert LIKE :ExpTwo";
        $Exp = $this->generateExp($input);
        $result = $this->run($sql, $Exp);
       
        return $this->_stmt;
    }
} 