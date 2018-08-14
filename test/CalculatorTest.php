<?php
require getcwd().'/vendor/autoload.php';

// CalculatorTest.php
include_once(getcwd()."/src/Calculator.php");

class CalculatorTest extends \PHPUnit_Framework_TestCase
{
    public function testDivideByPositiveNumber() {
        $calcMock = $this->getMockBuilder('\Calculator')
            ->setMethods(array('getNumberFromUserInput'))
            ->getMock();
        $calcMock->expects($this->once())
            ->method('getNumberFromUserInput')
            ->will($this->returnValue(10));
        $this->assertEquals(5,$calcMock->divideBy(2));
    }

    public function testDivideByZero() {
        $calcMock=$this->getMockBuilder('\Calculator')
            ->setMethods(array('getNumberFromUserInput'))
            ->getMock();
        $calcMock->expects($this->never())
            ->method('getNumberFromUserInput')
            ->will($this->returnValue(10));
        $this->assertEquals("NAN", $calcMock->divideBy(0));
    }

    public function testDivideByNegativeNumber() {
        $calcMock=$this->getMockBuilder('\Calculator')
            ->setMethods(array('getNumberFromUserInput'))
            ->getMock();
        $calcMock->expects($this->once())
            ->method('getNumberFromUserInput')
            ->will($this->returnValue(10));
        $this->assertEquals(-2,$calcMock->divideBy(-5));
    }

    public function testDivideByPositiveNumberAndPrint() {
        $calcMock=$this->getMockBuilder('\Calculator')
            ->setMethods(array('getNumberFromUserInput', 'printToScreen'))
            ->getMock();
        $calcMock->expects($this->once())
            ->method('getNumberFromUserInput')
            ->will($this->returnValue(10));
        $calcMock->expects($this->once())
            ->method('printToScreen')
            ->with($this->equalTo('5'));
        $calcMock->divideByAndPrint(2);
    }

    public function testSomething()
    {
        // Optional: Test anything here, if you want.
        $this->assertTrue(true, 'This should already work.');

        // Stop here and mark this test as incomplete.
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    }
}
