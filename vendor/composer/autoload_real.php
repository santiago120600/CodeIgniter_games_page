<?php

// autoload_real.php @generated by Composer

<<<<<<< HEAD
class ComposerAutoloaderInita39e7898ea265fff66cf4d5bdb46e7f1
=======
class ComposerAutoloaderInit004dffc54c3d5f68487ad7cd53556a5a
>>>>>>> user_lim
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

<<<<<<< HEAD
        spl_autoload_register(array('ComposerAutoloaderInita39e7898ea265fff66cf4d5bdb46e7f1', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader();
        spl_autoload_unregister(array('ComposerAutoloaderInita39e7898ea265fff66cf4d5bdb46e7f1', 'loadClassLoader'));
=======
        spl_autoload_register(array('ComposerAutoloaderInit004dffc54c3d5f68487ad7cd53556a5a', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader();
        spl_autoload_unregister(array('ComposerAutoloaderInit004dffc54c3d5f68487ad7cd53556a5a', 'loadClassLoader'));
>>>>>>> user_lim

        $useStaticLoader = PHP_VERSION_ID >= 50600 && !defined('HHVM_VERSION') && (!function_exists('zend_loader_file_encoded') || !zend_loader_file_encoded());
        if ($useStaticLoader) {
            require_once __DIR__ . '/autoload_static.php';

<<<<<<< HEAD
            call_user_func(\Composer\Autoload\ComposerStaticInita39e7898ea265fff66cf4d5bdb46e7f1::getInitializer($loader));
=======
            call_user_func(\Composer\Autoload\ComposerStaticInit004dffc54c3d5f68487ad7cd53556a5a::getInitializer($loader));
>>>>>>> user_lim
        } else {
            $map = require __DIR__ . '/autoload_namespaces.php';
            foreach ($map as $namespace => $path) {
                $loader->set($namespace, $path);
            }

            $map = require __DIR__ . '/autoload_psr4.php';
            foreach ($map as $namespace => $path) {
                $loader->setPsr4($namespace, $path);
            }

            $classMap = require __DIR__ . '/autoload_classmap.php';
            if ($classMap) {
                $loader->addClassMap($classMap);
            }
        }

        $loader->register(true);

        if ($useStaticLoader) {
<<<<<<< HEAD
            $includeFiles = Composer\Autoload\ComposerStaticInita39e7898ea265fff66cf4d5bdb46e7f1::$files;
=======
            $includeFiles = Composer\Autoload\ComposerStaticInit004dffc54c3d5f68487ad7cd53556a5a::$files;
>>>>>>> user_lim
        } else {
            $includeFiles = require __DIR__ . '/autoload_files.php';
        }
        foreach ($includeFiles as $fileIdentifier => $file) {
<<<<<<< HEAD
            composerRequirea39e7898ea265fff66cf4d5bdb46e7f1($fileIdentifier, $file);
=======
            composerRequire004dffc54c3d5f68487ad7cd53556a5a($fileIdentifier, $file);
>>>>>>> user_lim
        }

        return $loader;
    }
}

<<<<<<< HEAD
function composerRequirea39e7898ea265fff66cf4d5bdb46e7f1($fileIdentifier, $file)
=======
function composerRequire004dffc54c3d5f68487ad7cd53556a5a($fileIdentifier, $file)
>>>>>>> user_lim
{
    if (empty($GLOBALS['__composer_autoload_files'][$fileIdentifier])) {
        require $file;

        $GLOBALS['__composer_autoload_files'][$fileIdentifier] = true;
    }
}
