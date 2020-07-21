<?php

namespace Tests\Unit\Models;
use App\Models\User;
use App\Models\Lesson;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    /**
     * @param string $plan
     * @param int $remainingCount
     * @param int $reservationCount
     * @param bool $canReserve
     * @dataProvider dataCanReserve
     */
    public function testCanReserve(string $plan, int $remainingCount, int $reservationCount, bool $canReserve)
    {
        $user = new User();
        $user->plan = $plan;

        $lesson = new Lesson();
        $this->assertSame($canReserve, $user->canReserve($lesson->remainingCount(), $reservationCount));
        // $this->assertSame($canReserve, $user->canReserve($remainingCount, $reservationCount));
    }
    // public function testCanReserve()
    // {
    //     $user = new User();
    
    //     $user->plan = 'regular';
    //     $remainingCount = 1;
    //     $reservationCount = 4;
    //     $this->assertTrue($user->canReserve($remainingCount, $reservationCount));
    
    //     $user->plan = 'regular';
    //     $remainingCount = 1;
    //     $reservationCount = 5;
    //     $this->assertTrue($user->canReserve($remainingCount, $reservationCount));
    // }

    public function dataCanReserve() {
        return [
            '予約可:レギュラー,空きあり,月の上限以下' => [
                'plan' => 'regular',
                'remainingCount' => 1,
                'reservationCount' => 4,
                'canReserve' => true,
            ],
            '予約不可:レギュラー,空きあり,月の上限以下' => [
                'plan' => 'regular',
                'remainingCount' => 1,
                'reservationCount' => 5,
                'canReserve' => false,
            ],
            '予約不可:レギュラー,空きなし,月の上限以下' => [
                'plan' => 'regular',
                'remainingCount' => 0,
                // ここで４を入れるのがきも
                'reservationCount' => 4,
                'canReserve' => false,
            ],
            '予約可:ゴールド,空きあり' => [
                'plan' => 'gold',
                'remainingCount' => 1,
                'reservationCount' => 5,
                'canReserve' => true,
            ],
            '予約不可:ゴールド,空きなし' => [
                'plan' => 'gold',
                'remainingCount' => 0,
                'reservationCount' => 5,
                'canReserve' => false,
            ],
        ];
    }
}
