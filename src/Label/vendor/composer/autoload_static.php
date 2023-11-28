<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6ef2b7bf933fafec62d6bf7c15d6f12f
{
    public static $prefixLengthsPsr4 = array (
        'D' => 
        array (
            'Ds\\' => 3,
        ),
        'A' => 
        array (
            'AsciiTable\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Ds\\' => 
        array (
            0 => __DIR__ . '/..' . '/php-ds/php-ds/src',
        ),
        'AsciiTable\\' => 
        array (
            0 => __DIR__ . '/..' . '/malios/php-to-ascii-table/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit6ef2b7bf933fafec62d6bf7c15d6f12f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit6ef2b7bf933fafec62d6bf7c15d6f12f::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit6ef2b7bf933fafec62d6bf7c15d6f12f::$classMap;

        }, null, ClassLoader::class);
    }
}
