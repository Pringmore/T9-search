<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class ConfigurationTest extends TestCase
{   
    public function testIfConfigurationIsWorking(){
        $this->assertEquals('Config','config');
    }
}
?>