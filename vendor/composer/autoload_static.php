<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd4d89aefee0549e27dc0c67f3ac71ae9
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'AhmadAldali\\FilesHelper\\' => 24,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'AhmadAldali\\FilesHelper\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitd4d89aefee0549e27dc0c67f3ac71ae9::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd4d89aefee0549e27dc0c67f3ac71ae9::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitd4d89aefee0549e27dc0c67f3ac71ae9::$classMap;

        }, null, ClassLoader::class);
    }
}