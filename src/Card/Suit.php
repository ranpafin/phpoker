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
    public static function spades(): Suit
    {
        return new self(self::SPADES);
    }

    /**
     * @return Suit
     */
    public static function flowers(): Suit
    {
        return new self(self::FLOWERS);
    }

    /**
     * @return Suit
     */
    public static function diamonds(): Suit
    {
        return new self(self::DIAMONDS);
    }

    /**
     * @return int
     */
    public function getSuit(): int
    {
        return $this->suit;
    }
}
