<?php

namespace tests\unit\Hands\Search;

use Card\Card;
use Card\Hand;
use Card\Suit;
use Hands\Search\HandSearch;
use Hands\Search\StraightFinder;
use Prophecy\Argument;
use tests\StaticFixtures;

/**
 * Class StraightFinderTest.
 */
class StraightFinderTest extends \PHPUnit_Framework_TestCase
{
    public function test_it_will_return_an_hand_that_matches_the_search_null_otherwise()
    {
        $handSearch = $this->prophesize(HandSearch::class);

        $handSearch
            ->search(Argument::cetera())
            ->willReturn(new Hand(...[]));

        $hand = new Hand(...StaticFixtures::straight());

        $handSearch
            ->search(Argument::which('getFaceValue', 3), Argument::cetera())
            ->willReturn(new Hand(new Card(3, Suit::spades())))->shouldBeCalled();
        $handSearch
            ->search(Argument::which('getFaceValue', 4), Argument::cetera())
            ->willReturn(new Hand(new Card(4, Suit::flowers())))->shouldBeCalled();
        $handSearch
            ->search(Argument::which('getFaceValue', 5), Argument::cetera())
            ->willReturn(new Hand(new Card(5, Suit::spades())))->shouldBeCalled();
        $handSearch
            ->search(Argument::which('getFaceValue', 6), Argument::cetera())
            ->willReturn(new Hand(new Card(6, Suit::spades())))->shouldBeCalled();
        $handSearch
            ->search(Argument::which('getFaceValue', 7), Argument::cetera())
            ->willReturn(new Hand(new Card(7, Suit::spades())))->shouldBeCalled();

        $handSearch->search(Argument::any(), Argument::cetera())->willReturn(null);

        $finder = new StraightFinder($handSearch->reveal());

        $this->assertEquals($hand, $finder->find($hand));
    }
}
