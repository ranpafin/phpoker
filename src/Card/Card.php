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

    public function __construct($faceValue, Suit $suit)
    {
        $this->faceValue = $faceValue;
        $this->suit = $suit;
    }

    /**
     * @return int
     */
    public function getFaceValue()
    {
        return $this->faceValue;
    }

    /**
     * @return Suit
     */
    public function getSuit()
    {
        return $this->suit;
    }
}
