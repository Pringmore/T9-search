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
	 * Generate dynamically a regular expression.
	 *
	 * @access public
	 * @param  string    $data  The input that the user entered into the search field
	 * @return string    $regExp is the dynamically generated regular exp. used to search for entities
	 */
    public function generateRegExp($data) 
    {   
        /**
         * The regular expression that we will use to match between input and DB entities.
         *
         * @var    string
         */
        $regExp = "^";
        
        $array = str_split($data);
        foreach ( $array as $character )
        {
            switch ($character) {
                case '2':
                    $regExp = $regExp ."(A|B|C|a|b|c)";
                    break;
                case '3':
                    $regExp = $regExp ."(D|E|F|d|e|f)";
                    break;
                case '4':
                    $regExp = $regExp ."(G|H|I|g|h|i)";
                    break;
                case '5':
                    $regExp = $regExp ."(J|K|L|j|k|l)";
                    break;
                case '6':
                    $regExp = $regExp ."(M|N|O|m|n|o)";
                    break;
                case '7':
                    $regExp = $regExp ."(P|Q|R|S|p|q|r|s)";   
                    break;
                case '8':
                    $regExp = $regExp ."(T|U|V|t|u|v)";
                    break;
                case '9':
                    $regExp = $regExp ."(W|X|Y|Z|w|x|y|z)";
                    break; 
            }
        }
        
        return $regExp;
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
        $sql = "SELECT vorname, nachname From Contacts WHERE vorname REGEXP :regExpOne OR nachname REGEXP :regExpTwo";
        $regExp = $this->generateRegExp($input);
        $result = $this->run($sql, $regExp);
       
        return $this->_stmt;
    }
} 