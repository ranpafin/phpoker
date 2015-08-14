<?php

namespace Card;

/**
 * Class Hand.
 */
class Hand
{
    /**
     * @var \SplFixedArray
     */
    protected $cards;

    /**
     * @param ...$cards
     */
    public function __construct(...$cards)
    {
        $this->cards = new \SplFixedArray(5);

        if (count($cards) > 5) {
            throw new \BadMethodCallException('max 5 cards');
        }

        foreach ($cards as $key => $card) {
            if (!$card instanceof Card) {
                throw new \BadMethodCallException('Only cards');
            }
        }

        $this->cards->fromArray($cards, false);
    }

    /**
     * @return \SplFixedArray
     */
    public function getCards()
    {
        return $this->cards->toArray();
    }
}
