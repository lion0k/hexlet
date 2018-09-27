<?php
/**
 * Created by PhpStorm.
 * User: li0n0k
 * Date: 25.09.18
 * Time: 13:47
 */

namespace Myproject\Tests;

use Myproject\Questions;
use \PHPUnit\Framework\TestCase;

class QuestionsTest extends TestCase
{
    public function testGetQuestions()
    {
$text1 = <<<HEREDOC
lala\r\nr
ehu?
\n \t
i see you
/r \n
one two?\r\n\n
HEREDOC;
        $qust = new Questions();
        $actual1 = $qust->getQuestions($text1);

        $expected1 = "ehu?\none two?";
        $this->assertEquals($expected1, $actual1);
    }
}
