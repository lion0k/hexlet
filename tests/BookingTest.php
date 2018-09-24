<?php
/**
 * Created by PhpStorm.
 * User: li0n0k
 * Date: 24.09.18
 * Time: 22:08
 */

namespace Myproject\Tests;

use Myproject\Booking;
use \PHPUnit\Framework\TestCase;

class BookingTest extends TestCase
{
    public function testBook()
    {
        $booking = new Booking();
        $result1 = $booking->book('11-11-2008', '13-11-2008');
        $this->assertTrue($result1);

        $result2 = $booking->book('12-11-2008', '12-11-2008');
        $this->assertFalse($result2);

        $result3 = $booking->book('10-11-2008', '12-11-2008');
        $this->assertFalse($result3);

        $result4 = $booking->book('12-11-2008', '14-11-2008');
        $this->assertFalse($result4);

        $result5 = $booking->book('10-11-2008', '11-11-2008');
        $this->assertTrue($result5);

        $result6 = $booking->book('13-11-2008', '13-11-2008');
        $this->assertFalse($result6);

        $result7 = $booking->book('13-11-2008', '14-11-2008');
        $this->assertTrue($result7);
    }
}
