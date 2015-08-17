<?php

namespace Card;

/**
 * Class Suit.
 */
class Suit
{
    /**
     *
     */
    const SPADES = 1;
    /**
     *
     */
    const HEARTS = 2;
    /**
     *
     */
    const FLOWERS = 3;
    /**
     *
     */
    const DIAMONDS = 4;

    /**
     * @var array
     */
    protected $suits = [
        self::SPADES,
        self::HEARTS,
        self::FLOWERS,
        self::DIAMONDS,
    ];

    /**
     * @var int
     */
    protected $suit;

    /**
     * Suit constructor.
     *
     * @param int $suit
     */
    public function __construct($suit)
    {
        $this->suit = $suit;
    }

    /**
     * @return Suit
     */
    public static function spades()
    {
        return new self(self::SPADES);
    }

    /**
     * @return Suit
     */
    public static function flowers()
    {
        return new self(self::FLOWERS);
    }

    /**
     * @return Suit
     */
    public static function diamonds()
    {
        return new self(self::DIAMONDS);
    }

    /**
     * @return int
     */
    public function getSuit()
    {
        return $this->suit;
    }
}
