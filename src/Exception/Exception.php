<?php
/**
 * This is a general Exception class.
 *
 * @package    App\Service
 * @subpackage
 * @author
 */
namespace App\Exception;

class Exception extends \Exception
{
    public function __construct($message)
    {
        $this->message = $message;
    }
}
