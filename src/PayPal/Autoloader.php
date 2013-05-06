<?php

/**
 * A PHP class to make it easy to interact with PayPal, especially Website Payments Pro.
 *
 * Initial code for Get, Create and Update Recurring Payment Profiles methods available thanks to Bill Joslin (billjoslin.com).
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 * @package        paypal
 * @author        Drew Johnston
 * @copyright    2007-2013 Drew Johnston
 * @license        http://www.apache.org/licenses/LICENSE-2.
 * @link        http://drewjoh.com/wiki/code/classes/phppaypal
 * @since        Version 0.10
 */

namespace PayPal;

/**
 * Autoloads PayPal classes
 *
 * @package paypal
 */
class Autoloader
{
    /**
     * Register the autoloader
     */
    static public function register()
    {
        spl_autoload_register(array(new self, 'autoload'));
    }

    /**
     * Autoloader
     *
     * @param   string
     */
    static public function autoload($class)
    {
        if (0 !== strpos($class, 'PayPal\\')) {
            return;
        } else if (file_exists($file = dirname(__FILE__) . '/' . preg_replace('{^PayPal\\\}', '', $class) . '.php')) {
            require $file;
        }
    }
}
