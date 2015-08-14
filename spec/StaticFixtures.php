<?php

namespace spec;

use Card\Card;
use Card\Suit;

/**
 * Class CardSpec.
 */
class StaticFixtures
{
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

    public static function getSixCardFlush()
    {
        return [
            new Card(2, Suit::spades()),
            new Card(3, Suit::spades()),
            new Card(4, Suit::spades()),
            new Card(5, Suit::spades()),
            new Card(6, Suit::spades()),
            new Card(7, Suit::spades()),
        ];
    }
}
