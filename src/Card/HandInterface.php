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
    public function getCards(): array;

    /**
     * @param HandInterface $handInterface
     *
     * @return HandInterface
     */
    public function discard(HandInterface $handInterface): HandInterface;

    /**
     * @param HandInterface $handInterface
     *
     * @return HandInterface
     */
    public function insert(HandInterface $handInterface): HandInterface;

    /**
     * @param int $numberOfCardsToKeep
     *
     * @return HandInterface
     */
    public function keep(int $numberOfCardsToKeep): HandInterface;

    /**
     * @return int
     */
    public function getFaceValue(): int;
}
