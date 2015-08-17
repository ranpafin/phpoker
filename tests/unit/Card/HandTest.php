<?php

namespace tests\unit\Card;

use Card\Card;
use Card\Hand;
use tests\StaticFixtures;

/**
 * Class HandTest.
 */
class HandTest extends \PHPUnit_Framework_TestCase
{
    public function test_it_contains_an_array_of_cards()
    {
        $hand = new Hand(...StaticFixtures::getFlush());

        $this->assertInternalType('array', $hand->getCards());

        foreach ($hand->getCards() as $card) {
            $this->assertInstanceOf(Card::class, $card);
        }
    }

    public function test_it_contains_up_to_five_cards()
    {
        $hand = new Hand(...StaticFixtures::getFlush());

        $this->assertLessThanOrEqual(5, count($hand->getCards()));
    }
}
