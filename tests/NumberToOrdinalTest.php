<?php

use PHPUnit\Framework\TestCase;
use Challenge\NumberToOrdinal as NumberToOrdinal;

class NumberToOrdinalTest extends TestCase
{
    public function testFirstTen()
    {
        // Requirement 1 - Do not mask the first digit and the last four digits
        $this->assertEquals('1st', NumberToOrdinal::apply('1'));
        $this->assertEquals('2nd', NumberToOrdinal::apply('2'));
        $this->assertEquals('3rd', NumberToOrdinal::apply('3'));
        $this->assertEquals('4th', NumberToOrdinal::apply('4'));
        $this->assertEquals('5th', NumberToOrdinal::apply('5'));
        $this->assertEquals('6th', NumberToOrdinal::apply('6'));
        $this->assertEquals('7th', NumberToOrdinal::apply('7'));
        $this->assertEquals('8th', NumberToOrdinal::apply('8'));
        $this->assertEquals('9th', NumberToOrdinal::apply('9'));
        $this->assertEquals('10th', NumberToOrdinal::apply('10'));
    }

    public function testInteger()
    {
        $this->assertEquals('1st', NumberToOrdinal::apply(1));
    }

    public function testFirst() 
    {
        $this->assertEquals('1st', NumberToOrdinal::apply('1'));
        $this->assertEquals('21st', NumberToOrdinal::apply('21'));
        $this->assertEquals('31st', NumberToOrdinal::apply('31'));
        $this->assertEquals('41st', NumberToOrdinal::apply('41'));
        $this->assertEquals('51st', NumberToOrdinal::apply('51'));
    }

    public function testSecond()
    {
        $this->assertEquals('2nd', NumberToOrdinal::apply('2'));
        $this->assertEquals('22nd', NumberToOrdinal::apply('22'));
        $this->assertEquals('32nd', NumberToOrdinal::apply('32'));
        $this->assertEquals('42nd', NumberToOrdinal::apply('42'));
        $this->assertEquals('52nd', NumberToOrdinal::apply('52'));
    }
    
    public function testThird()
    {
        $this->assertEquals('3rd', NumberToOrdinal::apply('3'));
        $this->assertEquals('23rd', NumberToOrdinal::apply('23'));
        $this->assertEquals('33rd', NumberToOrdinal::apply('33'));
        $this->assertEquals('43rd', NumberToOrdinal::apply('43'));
        $this->assertEquals('53rd', NumberToOrdinal::apply('53'));
    }

    public function testAll()
    {
        $digits = ['th', 'st', 'nd', 'rd', 'th', 'th', 'th', 'th', 'th', 'th'];

        for ($i = 1; $i <= 1001; $i++) {
            // get the last digit
            $lastDigit = $i % 10;

            $this->assertEquals($i . $digits[$lastDigit], NumberToOrdinal::apply($i));
        }
    }
}