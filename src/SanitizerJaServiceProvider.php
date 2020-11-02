<?php
namespace Grohiro\Sanitizer;

use Illuminate\Support\ServiceProvider;

class SanitizerJaServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function boot()
    {
        $filters = [
            'zenkakuKana',
            'ja',
            'hankakuSp',
            'keywords',
        ];

        $sanitizerJa = new SanitizerJa();
        foreach ($filters as $name) {
            \Sanitizer::extend($name, \Closure::fromCallable([$sanitizerJa, $name]));
        }

        $filters = [
            'date',
            'boolean',
        ];

        $typeConvert = new TypeConvert();
        foreach ($filters as $name) {
            \Sanitizer::extend($name, \Closure::fromCallable([$typeConvert, $name]));
        }
    }
}
