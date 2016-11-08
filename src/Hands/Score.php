<?php declare(strict_types=1);

namespace Hands;

use Card\HandInterface;

/**
 * Class Score.
 */
class Score implements ScoreInterface
{
    /**
     * @var int
     */
    protected $score;

    /**
     * @var HandInterface
     */
    protected $hand;

    /**
     * @param HandInterface $hand
     * @param int           $score
     */
    public function __construct(HandInterface $hand, $score)
    {
        $this->score = $score;
        $this->hand = $hand;
    }

    /**
     * @return int
     */
    public function getScore(): int
    {
        return $this->score;
    }

    /**
     * @return HandInterface
     */
    public function getHand(): HandInterface
    {
        return $this->hand;
    }
}
