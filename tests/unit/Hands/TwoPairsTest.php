<?php

namespace tests\unit\Hands;

use Card\Hand;
use Card\HandInterface;
use Hands\Score;
use Hands\Search\EqualityFinder;
use Hands\TwoPairs;
use Prophecy\Argument;
use tests\StaticFixtures;

/**
 * Class TwoPairsTest.
 */
class TwoPairsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider hands
     *
     * @param HandInterface $handToSearch
     * @param $firstFinderResult
     * @param $secondFinderResult
     * @param $expectedScore
     */
    public function test_it_will_return_a_score_with_the_max_face_value_adjusted_with_the_hands_strength(
        HandInterface $handToSearch,
        $firstFinderResult,
        $secondFinderResult,
        $expectedScore
    )
    {
        $twoOfAKindFinder = $this->prophesize(EqualityFinder::class);

        $twoOfAKindFinder->find($handToSearch)->willReturn($firstFinderResult);
        $twoOfAKindFinder->find($handToSearch->discard($firstFinderResult))->willReturn($secondFinderResult);

        $matcher = new TwoPairs($twoOfAKindFinder->reveal());

        $this->assertEquals($expectedScore, $matcher->match($handToSearch));
    }


    /**
     * @return array
     */
    public function hands()
    {
        return[
            [
                new Hand(...StaticFixtures::two_pairs()),
                new Hand(...StaticFixtures::two_pairs_first_pair()),
                new Hand(...StaticFixtures::two_pairs_second_pair()),
                new Score(new Hand(...StaticFixtures::two_pairs()), (2 + 2 + 4 + 4) * TwoPairs::MULTIPLIER),
            ],
            [
                new Hand(...StaticFixtures::three_of_a_kind()),
                new Hand(...StaticFixtures::three_of_a_kind_matching_pair()),
                null,
                null,
            ],
        ];
    }
}
