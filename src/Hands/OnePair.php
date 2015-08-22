<?php

namespace Hands;

use Card\HandInterface;
use Hands\Search\HandSearchInterface;

/**
 * Class OnePair.
 */
class OnePair implements HandMatcherInterface
{
    const MULTIPLIER = 10;

    /**
     * @var HandSearchInterface
     */
    protected $twoOfAKindFinder;

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
     * @return Score|null
     */
    public function match(HandInterface $hand)
    {
        $match = $this->pairFinder->find($hand);

        if (!$match) {
            return;
        }

        if (count($match->getCards()) !== 2) {
            throw new \LogicException('A pair should be an Hand of size 2. Found: '.count($match->getCards()));
        }

        return new Score(
            $hand->discard($match)->keep(3)->insert($match),
            $match->getFaceValue() * self::MULTIPLIER
        );
    }
}
