<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd71b6d8bb902009316e3832fe62a8415
{
    public static $prefixLengthsPsr4 = array (
        'D' => 
        array (
            'Daryakenari\\Argus\\' => 18,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Daryakenari\\Argus\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd71b6d8bb902009316e3832fe62a8415::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd71b6d8bb902009316e3832fe62a8415::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitd71b6d8bb902009316e3832fe62a8415::$classMap;

        }, null, ClassLoader::class);
    }
}
