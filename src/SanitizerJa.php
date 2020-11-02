<?php
namespace Grohiro\Sanitizer;

/**
 * Sanitizer Ja
 */
class SanitizerJa
{
    /** @var string $encoding Input encoding */
    private $encoding;

    public function __construct($encoding = null)
    {
        $this->encoding = $encoding ?: mb_internal_encoding();
    }

    /**
     * 半角カタカナを全角に変換
     */
    public function zenkakuKana($value)
    {
        return mb_convert_kana($value, 'KV', $this->encoding);
    }

    /**
     * ひらがな／カタカナ以外を半角に変換
     */
    public function ja($value)
    {
        return mb_convert_kana($value, 'KVsa', $this->encoding);
    }

    /**
     * 全角スペースを半角に変換
     */
    public function hankakuSp($value)
    {
        return mb_convert_kana($value, 's', $this->encoding);
    }

    /**
     * 半角区切り文字列を配列に変換
     */
    public function keywords($value)
    {
        $str = trim($this->hankakuSp($value));
        $str = preg_replace('/\s+/', ' ', $str);
        return explode(' ', $str);
    }
}
