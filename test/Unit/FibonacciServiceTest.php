<?php

namespace Test\Unit;

/**
 * Class FibonacciServiceTest
 *
 * @package Test\Unit
 */
class FibonacciServiceTest extends  \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function testFirstTerm()
    {
        $fb = new FiboService();

        $r = $fb->fibo(1);

        $this->assertEquals(1, $r);
    }

    /**
     * @test
     */
    public function testSecondTerm()
    {
        $fb = new FiboService();

        $r = $fb->fibo(2);

        $this->assertEquals(1, $r);
    }

    /**
     * @test
     */
    public function testNTerm()
    {
        $fb = new FiboService();

        $r = $fb->fibo(10);

        $this->assertEquals(55, $r);
    }

    /**
     * @test
     */
    public function testZeroTerm()
    {
        $fb = new FiboService();

        $this->setExpectedException('InvalidParameterException');

        $fb->fibo(0);
    }

    /**
     * @test
     */
    public function testNegativeTerm()
    {
        $fb = new FiboService();

        $this->setExpectedException('InvalidParameterException');

        $fb->fibo(-1);
    }
}
