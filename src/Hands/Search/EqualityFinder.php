<?php

namespace Hands\Search;

use Card\HandInterface;

class EqualityFinder implements HandSearchInterface
{
    /**
     * @var HandSearch
     */
    protected $handSearch;

    /**
     * @var int
     */
    protected $requiredMatches;

    /**
     * @param HandSearch $handSearch
     * @param $requiredMatches
     */
    public function __construct(HandSearch $handSearch, $requiredMatches)
    {
        $this->handSearch = $handSearch;
        $this->requiredMatches = $requiredMatches;
    }

    /**
     * @param HandInterface $hand
     *
     * @return HandInterface|null
     */
    public function find(HandInterface $hand)
    {
        if (count($hand->getCards()) < $this->requiredMatches) {
            return null;
        }

        $cards = $hand->getCards();

        foreach ($cards as $card) {
            $matchingHand = $this->handSearch->search($card, $hand);

            if ($matchingHand && count($matchingHand->getCards()) === $this->requiredMatches) {
                return $matchingHand;
            }
        }

        return null;
    }
}
