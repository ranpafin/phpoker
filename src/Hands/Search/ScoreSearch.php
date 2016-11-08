<?php

namespace Hands\Search;

use Card\HandInterface;
use Hands\HandMatcherInterface;
use Hands\Score;

/**
 * Class ScoreSearch.
 */
class ScoreSearch implements HandMatcherInterface
{

    /** @var HandMatcherInterface[] */
    protected $matchers = [];

    /**
     * ScoreSearch constructor.
     * @param HandMatcherInterface[] $matchers
     */
    public function __construct(...$matchers)
    {
        $this->matchers = $matchers;
    }

    /**
     * @param HandInterface $hand
     * @return \Hands\Score
     */
    public function match(HandInterface $hand): Score
    {

        $max = null;

        foreach ($this->matchers as $matcher) {
            $score = $matcher->match($hand);

            if ($score && $score->getScore() > $max) {
                $max = $score;
            }
        }

        return $max;
    }
}
