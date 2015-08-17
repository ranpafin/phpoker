<?php

namespace spec\Hands;

use Card\Hand;
use Card\HandInterface;
use Hands\HighCard;
use Hands\Score;
use tests\StaticFixtures;

/**
 * Class HighCardTest.
 */
class HighCardTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider hands
     *
     * @param HandInterface $hand
     * @param $expectedScore
     */
    public function test_it_will_return_a_score_with_the_max_face_value_adjusted_with_the_hands_strength(HandInterface $hand, $expectedScore)
    {
        $highCard = new HighCard();

        $this->assertEquals($expectedScore, $highCard->match($hand));
    }

    /**
     * @return array
     */
    public function hands()
    {
        return[
            [
                new Hand(...StaticFixtures::getOneTwoOfAKind()),
                new Score(new Hand(...StaticFixtures::getOneTwoOfAKind()), 6 * HighCard::MULTIPLIER),
            ],
            [
                new Hand(...StaticFixtures::getThreeOfAKind()),
                new Score(new Hand(...StaticFixtures::getThreeOfAKind()), 10 * HighCard::MULTIPLIER),
            ],
        ];
    }
}
