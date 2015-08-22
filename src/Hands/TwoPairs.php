<?php

namespace Hands;

use Card\HandInterface;
use Hands\Search\HandSearchInterface;

/**
 * Class TwoPairs.
 */
class TwoPairs implements HandMatcherInterface
{
    const MULTIPLIER = 100;

    /**
     * @var HandSearchInterface
     */
    protected $pairFinder;

    /**
     * @param HandSearchInterface $pairFinder
     */
    public function __construct(HandSearchInterface $pairFinder)
    {
        $this->pairFinder = $pairFinder;
    }

    /**
     * @param HandInterface $hand
     *
     * @return bool|null
     */
    public function match(HandInterface $hand)
    {
        $firstPair = $this->pairFinder->find($hand);

        if (!$firstPair) {
            return;
        }

        if (count($firstPair->getCards()) !== 2) {
            throw new \LogicException('A pair should be an Hand of size 2. Found: '.count($firstPair->getCards()));
        }

        $secondPair = $this->pairFinder->find($hand->discard($firstPair));

        if (!$secondPair) {
            return;
        }

        if (count($secondPair->getCards()) !== 2) {
            throw new \LogicException('A pair should be an Hand of size 2. Found: '.count($secondPair->getCards()));
        }

        return new Score(
            $hand
                ->discard($firstPair)
                ->discard($secondPair)
                ->keep(1)
                ->insert($firstPair)
                ->insert($secondPair),
                ($firstPair->getFaceValue() + $secondPair->getFaceValue())  * self::MULTIPLIER
        );
    }
}
