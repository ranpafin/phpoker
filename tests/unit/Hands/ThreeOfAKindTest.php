<?php

namespace tests\unit\Hands;

use Card\Hand;
use Card\HandInterface;
use Hands\Score;
use Hands\Search\EqualityFinder;
use Hands\ThreeOfAKind;
use Prophecy\Argument;
use tests\StaticFixtures;

/**
 * Class ThreeOfAKindTest
 */
class ThreeOfAKindTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider hands
     *
     * @param HandInterface $handToSearch
     * @param $firstFinderResult
     * @param $expectedScore
     */
    public function test_it_will_return_a_score_with_the_max_face_value_adjusted_with_the_hands_strength(
        HandInterface $handToSearch,
        $firstFinderResult,
        $expectedScore
    )
    {
        $threeOfAKindFinder = $this->prophesize(EqualityFinder::class);

        $threeOfAKindFinder->find($handToSearch)->willReturn($firstFinderResult);

        $matcher = new ThreeOfAKind($threeOfAKindFinder->reveal());

        $this->assertEquals($expectedScore, $matcher->match($handToSearch));
    }


    /**
     * @return array
     */
    public function hands()
    {
        return[
            [
                new Hand(...StaticFixtures::three_of_a_kind()),
                new Hand(...StaticFixtures::three_of_a_kind_actual_three()),
                new Score(new Hand(...StaticFixtures::three_of_a_kind()), (2 + 2 + 2) * ThreeOfAKind::MULTIPLIER),
            ],
            [
                new Hand(...StaticFixtures::one_pair()),
                null,
                null
            ],
        ];
    }
}
