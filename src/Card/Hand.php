<?php declare(strict_types=1);

namespace Card;

/**
 * Class Hand.
 */
class Hand implements HandInterface
{
    /**
     * @var \SplFixedArray
     */
    protected $cards;

    /**
     * Hand constructor.
     * @param Card[] ...$cards
     */
    public function __construct(Card ...$cards)
    {
        if (count($cards) > 5) {
            throw new \BadMethodCallException('max 5 cards. Found: '.count($cards));
        }

        usort($cards, function (Card $a, Card $b) {
              $faceValueDifference = $b->getFaceValue() - $a->getFaceValue();

            return $faceValueDifference === 0 ? $b->getSuit()->getSuit() - $a->getSuit()->getSuit() : $faceValueDifference;
        });

        $this->cards = \SplFixedArray::fromArray($cards, false);
    }

    /**
     * @return Card[]
     */
    public function getCards() : array
    {
        return $this->cards->toArray();
    }

    /**
     * @param HandInterface $hand
     *
     * @return HandInterface
     */
    public function discard(HandInterface $hand) : HandInterface
    {
        $cards = $this->getCards();

        foreach ($hand->getCards() as $card) {
            if (($key = array_search($card, $cards, false)) !== false) {
                unset($cards[$key]);
            }
        }

        return new self(...$cards);
    }

    /**
     * @param HandInterface $handInterface
     *
     * @return HandInterface
     */
    public function insert(HandInterface $handInterface): HandInterface
    {
        return new self(
            ...array_merge(
                $this->discard($handInterface)->getCards(),
                $handInterface->getCards()
            )
        );
    }

    /**
     * @param int $numberOfCardsToKeep
     *
     * @return HandInterface
     */
    public function keep(int $numberOfCardsToKeep): HandInterface
    {
        if ($this->cards->count() <= $numberOfCardsToKeep) {
            return $this;
        }

        return new self(
            ...array_slice($this->getCards(), 0, $numberOfCardsToKeep)
        );
    }

    /**
     * @return int
     */
    public function getFaceValue(): int
    {
        $faceValue = 0;
        foreach ($this->getCards() as $card) {
            $faceValue += $card->getFaceValue();
        }

        return $faceValue;
    }
}
