<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit05c101e73c77c491592789ae180936e2
{
    public static $files = array (
        '85f1d3ec6180e88ce6417c9c99a6acc8' => __DIR__ . '/..' . '/vrana/jsshrink/jsShrink.js',
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit05c101e73c77c491592789ae180936e2::$classMap;

        }, null, ClassLoader::class);
    }
}
