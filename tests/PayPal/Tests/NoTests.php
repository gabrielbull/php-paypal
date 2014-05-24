<?php
namespace PayPal\Tests;

use PHPUnit_Framework_TestCase;
use PayPal\Autoloader;

class AutoloaderTest extends PHPUnit_Framework_TestCase
{
    public function testRegister()
    {
        Autoloader::register();
        $this->assertContains(['PayPal\\Autoloader', 'autoload'], spl_autoload_functions());
    }

    public function testAutoload()
    {
        $declared = get_declared_classes();
        $declaredCount = count($declared);
        Autoloader::autoload('Foo');
        $this->assertEquals(
            $declaredCount,
            count(get_declared_classes()),
            'PayPal\\Autoloader::autoload() is trying to load classes outside of the PayPal namespace'
        );
        Autoloader::autoload('PayPal\\PayPal');
        $this->assertTrue(
            in_array('PayPal\\PayPal', get_declared_classes()),
            'PayPal\\Autoloader::autoload() failed to autoload the PayPal\\PayPal class'
        );
    }
}