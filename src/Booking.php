<?php
/**
 * Created by PhpStorm.
 * User: li0n0k
 * Date: 24.09.18
 * Time: 16:30
 */

namespace Myproject;

use Carbon\Carbon;
use Carbon\CarbonPeriod;

class Booking
{
    public $dateStart;
    public $dateFinish;

    public function __construct()
    {
    }

    public function book(string $dateStr, string $dateFin)
    {
        if (!isset($this->dateStart)) {
            $this->dateStart = new Carbon($dateStr);
            $this->dateFinish = new Carbon($dateFin);

            return true;
        }

        $newDateStr = new Carbon($dateStr);
        $newDateFin = new Carbon($dateFin);

        if ($newDateStr < $this->dateStart && $newDateFin > $this->dateFinish) {
            return false;
        }

        if ($newDateStr->format('Ymd') === $newDateFin->format('Ymd')) {
            return false;
        }

        $period = CarbonPeriod::create($this->dateStart, $this->dateFinish);
        $period->setStartDate($this->dateStart, false);
        $period->setEndDate($this->dateFinish, false);

        foreach ($period as $date) {
            if ($date->format('Ymd') === $newDateStr->format('Ymd')
                || $date->format('Ymd') === $newDateFin->format('Ymd')) {
                return false;
            }
        }

        return true;
    }
}

