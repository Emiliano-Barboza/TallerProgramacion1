<?php
include_once('../config/configuracion.php');

class Calendar {
    private $daysOfWeek = array('Monday', 'Tuesday', 'Wednesdy', 'Thursday', 'Friday', 'Saturday', 'Sunday');
    private $month = 1;
    private $year = 2020;
    private $amountOfWeeks = 7;
    private $amountWeekDays = 7;
    
    public function __construct() {
    }

    private function getDayOfWeekNumber($dayOfWeek){
        return array_search($dayOfWeek, $this->daysOfWeek); // Make constant
    }
    
    private function getBookingStatus($totalBookings, $enrolled){
        $status = 'open';
        $porcentage = $enrolled / $totalBookings;
        if ($porcentage == 1) {
            $status = 'full';
        } else if ($porcentage >= 0.5) {
            $status = 'warning';
        }
        return $status;
    }

    private function convertToDayCell($title, $data = null){
        return array(
            'title' => $title,
            'data'  => $data
        );
    }
    
    private function getDaysSettings ($month, $year){
        $daysSettings = array(
            'dayNumber' => 1,
            'maxDay'    => 0
        );
        $monthName = date('F', mktime(0, 0, 0, $month, 10));
        $firstDayOfWeek = date("l", strtotime("first day of " . $monthName));
        $firstDayOfWeekNumber = $this->getDayOfWeekNumber($firstDayOfWeek);
        var_dump($firstDayOfWeekNumber);
        $totalCurrentMonthDays = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        $totalPreviousMonthDays = cal_days_in_month(CAL_GREGORIAN, $month - 1, $year); //TODO Check borders

        $daysSettings['dayNumber'] = $totalPreviousMonthDays - $firstDayOfWeekNumber + 1; // This will be same total month days if day starts on Monday
        var_dump($daysSettings['dayNumber']);
        $daysSettings['maxDay'] = 0;

        if($daysSettings['dayNumber'] > $totalPreviousMonthDays){
            $daysSettings['maxDay'] = $totalCurrentMonthDays;
            $daysSettings['dayNumber'] = 1;
        } else{
            $daysSettings['maxDay'] = $totalPreviousMonthDays;
        }
        
        return $daysSettings;
    }
    
    private function searchForId($keyLookup, $value, $array) {
        foreach ($array as $key => $val) {
            if ($val[$keyLookup] === $value) {
                return $key;
            }
        }
        return null;
     }

    private function getCalendarWeeks($month = 1, $year = 2020, $dataSource){
        $weeks = array();
        $weeks[] = array_map(array($this, 'convertToDayCell'), $this->daysOfWeek);
        $daysSettings = $this->getDaysSettings($month, $year);
        
        for ($weekNumber = 1; $weekNumber < $this->amountOfWeeks; $weekNumber++) {
            $week = array();

            for ($day = 0; $day < $this->amountWeekDays; $day++) {
                $bookingDate = null;
                $date = $year . '-' . sprintf('%02d', $month) . '-' . sprintf('%02d', $daysSettings['dayNumber']);
                
                if ($day < REST_DAYS) {
                    $foundKey = $this->searchForId('fecha', $date, $dataSource);
                    if(isset($foundKey)) {
                        $bookingDate = $dataSource[$foundKey];
                    } else {
                        $bookingDate = array(
                            'inscriptos' => 0,
                            'licencias'  => 0,
                            'fecha'      => $date
                        );
                    }
                    $bookingDate['cupos']  = sizeof(range(BOOKING_FIRST_HOUR, BOOKING_LAST_HOUR, BOOKING_SESSION_HOUR));
                    $bookingDate['status'] = $this->getBookingStatus($bookingDate['cupos'], $bookingDate['inscriptos']);
                    $bookingDate['costo'] = (BOOKING_COST * $weekNumber) - $day; // Fake different costs per week
                }
                
                $week[] = $this->convertToDayCell($daysSettings['dayNumber'], $bookingDate);
                $daysSettings['dayNumber']++;
                if ($daysSettings['dayNumber'] > $daysSettings['maxDay']) {
                    $daysSettings['dayNumber'] = 1;
                }
            }
            $weeks[] = $week;
        }

        return $weeks;
    }
    
    public function getCalendar($month = 1, $year = 2020, $dataSource){
        $weeks = $this->getCalendarWeeks($month, $year, $dataSource);
        $nextMonth = $month + 1;
        $previousMonth = $month - 1;
        $calendar = array(
            'currentMonthText'  => date("F", mktime(0, 0, 0, $month, 10)),
            'previousMonthText' => date("F", mktime(0, 0, 0, $previousMonth, 10)),
            'nextMonthText'     => date("F", mktime(0, 0, 0, $nextMonth, 10)),
            'nextMonth'         => $nextMonth, 
            'previousMonth'     => $previousMonth, 
            'currentYear'       => $year, 
            'weeks'             => $weeks
        );
        return $calendar;
    }
}
