<?php

namespace tests\Fixtures;

use Card\Card;
use Card\Suit;

/**
 * Class StraightTrait.
 */
trait StraightTrait
{
    public static function straight()
    {
        return [
            new Card(3, Suit::spades()),
            new Card(4, Suit::flowers()),
            new Card(5, Suit::spades()),
            new Card(6, Suit::spades()),
            new Card(7, Suit::spades()),
        ];
    }

    public static function straight_actual_straight()
    {
        return [
            new Card(3, Suit::spades()),
            new Card(4, Suit::flowers()),
            new Card(5, Suit::spades()),
            new Card(6, Suit::spades()),
            new Card(7, Suit::spades()),
        ];
    }
}
