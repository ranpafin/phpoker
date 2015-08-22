<?php

namespace tests;

use Card\Card;
use Card\Suit;
use tests\Fixtures\StraightTrait;
use tests\Fixtures\ThreeOfAKindTrait;
use tests\Fixtures\PairTrait;

/**
 * Class StaticFixtures.
 */
class StaticFixtures
{
    use PairTrait;
    use StraightTrait;
    use ThreeOfAKindTrait;

    /**
     * @return array
     */
    public static function getFlush()
    {
        return [
            new Card(2, Suit::spades()),
            new Card(3, Suit::spades()),
            new Card(4, Suit::spades()),
            new Card(5, Suit::spades()),
            new Card(6, Suit::spades()),
        ];
    }
}
