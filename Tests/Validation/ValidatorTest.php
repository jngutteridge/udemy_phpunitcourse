<?php

namespace Acme\Test;

use Acme\Http\Request;
use Acme\Http\Response;
use Acme\Validation\Validator;

class ValidatorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function isValidReturnsTrue()
    {
        $request = new Request([]);
        $response = new Response($request);
        $validator = new Validator($request, $response);

        $validator->setIsValid(true);
        $this->assertTrue($validator->getIsValid());
    }

    /**
     * @test
     */
    public function isValidReturnsFalse()
    {
        $request = new Request([]);
        $response = new Response($request);
        $validator = new Validator($request, $response);

        $validator->setIsValid(false);
        $this->assertFalse($validator->getIsValid());
    }
}
