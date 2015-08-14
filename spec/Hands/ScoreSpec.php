<?php

namespace spec\Hands;

use PhpSpec\ObjectBehavior;
use spec\StaticFixtures;

class ScoreSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Hands\Score');
    }

    /**
     * @param \Card\HandInterface $hand
     */
    public function let($hand)
    {
        $hand->getCards()->willReturn(StaticFixtures::getFlush());

        $this->beConstructedWith($hand, 6);
    }

    public function it_contains_an_array_of_cards()
    {
        $this->getCards()->shouldBeArray();
    }

    public function it_contains_a_score()
    {
        $this->getScore()->shouldBeInteger();
    }
}
