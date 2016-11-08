<?php

namespace Hands;

use Card\HandInterface;
use Hands\Search\HandSearchInterface;

/**
 * Class Straight.
 */
class Straight implements HandMatcherInterface
{
    const MULTIPLIER = 10000;

    /**
     * @var HandSearchInterface
     */
    protected $straightFinder;

    /**
     * @param HandSearchInterface $StraightFinder
     */
    public function __construct(HandSearchInterface $StraightFinder)
    {
        $this->straightFinder = $StraightFinder;
    }

    /**
     * @param HandInterface $hand
     *
     * @return bool|null
     */
    public function match(HandInterface $hand)
    {
        $straight = $this->straightFinder->find($hand);

        if (!$straight) {
            return false;
        }

        if (count($straight->getCards()) !== 5) {
            throw new \LogicException('A Straight should be an Hand of size 5. Found: '.count($straight->getCards()));
        }

        return new Score(
            $straight,
            $straight->getFaceValue()  * self::MULTIPLIER
        );
    }
}
