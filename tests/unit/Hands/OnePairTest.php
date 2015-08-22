<?php

namespace tests\unit\Hands;

use Card\Hand;
use Card\HandInterface;
use Hands\OnePair;
use Hands\Score;
use Hands\Search\EqualityFinder;
use Prophecy\Argument;
use tests\StaticFixtures;

/**
 * Class OnePairTest.
 */
class OnePairTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider hands
     *
     * @param HandInterface $hand
     * @param HandInterface $finderResult
     * @param $expectedScore
     */
    public function test_it_will_return_a_score_with_the_max_face_value_adjusted_with_the_hands_strength(HandInterface $hand, $finderResult, $expectedScore)
    {
        $twoOfAKindFinder = $this->prophesize(EqualityFinder::class);

        $twoOfAKindFinder->find($hand)->willReturn($finderResult);

        $matcher = new OnePair($twoOfAKindFinder->reveal());

        $this->assertEquals($expectedScore, $matcher->match($hand));
    }

    public function test_it_will_throw_an_exception_if_hand_found_size_is_wrong()
    {
        $twoOfAKindFinder = $this->prophesize(EqualityFinder::class);

        $twoOfAKindFinder->find(Argument::any())->willReturn(new Hand(...[]));

        $matcher = new OnePair($twoOfAKindFinder->reveal());

        $this->setExpectedException(\Exception::class);

        $matcher->match(new Hand(...[]));
    }

    /**
     * @return array
     */
    public function hands()
    {
        return[
            [
                new Hand(...StaticFixtures::one_pair()),
                new Hand(...StaticFixtures::three_of_a_kind_matching_pair()),
                new Score(new Hand(...StaticFixtures::one_pair()), (2 + 2) * OnePair::MULTIPLIER),
            ],
            [
                new Hand(...StaticFixtures::three_of_a_kind()),
                new Hand(...StaticFixtures::three_of_a_kind_matching_pair()),
                new Score(new Hand(...StaticFixtures::three_of_a_kind()), (2 + 2) * OnePair::MULTIPLIER),
            ],
            [
                new Hand(...StaticFixtures::getFlush()),
                null,
                null,
            ],
        ];
    }
}
