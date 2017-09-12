<?php

namespace Entities;

class Week {

    private $days = [];
    
    /**
     * Autofills the array of int's starting with the value given via <b>$start</b>.
     * @param int $start
     */
    public function __construct($start) {
        for($i=0; $i<7; $i++) {
            $this->addDay($start+$i);
        }
    }
    
    /**
     * Returns the number of the week of the season or false if off-seasonal.
     * @param \Entities\Calendar $cal
     * @param \Entities\Month $month
     * @return mixed
     */
    public function getSeasonWeek(\Entities\Calendar $cal, \Entities\Month $month) {
        $firstDayDate = $month->getDate()->modify('+'.($this->getFirstDay()).' day');
        $lastDayDate = $month->getDate()->modify('+'.($this->getLastDay()).' day');
        $weekOffset = !$cal->dayIsPastStart($firstDayDate) && $cal->dayIsPreEstimatedEnd($lastDayDate) ? 0 : 1;
        if(
            $cal->dayIsPastStart($lastDayDate) && $cal->dayIsPreEstimatedEnd($firstDayDate)
            ) {
            return ceil($firstDayDate->diff($cal->getStart())->days/7+$weekOffset);
        } else {
            return false;
        }
    }

    /**
     * Adds the int representing the <i>day of month</i> to the week.
     * @param int $day
     */
    private function addDay($day) {
        $this->days[] = $day;
    }
    
    /**
     * Returns the first day of this week as <i>day of month</i>.
     * The return value might negative if the month doesn't start at monday.
     * @return int
     */
    public function getFirstDay() {
        return $this->days[0];
    }

    /**
     * Returns the last day of thís week as <i>day of month</i>.
     * @return int
     */
    public function getLastDay() {
        return $this->days[count($this->getDays())-1];
    }

    /**
     * Returns as array with the <i>days of month</i> according to this week.
     * @return array
     */
    public function getDays() {
        return $this->days;
    }

    /**
     * Sets the array of int's representing the <i>days of month</i> according to
     * this week.
     * @param array $days
     * @return \Entities\Week
     */
    public function setDays(array $days) {
        $this->days = $days;
        return $this;
    }


    
}
