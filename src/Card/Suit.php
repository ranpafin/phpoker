<?php

namespace Card;

class Suit
{
    const SPADES = 1;
    const HEARTS = 2;
    const FLOWERS = 3;
    const DIAMONDS = 4;

    protected $suites = [
        self::SPADES,
        self::HEARTS,
        self::FLOWERS,
        self::DIAMONDS,
    ];

    protected $suite;

    /**
     * Suit constructor.
     *
     * @param int $suite
     */
    public function __construct($suite)
    {
        $this->suite = $suite;
    }

    public static function spades()
    {
        return new self(self::SPADES);
    }

    /**
     * @return int
     */
    public function getSuite()
    {
        return $this->suite;
    }
}
