<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use PHPUnit\DbUnit\TestCaseTrait;

final class ConfigurationTest extends TestCase
{   
    use TestCaseTrait;

    // only instantiate pdo once for test clean-up/fixture load
    static private $pdo = null;

    // only instantiate PHPUnit_Extensions_Database_DB_IDatabaseConnection once per test
    private $conn = null;

    /**
     * @return PHPUnit_Extensions_Database_DB_IDatabaseConnection
     */
    public function getConnection()
    {
        if ($this->conn === null) 
        {
            if (self::$pdo == null) 
            {
                self::$pdo = new PDO( $GLOBALS['DB_DSN'], $GLOBALS['DB_USER'], $GLOBALS['DB_PASSWD'] );
            }
            $this->conn = $this->createDefaultDBConnection(self::$pdo, $GLOBALS['DB_DBNAME']);
        }

        return $this->conn;
    }

    /**
     * @return PHPUnit_Extensions_Database_DataSet_IDataSet
     */
    public function getDataSet()
    {   
        return $this->createXMLDataSet(dirname(__FILE__).'/_files/contacts-seed.xml');
    }

    public function testIfTableHasRightCollumns(){
        
        $resultingTable = $this->getConnection()->createQueryTable('Contacts','SELECT * FROM Contacts');
        $expectedTable = $this->getDataSet()->getTable('Contacts');
        $this->assertTablesEqual($expectedTable, $resultingTable);         
    }

    public function testIfTableHasRightNumberOfInitialRows() {

        $rowsNumber = $this->getConnection()->getRowCount('Contacts');
        $this->assertEquals(4, $rowsNumber);
    }   

    public function testIfTableColumnsTypesValuesAreAsExpected() { 
        
        $resultingTable = $this->getConnection()->createQueryTable('Element','SELECT id, Vorname, Nachname, VornameWert, NachnameWert FROM Contacts ORDER BY id asc limit 1');
        $this->assertEquals($resultingTable->getRow(0), array( 
            'id' => 0 , 
            'Vorname' => 'Otto', 
            'Nachname' => 'Moritz',
            'VornameWert' => '6886',
            'NachnameWert' => '667489'));
    }
}
?>