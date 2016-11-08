<?php

namespace Card;

/**
 * Class Card.
 */
class Card
{
    /** @var int */
    protected $faceValue;

    /** @var Suit */
    protected $suit;

    /**
     * Card constructor.
     * @param int $faceValue
     * @param Suit $suit
     */
    public function __construct(int $faceValue, Suit $suit)
    {
        $this->faceValue = $faceValue;
        $this->suit = $suit;
    }

    /**
     * @return int
     */
    public function getFaceValue(): int
    {
        return $this->faceValue;
    }

    /**
     * @return Suit
     */
    public function getSuit(): Suit
    {
        return $this->suit;
    }
}
