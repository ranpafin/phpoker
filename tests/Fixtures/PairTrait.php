<?php

namespace tests\Fixtures;

use Card\Card;
use Card\Suit;

/**
 * Class TwoPairTrait.
 */
trait PairTrait
{
    public static function one_pair()
    {
        return [
            new Card(2, Suit::spades()),
            new Card(2, Suit::flowers()),
            new Card(4, Suit::spades()),
            new Card(5, Suit::spades()),
            new Card(6, Suit::spades()),
        ];
    }

    public static function two_pairs()
    {
        return [
            new Card(2, Suit::spades()),
            new Card(2, Suit::flowers()),
            new Card(4, Suit::spades()),
            new Card(4, Suit::flowers()),
            new Card(6, Suit::spades()),
        ];
    }

    public static function two_pairs_first_pair()
    {
        return [
            new Card(2, Suit::spades()),
            new Card(2, Suit::flowers()),
        ];
    }

    public static function two_pairs_second_pair()
    {
        return [
            new Card(4, Suit::spades()),
            new Card(4, Suit::flowers()),
        ];
    }
}
