<?php

namespace Hands;

use Card\HandInterface;

/**
 * Class HighCard.
 */
class HighCard implements HandMatcherInterface
{
    /**
     * @param HandInterface $hand
     *
     * @return bool
     */
    public function match(HandInterface $hand)
    {
        $max = -1;

        foreach ($hand->getCards() as $card) {
            $max = max($max, $card->getFaceValue());
        }

        return $max;
    }
}
