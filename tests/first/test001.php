<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class ControllerTest extends TestCase
{   
    public function testAddition () 
    {
        $a = 1;
        $b = 2;
        $c = 3;
        // unsere test Funktion
        $this->assertEquals(3,$c);
    }

    public function testThrowingException () 
    {
        $this->expectException(InvalidArgumentException::Class);
        throw new invalidArgumentException("JUst an Exception test");
    }
}
?>