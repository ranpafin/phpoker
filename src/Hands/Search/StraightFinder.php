<?php

namespace Hands\Search;

use Card\Card;
use Card\Hand;
use Card\HandInterface;
use Card\Suit;

/**
 * Class StraightFinder.
 */
class StraightFinder implements HandSearchInterface
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
     * @return HandInterface
     */
    public function find(HandInterface $hand)
    {
        if (count($hand->getCards()) < 5) {
            return null;
        }

        $cards = $hand->getCards();

        foreach ($cards as $card) {
            $start = max($card->getFaceValue() - 4, 1);
            $end = min($card->getFaceValue() + 4, 14);

            $flushCards = [];

            for ($faceValueCounter = $start; $faceValueCounter <= $end; ++$faceValueCounter) {
                $matchingHand = $this->handSearch->search(new Card($faceValueCounter == 1 ? 14 : $faceValueCounter, Suit::diamonds()), $hand);

                if ($matchingHand && count($matchingHand->getCards())) {
                    $flushCards[] = $matchingHand->getCards()[0];
                }

                if (count($flushCards) == 5) {
                    return new Hand(...$flushCards);
                }
            }
        }

        return null;
    }
}
