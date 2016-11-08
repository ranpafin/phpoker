<?php

namespace Hands\Search;

use Card\HandInterface;

/**
 * Class ThreeOfAKindFinder.
 */
class ThreeOfAKindFinder implements HandSearchInterface
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
        if (count($hand->getCards()) < 3) {
            return null;
        }

        $cards = $hand->getCards();

        foreach ($cards as $card) {
            $matchingHand = $this->handSearch->search($card, $hand);

            if ($matchingHand && count($matchingHand->getCards()) === 3) {
                return $matchingHand;
            }
        }

        return null;
    }
}
