<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit1befdc31c1570c5b86f86cf101506493
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit1befdc31c1570c5b86f86cf101506493::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit1befdc31c1570c5b86f86cf101506493::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit1befdc31c1570c5b86f86cf101506493::$classMap;

        }, null, ClassLoader::class);
    }
}
