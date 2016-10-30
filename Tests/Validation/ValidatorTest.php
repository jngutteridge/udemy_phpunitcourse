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

    /**
     * @test
     */
    public function checkForMinStringLengthWithValidData()
    {
        $request = new Request(['minType' => 'yellow']);
        $response = new Response($request);
        $validator = new Validator($request, $response);

        $errors = $validator->check(['minType' => 'min:3']);
        $this->assertCount(0, $errors);
    }

    /**
     * @test
     */
    public function checkForMinStringLengthWithInalidData()
    {
        $request = new Request(['minType' => 'x']);
        $response = new Response($request);
        $validator = new Validator($request, $response);

        $errors = $validator->check(['minType' => 'min:3']);
        $this->assertCount(1, $errors);
    }

    /**
     * @test
     */
    public function checkForEmailWithWithValidData()
    {
        $request = new Request(['emailType' => 'test@debug.jng.me.uk']);
        $response = new Response($request);
        $validator = new Validator($request, $response);

        $errors = $validator->check(['emailType' => 'email']);
        $this->assertCount(0, $errors);
    }

    /**
     * @test
     */
    public function checkForEmailWithWithInvalidData()
    {
        $request = new Request(['emailType' => 'bademail.debug.jng.me.uk']);
        $response = new Response($request);
        $validator = new Validator($request, $response);

        $errors = $validator->check(['emailType' => 'email']);
        $this->assertCount(1, $errors);
    }
}
