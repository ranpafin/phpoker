<?php

namespace tests\unit\Hands\Search;

use Card\Hand;
use Hands\HighCard;
use Hands\OnePair;
use Hands\Score;
use Hands\Search\ScoreSearch;
use Hands\ThreeOfAKind;
use Hands\TwoPairs;
use Prophecy\Argument;
use tests\Fixtures\PairTrait;

/**
 * Class ScoreSearchTest
 */
class ScoreSearchTest extends \PHPUnit_Framework_TestCase
{

    use PairTrait;

    public function test_will_return_the_higher_score_available()
    {

        $toSearch = new Hand(...$this->one_pair());

        $onePair = $this->prophesize(OnePair::class);
        $onePair->match($toSearch)->willReturn(new Score($toSearch, 55));

        $twoPairs = $this->prophesize(TwoPairs::class);
        $twoPairs->match($toSearch)->willReturn(null);

        $threeOfAKind = $this->prophesize(ThreeOfAKind::class);
        $threeOfAKind->match($toSearch)->willReturn(null);

        $scoreSearch = new ScoreSearch(
            new HighCard(),
            $onePair->reveal(),
            $twoPairs->reveal(),
            $threeOfAKind->reveal()
        );

        $score = $scoreSearch->match($toSearch);

        $this->assertEquals(55, $score->getScore());
    }


}
