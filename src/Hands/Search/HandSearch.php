<?php declare(strict_types=1);

namespace Hands\Search;

use Card\Card;
use Card\Hand;
use Card\HandInterface;

/**
 * Class HandSearch.
 */
class HandSearch
{
    /**
     * @param Card          $cardToFind
     * @param HandInterface $hand
     *
     * @return Hand|null
     */
    public function search(Card $cardToFind, HandInterface $hand)
    {
        $matches = 0;

        $cards = [];

        foreach ($hand->getCards() as $key => $card) {
            if ($card->getFaceValue() === $cardToFind->getFaceValue()) {
                ++$matches;
                $cards[] = $card;
            }
        }

        return count($cards) ? new Hand(...$cards) : null;
    }
}
