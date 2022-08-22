<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitd71b6d8bb902009316e3832fe62a8415
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInitd71b6d8bb902009316e3832fe62a8415', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitd71b6d8bb902009316e3832fe62a8415', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitd71b6d8bb902009316e3832fe62a8415::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
