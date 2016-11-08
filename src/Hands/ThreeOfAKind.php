<?php

namespace Hands;

use Card\HandInterface;
use Hands\Search\HandSearchInterface;

/**
 * Class ThreeOfAKind.
 */
class ThreeOfAKind implements HandMatcherInterface
{
    const MULTIPLIER = 1000;

    /**
     * @var HandSearchInterface
     */
    protected $threeOfAKindFinder;

    /**
     * @param HandSearchInterface $threeOfAKindFinder
     */
    public function __construct(HandSearchInterface $threeOfAKindFinder)
    {
        $this->threeOfAKindFinder = $threeOfAKindFinder;
    }

    /**
     * @param HandInterface $hand
     *
     * @return bool
     */
    public function match(HandInterface $hand)
    {
        $threeOfAKind = $this->threeOfAKindFinder->find($hand);

        if (!$threeOfAKind) {
            return false;
        }

        if (count($threeOfAKind->getCards()) !== 3) {
            throw new \LogicException('A ThreeOfAKind should be an Hand of size 3. Found: '.count($threeOfAKind->getCards()));
        }

        return new Score(
            $hand
                ->discard($threeOfAKind)
                ->keep(2)
                ->insert($threeOfAKind),
            $threeOfAKind->getFaceValue()  * self::MULTIPLIER
        );
    }
}
