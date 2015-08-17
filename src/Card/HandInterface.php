<?php

namespace Card;

/**
 * Interface HandInterface.
 */
interface HandInterface
{
    /**
     * @return Card[] $cards
     */
    public function getCards();

    /**
     * @param HandInterface $handInterface
     *
     * @return HandInterface
     */
    public function discard(HandInterface $handInterface);

    /**
     * @param HandInterface $handInterface
     *
     * @return HandInterface
     */
    public function insert(HandInterface $handInterface);

    /**
     * @param int $numberOfCardsToKeep
     *
     * @return HandInterface
     */
    public function keep($numberOfCardsToKeep);

    /**
     * @return int
     */
    public function getFaceValue();
}
