<?php

class Calendar {
    private $daysOfWeek = array('Monday', 'Tuesday', 'Wednesdy', 'Thursday', 'Friday', 'Saturday', 'Sunday');
    private $month = 1;
    private $year = 2020;
    private $amountOfWeeks = 6;
    private $amountWeekDays = 7;
    
    public function __construct() {
    }

    private function getDayOfWeekNumber($dayOfWeek){
        return array_search($dayOfWeek, $this->daysOfWeek); // Make constant
    }

    private function convertToDayCell($title, $data = null){
        return array(
            'title' => $title,
            'data'  => $data);
    }

    public function getCalendarWeeks($month = 1, $year = 2020){
        $weeks = array();
        $weeks[] = array_map(array($this, 'convertToDayCell'), $this->daysOfWeek);
        
        $firstDayOfWeek = date("l", strtotime("first day of this month"));
        $firstDayOfWeekNumber = $this->getDayOfWeekNumber($firstDayOfWeek);
        $totalCurrentMonthDays = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        $totalPreviousMonthDays = cal_days_in_month(CAL_GREGORIAN, $month - 1, $year); //TODO Check borders

        $dayNumber = $totalPreviousMonthDays - $firstDayOfWeekNumber + 1; // This will be same total month days if day starts on Monday
        $maxDay = 0;

        if($dayNumber == $totalPreviousMonthDays){
            $maxDay = $totalCurrentMonthDays;
            $dayNumber = 1;
        } else{
            $maxDay = $totalPreviousMonthDays;
        }

        for ($weekNumber = 1; $weekNumber < $this->amountOfWeeks; $weekNumber++) {
            $week = array();

            for ($cell = 0; $cell < $this->amountWeekDays; $cell++) {
                $week[] = $this->convertToDayCell($dayNumber, array());
                $dayNumber++;
                if ($dayNumber > $maxDay) {
                    $dayNumber = 1;
                }
            }
            $weeks[] = $week;
        }

        return $weeks;
    }
}
