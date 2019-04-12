<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use PHPUnit\DbUnit\TestCaseTrait;

final class ConfigurationTest extends TestCase
{   
    use TestCaseTrait;

    public function testIfConfigurationIsWorking(){
        
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @return PHPUnit_Extensions_Database_DB_IDatabaseConnection
     */
    public function getConnection()
    {
        // Get the connection details
        $servername = "mariaDB";
        $username = "root";
        $password = "654321";
        $bdname = "t9_search";
          
        // Connect to the database
        $pdo = new PDO("mysql:host=$servername;dbname=$bdname", $username, $password);
        return $this->createDefaultDBConnection($pdo, "t9_search");
    }

    /**
     * @return PHPUnit_Extensions_Database_DataSet_IDataSet
     */
    public function getDataSet()
    {
        return $this->createFlatXMLDataSet(dirname(__FILE__).'/_files/guestbook-seed.xml');
    }
}
?>