<?php

declare(strict_types=1);

namespace Bridge\Zend\Date;


use Zend_Date;

class Date extends Zend_Date
{
    public function getIsoTime(): string
    {
        return $this -> getIso();
    }

    public function getW3CTime(): string
    {
        return $this -> get(static::W3C);
    }

    public function getGmtOffsetTime(): float
    {
        return $this -> getGmtOffset();
    }

    public function addHours($hours)
    {
        $this -> add($hours, static::HOUR);
    }

    public function setDateLocale($locale): void
    {
        $this -> setLocale($locale);
    }

    public function getMonthShort(): string
    {
        return $this -> get(static::MONTH_SHORT);
    }

    public function getMonthDays(): int
    {
        return (int)$this -> get(static::MONTH_DAYS);
    }

    public function getMonthName(): string
    {
        return $this -> get(static::MONTH_NAME);
    }

    public function getMonthNameShort(): string
    {
        return $this -> get(static::MONTH_NAME_SHORT);
    }

    public function getDayShort(): string
    {
        return $this -> get(static::DAY_SHORT);
    }

    public function getWeekdayShort(): string
    {
        return $this -> get(static::WEEKDAY_SHORT);
    }

    public function getWeekNumber(): int
    {
        return (int)$this -> get(static::WEEK);
    }

    public function getIsLeapYear(): bool
    {
        return (bool)$this -> get(static::LEAPYEAR);
    }
}