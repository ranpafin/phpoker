<?php

namespace tests\Fixtures;

use Card\Card;
use Card\Suit;

/**
 * Class TwoPairTrait
 * @package tests\Fixtures
 */
trait ThreeOfAKindTrait
{

    public static function three_of_a_kind()
    {
        return [
            new Card(2, Suit::spades()),
            new Card(2, Suit::flowers()),
            new Card(2, Suit::diamonds()),
            new Card(5, Suit::spades()),
            new Card(10, Suit::spades()),
        ];
    }

    public static function three_of_a_kind_actual_three()
    {
        return [
            new Card(2, Suit::spades()),
            new Card(2, Suit::flowers()),
            new Card(2, Suit::diamonds()),
        ];
    }

    public static function three_of_a_kind_matching_pair()
    {
        return [
            new Card(2, Suit::spades()),
            new Card(2, Suit::flowers()),
        ];
    }
}
