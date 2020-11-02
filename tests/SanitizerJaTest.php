<?php
namespace Grohiro\Sanitizer;

use PHPUnit\Framework\TestCase;

class SanitizerJaTest extends TestCase
{
    public static $str = '亜あアｱＡAａa０0　 ';

    public function setUp(): void
    {
        parent::setUp();
    }

    public function testJa()
    {
        $sanitizer = new SanitizerJa();

        $this->assertEquals('亜あアアAAaa00  ', $sanitizer->ja(static::$str));
    }

    public function testZenkakuKana()
    {
        $sanitizer = new SanitizerJa();

        $this->assertEquals('亜あアアＡAａa０0　 ', $sanitizer->zenkakuKana(static::$str));
    }

    public function testHankakuSp()
    {
        $sanitizer = new SanitizerJa();

        $this->assertEquals('亜あアｱＡAａa０0  ', $sanitizer->hankakuSp(static::$str));
    }

    public function testKeywords()
    {
        $sanitizer = new SanitizerJa();

        $text = ' sanitizer   two spaces  PHP phpunit 日本語 キーワード　　検索　  　';

        $keywords = $sanitizer->keywords($text);

        $this->assertEquals([
            'sanitizer',
            'two',
            'spaces',
            'PHP',
            'phpunit',
            '日本語',
            'キーワード',
            '検索',
        ], $keywords);
    }

    public function testMultipleFilter()
    {
        $sanitizer = new SanitizerJa();

        $text = ' ＳＡＮＩＴＩＺＥＲ sanitizer   two spaces  ２０２０ PHP  日本語 キーﾜｰﾄﾞ　　検索　  　';

        $keywords = $sanitizer->keywords(
            $sanitizer->ja($text)
        );

        $this->assertEquals([
            'SANITIZER',
            'sanitizer',
            'two',
            'spaces',
            '2020',
            'PHP',
            '日本語',
            'キーワード',
            '検索',
        ], $keywords);
        
    }
}
