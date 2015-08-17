<?php

namespace tests\unit\Card;

use Card\Card;
use Card\Suit;

/**
 * Class CardTest.
 */
class CardTest extends \PHPUnit_Framework_TestCase
{
    public function test_should_have_a_face_value()
    {
        $card = new Card(2, Suit::spades());

        $this->assertEquals(2, $card->getFaceValue());
    }

    public function test_should_have_a_valid_suit()
    {
        $card = new Card(2, Suit::spades());

        $this->assertInstanceOf(Suit::class, $card->getSuit());
    }
}
