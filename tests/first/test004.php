<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class RoutingTest extends TestCase
{   
    public function testIfConfigurationIsWorking(){
        $this->assertEquals('Routing','outing');
    }
}
?>