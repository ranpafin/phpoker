<?php

namespace spec\Hands\Search;

use Card\Hand;
use Hands\Score;
use tests\StaticFixtures;

/**
 * Class ScoreTest.
 */
class ScoreTest extends \PHPUnit_Framework_TestCase
{
    public function test_it_contains_constains_an_hand()
    {
        $hand = new Hand(...StaticFixtures::getThreeOfAKind());

        $score = new Score($hand, 10);

        $this->assertEquals($hand, $score->getHand());

        $this->assertEquals(10, $score->getScore());
    }
}
