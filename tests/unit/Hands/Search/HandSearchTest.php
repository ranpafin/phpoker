<?php

namespace spec\Hands\Search;

use Card\Card;
use Card\Hand;
use Card\HandInterface;
use Card\Suit;
use Hands\Search\HandSearch;
use tests\StaticFixtures;

/**
 * Class HandSearchTest.
 */
class HandSearchTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider hands
     *
     * @param $cardToFind
     * @param $hand
     * @param $expectedHand
     */
    public function test_it_will_return_an_hand_that_matches_the_search(Card $cardToFind, HandInterface $hand, HandInterface $expectedHand)
    {
        $handSearch = new HandSearch();

        $actualHand = $handSearch->search($cardToFind, $hand);

        $this->assertEquals($expectedHand, $actualHand);
    }

    /**
     * @return array
     */
    public function hands()
    {
        return[
            [
                new Card(2, Suit::spades()),
                new Hand(...StaticFixtures::getOneTwoOfAKind()),
                new Hand(...StaticFixtures::getOneTwoOfAKindActualPair()),
            ],
            [
                new Card(2, Suit::spades()),
                new Hand(...StaticFixtures::getThreeOfAKind()),
                new Hand(...StaticFixtures::getThreeOfAKindActualThree()),
            ],
            [
            new Card(9, Suit::spades()),
                new Hand(...StaticFixtures::getThreeOfAKind()),
                new Hand(),
            ],
        ];
    }
}
