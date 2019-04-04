<?php

/**
 * Manages the interactions with the DB 
 *
 * @author    Pringmore <lakehal.company@gmail.com>
 * @package   LEMP_T9-Search
 */
class Database 
{
    /**
     * The connection to the database.
     *
     * @access protected
     * @var    PDO
     */
	protected $_conn;

	/**
	 * The query that we can run and check later to see the result of the query.
	 *
	 * @access protected
	 * @var    PDOStatement
	 */
    protected $_stmt;
    
    /**
	 * Connect to the database with the suitable credentials.
	 *
	 * @access private
	 */
    private function connect() 
    {
		
        // Get the connection details
        $servername = "mariaDB";
        $username = "root";
        $password = "654321";
        $bdname = "t9_search";

        try 
            {   
                // Connect to the database
                $this->_conn = new PDO("mysql:host=$servername;dbname=$bdname", $username, $password);
                // To be sure the statement and the values are parsed after sending them to the MySQL server
                $this->_conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
                // set the PDO error mode to exception
                $this->_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
        catch(PDOException $e)
            {   
                echo $e->getMessage();
            }
    }
    
    /**
	 * Check for the DB connection first. Prepare and bind later the prepared statements with its 
     * values and then execute it.
	 *
	 * @access protected
	 * @param  string    $sql   The SQL statement to run.
	 * @param  string    $reset Whether we should reset the model data.
	 * @return boolean
	 */
    protected function run($sql, $Exp) 
    {
        // If we do not have a connection then establish it!
        if (!$this->_conn) 
        {
            $this->connect();
        }
        
        // If connection is establish then we should: prepare + execute + return data        
        $this->_stmt = $this->_conn->prepare($sql);        
        $this->_stmt->bindParam(':ExpOne', $Exp);
        $this->_stmt->bindParam(':ExpTwo', $Exp);
        
        $result = $this->_stmt->execute();        
            
		return $result;
    }
}