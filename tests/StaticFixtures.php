<?php

namespace tests;

use Card\Card;
use Card\Suit;

/**
 * Class StaticFixtures.
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

    public static function getOneTwoOfAKind()
    {
        return [
            new Card(2, Suit::spades()),
            new Card(2, Suit::flowers()),
            new Card(4, Suit::spades()),
            new Card(5, Suit::spades()),
            new Card(6, Suit::spades()),
        ];
    }

    public static function getOneTwoOfAKindActualPair()
    {
        return [
            new Card(2, Suit::spades()),
            new Card(2, Suit::flowers()),
        ];
    }

    public static function getThreeOfAKind()
    {
        return [
            new Card(2, Suit::spades()),
            new Card(2, Suit::flowers()),
            new Card(2, Suit::diamonds()),
            new Card(5, Suit::spades()),
            new Card(10, Suit::spades()),
        ];
    }

    public static function getThreeOfAKindActualThree()
    {
        return [
            new Card(2, Suit::spades()),
            new Card(2, Suit::flowers()),
            new Card(2, Suit::diamonds()),
        ];
    }
}
