<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd0cf9c6aebcbc066d6702d1cabe5fc6b
{
    public static $fallbackDirsPsr4 = array (
        0 => __DIR__ . '/..' . '/league/color-extractor/src',
    );

    public static $prefixesPsr0 = array (
        'c' => 
        array (
            'claviska' => 
            array (
                0 => __DIR__ . '/..' . '/claviska/simpleimage/src',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->fallbackDirsPsr4 = ComposerStaticInitd0cf9c6aebcbc066d6702d1cabe5fc6b::$fallbackDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInitd0cf9c6aebcbc066d6702d1cabe5fc6b::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
