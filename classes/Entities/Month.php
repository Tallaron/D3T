<?php

namespace Entities;

class Month {

    private $date;
    private $offset;
    private $lastDay;
    private $weeks = [];
    
    /**
     * Initializes the <i>Month</i> object. Automatically sets the default date of this
     * month to the 1st of the month of the given <b>$date</b>.
     * E.g.: 1979-7-27 will initialize the object with 1979-7-1
     * @param \DateTime $date
     */
    public function __construct(\DateTime $date) {
        $this->setDate($date->modify('first day of this month'));
        $this->setOffset( $this->getDate()->modify('first day of this month')->format('N')-1 );
        $this->setLastDay( $this->getDate()->modify('last day of this month')->format('j') );
        $this->generateWeeks();
    }
    
    /**
     * Automatically creates some <i>Week</i> objects and puts them into the regarding array.
     * Each <i>Week</i> holds 7 days (int)eger. Those values might be negative, if the month
     * doesn't starts at monday or ends at sunday.
     */
    public function generateWeeks() {
        for($i=0; $i<6; $i++) {
            $dayNumber = 1+$i*7-$this->getOffset();
            if($dayNumber <= $this->getLastDay()) {
                $this->addWeek(new \Entities\Week( 1+$i*7-$this->getOffset() ));
            }
        }
    }

    /**
     * Adds a <i>Week</i> object tot the collector array.
     * @param \Entities\Week $week
     */
    private function addWeek(\Entities\Week $week) {
        $this->weeks[] = $week;
    }

    /**
     * Returns the full name of the month, e.g. 'July'.
     * @return String
     */
    public function getName() {
        return $this->getDate()->format('F');
    }

    /**
     * Returns a new <i>DateTime</i> object of the day that was given as <b>$dayOffset</b>.
     * @param int $dayOffset
     * @return \DateTime
     */
    public function getDay($dayOffset) {
        return $this->getDate()->modify('+'.($dayOffset-1).' day');
    }

    /**
     * Returns a cloned DateTime object of the initial DateTime object.
     * @return \DateTime
     */
    public function getDate() {
        return clone $this->date;
    }
    
    /**
     * Sets the initial DateTime of this month.
     * @param  $date \DateTime
     * @return \Entities\Month
     */
    public function setDate(\DateTime $date) {
        $this->date = $date;
        return $this;
    }

    /**
     * Returns the numeric offset of this month regarding to the day of week it is
     * starting. If the month starts at Thursday the return value will be 4.
     * @return int
     */
    public function getOffset() {
        return $this->offset;
    }

    /**
     * Returns the array of <i>Week</i>'s.
     * @return array
     */
    public function getWeeks() {
        return $this->weeks;
    }

    /**
     * Sets the offset of this month, according to the day of week it starts.
     * @param int $offset
     * @return \Entities\Month
     */
    private function setOffset($offset) {
        $this->offset = $offset;
        return $this;
    }

    /**
     * Puts an array of <i>Week</i>'s into this month.
     * @param array $weeks
     * @return \Entities\Month
     */
    public function setWeeks(array $weeks) {
        $this->weeks = $weeks;
        return $this;
    }

    /**
     * Returns the last day of this month as day of month, e.g. last day of July is 31.
     * @return int
     */
    public function getLastDay() {
        return $this->lastDay;
    }

    /**
     * Sets the last day of this month.
     * @param int $lastDay
     * @return \Entities\Month
     */
    private function setLastDay($lastDay) {
        $this->lastDay = $lastDay;
        return $this;
    }



}
