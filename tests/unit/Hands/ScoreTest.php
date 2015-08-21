<?php

namespace tests\unit\Hands;

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
        $hand = new Hand(...StaticFixtures::three_of_a_kind());

        $score = new Score($hand, 10);

        $this->assertEquals($hand, $score->getHand());

        $this->assertEquals(10, $score->getScore());
    }
}
