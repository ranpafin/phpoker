<?php

namespace tests\unit\Hands;

use Card\Hand;
use Hands\Score;
use Hands\Search\StraightFinder;
use Hands\Straight;
use tests\StaticFixtures;

/**
 * Class StraightTest.
 */
class StraightTest extends \PHPUnit_Framework_TestCase
{
    public function test_it_will_return_a_score_with_the_max_face_value_adjusted_with_the_hands_strength(

    ) {
        $hand = new Hand(...StaticFixtures::straight());

        $finder = $this->prophesize(StraightFinder::class);

        $finder->find($hand)->willReturn($hand);

        $matcher = new Straight($finder->reveal());

        $expectedScore = new Score($hand, (3 + 4 + 5 + 6 + 7) * Straight::MULTIPLIER);

        $this->assertEquals($expectedScore, $matcher->match($hand));
    }
}
