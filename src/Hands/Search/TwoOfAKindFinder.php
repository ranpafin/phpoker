<?php

namespace Hands\Search;

use Card\HandInterface;

class TwoOfAKindFinder implements HandSearchInterface
{
    /**
     * @var HandSearch
     */
    protected $handSearch;

    /**
     * @param HandSearch $handSearch
     */
    public function __construct(HandSearch $handSearch)
    {
        $this->handSearch = $handSearch;
    }

    /**
     * @param HandInterface $hand
     *
     * @return HandInterface|null
     */
    public function find(HandInterface $hand)
    {
        if (count($hand->getCards()) < 2) {
            return;
        }

        $cards = $hand->getCards();

        foreach ($cards as $card) {
            $matchingHand = $this->handSearch->search($card, $hand);

            if (count($matchingHand->getCards()) === 2) {
                return $matchingHand;
            }
        }

        return;
    }
}
