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
    
    private function getDaysSettings ($month, $year){
        $daysSettings = array(
            'dayNumber' => 1,
            'maxDay'    => 0
        );
        $firstDayOfWeek = date("l", strtotime("first day of this month"));
        $firstDayOfWeekNumber = $this->getDayOfWeekNumber($firstDayOfWeek);
        $totalCurrentMonthDays = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        $totalPreviousMonthDays = cal_days_in_month(CAL_GREGORIAN, $month - 1, $year); //TODO Check borders

        $daysSettings['dayNumber'] = $totalPreviousMonthDays - $firstDayOfWeekNumber + 1; // This will be same total month days if day starts on Monday
        $daysSettings['maxDay'] = 0;

        if($daysSettings['dayNumber'] == $totalPreviousMonthDays){
            $daysSettings['maxDay'] = $totalCurrentMonthDays;
            $daysSettings['dayNumber'] = 1;
        } else{
            $daysSettings['maxDay'] = $totalPreviousMonthDays;
        }
        
        return $daysSettings;
    }

    private function getCalendarWeeks($month = 1, $year = 2020){
        $weeks = array();
        $weeks[] = array_map(array($this, 'convertToDayCell'), $this->daysOfWeek);
        $daysSettings = $this->getDaysSettings($month, $year);
        
        for ($weekNumber = 1; $weekNumber < $this->amountOfWeeks; $weekNumber++) {
            $week = array();

            for ($day = 0; $day < $this->amountWeekDays; $day++) {
                // TODO test data
                $bookings = array(
                    'amountEnrolled' => 15,
                    'amountWithLicense' => 7,
                    'amountOfBookings' => 35,
                    'status' => 'open'
                );
                
                $week[] = $this->convertToDayCell($daysSettings['dayNumber'], $bookings);
                $daysSettings['dayNumber']++;
                if ($daysSettings['dayNumber'] > $daysSettings['maxDay']) {
                    $daysSettings['dayNumber'] = 1;
                }
            }
            $weeks[] = $week;
        }

        return $weeks;
    }
    
    public function getCalendar($month = 1, $year = 2020){
        $weeks = $this->getCalendarWeeks($month, $year);
        $calendar = array(
            'currentMonth' => date("F", mktime(0, 0, 0, $month, 10)),
            'previousMonth' => date("F", mktime(0, 0, 0, $month - 1, 10)),
            'nextMonth' => date("F", mktime(0, 0, 0, $month + 1, 10)),
            'currentYear'  => $year, 
            'weeks'        => $weeks
        );
        return $calendar;
    }
}
