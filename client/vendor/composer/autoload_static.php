<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit1c1180d235a107cfa726b1570faa8e77
{
    public static $prefixesPsr0 = array (
        'C' => 
        array (
            'Curl' => 
            array (
                0 => __DIR__ . '/..' . '/curl/curl/src',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixesPsr0 = ComposerStaticInit1c1180d235a107cfa726b1570faa8e77::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
