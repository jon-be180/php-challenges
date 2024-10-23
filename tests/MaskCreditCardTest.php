<?php

use PHPUnit\Framework\TestCase;
use Challenge\MaskCreditCard as MaskCreditCard;

class MaskCreditCardTest extends TestCase
{
    public function testRequirementOne()
    {
        // Requirement 1 - Do not mask the first digit and the last four digits
        $this->assertEquals('1###########1234', MaskCreditCard::apply('1234123412341234'));
    }

    public function testRequirementTwo() 
    {
        // Requirement 2 - Do not mask non-digit charaters
        $this->assertEquals('a1a2b3c4d5', MaskCreditCard::apply('a1a2b3c4d5'));
        $this->assertEquals('a1a#b#c4d5e6f7', MaskCreditCard::apply('a1a2b3c4d5e6f7'));
        $this->assertEquals('1a#b#c#d#e#f#g#h#i#j#k#l#m#n#o#p#q#r#s#t#u#v#w4x5y6z7', MaskCreditCard::apply('1a2b3c4d5e6f7g8h9i0j1k2l3m4n5o6p7q8r9s0t1u2v3w4x5y6z7'));
        $this->assertEquals('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLNMOPQRSTUVWXYZ', MaskCreditCard::apply('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLNMOPQRSTUVWXYZ'));
    }

    public function testRequirementThree() 
    {
        // Requirement 3 - Do not mask if the input is less than 6
        $this->assertEquals('1234', MaskCreditCard::apply('1234'));
    }

    public function testRequirementFour() 
    {   
        // Requirement 4 - return '' when input is empty
        $this->assertEquals('', MaskCreditCard::apply(''));
    }
}