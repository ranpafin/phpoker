<?php

namespace tests\unit\Hands\Search;

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
     * @param Card $cardToFind
     * @param HandInterface $handToSearch
     * @param $expectedHand
     * @internal param $hand
     */
    public function test_it_will_return_an_hand_that_matches_the_search_null_otherwise(Card $cardToFind, HandInterface $handToSearch, $expectedHand)
    {
        $handSearch = new HandSearch();

        $actualHand = $handSearch->search($cardToFind, $handToSearch);

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
                new Hand(...StaticFixtures::one_pair()),
                new Hand(...StaticFixtures::two_pairs_first_pair()),
            ],
            [
                new Card(2, Suit::spades()),
                new Hand(...StaticFixtures::three_of_a_kind()),
                new Hand(...StaticFixtures::three_of_a_kind_actual_three()),
            ],
            [
                new Card(9, Suit::spades()),
                new Hand(...StaticFixtures::three_of_a_kind()),
                null,
            ],
        ];
    }
}
