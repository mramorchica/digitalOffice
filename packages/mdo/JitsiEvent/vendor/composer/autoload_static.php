<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitda1a43a8aa77693f03b94939390be7e6
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Mdo\\JitsiEvent\\' => 15,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Mdo\\JitsiEvent\\' => 
        array (
            0 => __DIR__ . '/../..' . '/packages/mdo/JitsiEvent/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitda1a43a8aa77693f03b94939390be7e6::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitda1a43a8aa77693f03b94939390be7e6::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
