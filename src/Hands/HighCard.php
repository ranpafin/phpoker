<?php

namespace Hands;

use Card\Hand;
use Card\HandInterface;

/**
 * Class HighCard.
 */
class HighCard implements HandMatcherInterface, AdjustableHandStrengthInterface
{
    const MULTIPLIER = 1;

    /**
     * @param HandInterface $hand
     *
     * @return Score
     */
    public function match(HandInterface $hand): Score
    {
        $cards = $hand->getCards();

        $max = -1;

        foreach ($cards as $card) {
            $max = max($max, $card->getFaceValue());
        }

        return new Score(new Hand(...$cards), $max);
    }

    /**
     * @return int
     */
    public function getMultiplier(): int
    {
        return self::MULTIPLIER;
    }
}
