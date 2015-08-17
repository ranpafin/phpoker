<?php

namespace spec\Hands\Search;

use Card\Card;
use Card\Hand;
use Card\HandInterface;
use Card\Suit;
use Hands\Search\HandSearch;
use Hands\Search\TwoOfAKindFinder;
use Prophecy\Argument;
use tests\StaticFixtures;

/**
 * Class TwoOfAKindFinderTest.
 */
class TwoOfAKindFinderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider hands
     *
     * @param HandInterface $hand
     * @param $searchedHand
     * @param $expectedHand
     */
    public function test_it_will_return_an_hand_that_matches_the_search_null_otherwise(HandInterface $hand, $searchedHand, $expectedHand)
    {
        $handSearch = $this->prophesize(HandSearch::class);

        $handSearch
            ->search(Argument::cetera())
            ->willReturn(new Hand(...[]));

        $handSearch->search(new Card(2, Suit::spades()), Argument::cetera())->willReturn($searchedHand);

        $twoOfAKindFinder = new TwoOfAKindFinder($handSearch->reveal());

        $actualHand = $twoOfAKindFinder->find($hand);

        $this->assertEquals($expectedHand, $actualHand);
    }

    /**
     * @return array
     */
    public function hands()
    {
        return[
            [
                new Hand(...StaticFixtures::getOneTwoOfAKind()),
                new Hand(...StaticFixtures::getOneTwoOfAKindActualPair()),
                new Hand(...StaticFixtures::getOneTwoOfAKindActualPair()),
            ],
            [
                new Hand(...StaticFixtures::getThreeOfAKind()),
                new Hand(...StaticFixtures::getOneTwoOfAKindActualPair()),
                new Hand(...StaticFixtures::getOneTwoOfAKindActualPair()),
            ],
            [
                new Hand(...StaticFixtures::getThreeOfAKind()),
                new Hand(...[]),
                null,
            ],
        ];
    }
}
