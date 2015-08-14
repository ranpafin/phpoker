<?php

namespace Hands;

use Card\Hand;
use Card\HandInterface;

/**
 * Class Score.
 */
class Score extends Hand implements ScoreInterface
{
    /**
     * @var int
     */
    protected $score;

    /**
     * @param HandInterface $hand
     * @param int           $score
     */
    public function __construct(HandInterface $hand, $score)
    {
        parent::__construct(...$hand->getCards());
        $this->score = $score;
    }

    /**
     * @return int
     */
    public function getScore()
    {
        return $this->score;
    }
}
