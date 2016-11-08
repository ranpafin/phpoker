<?php

namespace tests\unit\Hands;

use Card\Hand;
use Hands\Score;
use Hands\Search\HandSearch;
use tests\Fixtures\PairTrait;
use tests\StaticFixtures;

/**
 * Class ScoreTest.
 */
class ScoreTest extends \PHPUnit_Framework_TestCase
{

    use PairTrait;

    public function test_it_contains_an_hand()
    {
        $hand = new Hand(...StaticFixtures::three_of_a_kind());

        $score = new Score($hand, 10);

        $this->assertEquals($hand, $score->getHand());

        $this->assertEquals(10, $score->getScore());
    }

    public function ensure_hand_multiplier()
    {
        $onePair = new Hand($this->one_pair());

        $twoPair = new Hand($this->two_pairs());

        $handSearch= new HandSearch();

        $this->assertGreaterThan($onePair->getFaceValue(),$twoPair->getFaceValue());


    }
}
