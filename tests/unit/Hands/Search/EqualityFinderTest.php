<?php

namespace tests\unit\Hands\Search;

use Card\Card;
use Card\Hand;
use Card\HandInterface;
use Card\Suit;
use Hands\Search\HandSearch;
use Hands\Search\EqualityFinder;
use Prophecy\Argument;
use tests\StaticFixtures;

/**
 * Class EqualityFinderTest.
 */
class EqualityFinderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider hands
     *
     * @param HandInterface $hand
     * @param $searchedHand
     * @param $expectedHand
     */
    public function test_it_will_return_an_hand_that_matches_the_search_null_otherwise(HandInterface $hand, $howManyCards, $searchedHand, $expectedHand)
    {
        $handSearch = $this->prophesize(HandSearch::class);

        $handSearch
            ->search(Argument::cetera())
            ->willReturn(new Hand(...[]));

        $handSearch->search(new Card(2, Suit::spades()), Argument::cetera())->willReturn($searchedHand);

        $twoOfAKindFinder = new EqualityFinder($handSearch->reveal(), $howManyCards);

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
                new Hand(...StaticFixtures::one_pair()),
                2,
                new Hand(...StaticFixtures::three_of_a_kind_matching_pair()),
                new Hand(...StaticFixtures::three_of_a_kind_matching_pair()),
            ],
            [
                new Hand(...StaticFixtures::three_of_a_kind()),
                2,
                new Hand(...StaticFixtures::three_of_a_kind_matching_pair()),
                new Hand(...StaticFixtures::three_of_a_kind_matching_pair()),
            ],
            [
                new Hand(...StaticFixtures::three_of_a_kind()),
                2,
                null,
                null,
            ],
        ];
    }
}
