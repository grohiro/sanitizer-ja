<?php
namespace Grohiro\Sanitizer;

use PHPUnit\Framework\TestCase;

class TypeConvertTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    public function testStrBoolean()
    {
        $t = new TypeConvert();

        $this->assertFalse($t->boolean('f'));
        $this->assertFalse($t->boolean('false'));
        $this->assertFalse($t->boolean('FALSE'));
        $this->assertFalse($t->boolean('False'));
        $this->assertFalse($t->boolean('NO'));
        $this->assertFalse($t->boolean('No'));
        $this->assertFalse($t->boolean('no'));
        $this->assertFalse($t->boolean(''));
        $this->assertFalse($t->boolean('null'));
        $this->assertFalse($t->boolean('NULL'));
        $this->assertFalse($t->boolean('Null'));
        $this->assertFalse($t->boolean(null));
        $this->assertFalse($t->boolean('0'));
        $this->assertFalse($t->boolean(0));

        $this->assertTrue($t->boolean('true'));
        $this->assertTrue($t->boolean('t'));
        $this->assertTrue($t->boolean('TRUE'));
        $this->assertTrue($t->boolean('True'));
        $this->assertTrue($t->boolean('OK'));
        $this->assertTrue($t->boolean('Ok'));
        $this->assertTrue($t->boolean('ok'));
        $this->assertTrue($t->boolean('1'));
        $this->assertTrue($t->boolean(1));
        $this->assertTrue($t->boolean('string'));
    }
}
