<?php

namespace spec\Card;

use Card\Card;
use Card\Suit;
use PhpSpec\ObjectBehavior;

/**
 * Class CardSpec.
 */
class CardSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith(2, Suit::spades());
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType('Card\Card');
    }

    public function it_should_have_a_face_value()
    {
        $this->getFaceValue()->shouldBeInteger();
    }

    public function it_should_have_a_valid_suit()
    {
        $this->getSuit()->shouldReturnAnInstanceOf(Suit::class);
    }
}
