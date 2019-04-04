<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class ControllerTest extends TestCase
{   
    public function testThrowingException () 
    {
        $this->expectException(InvalidArgumentException::Class);
        throw new invalidArgumentException("Just an Exception test");
    }
}
?>