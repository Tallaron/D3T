<?php
namespace Entities;

class Calendar {

    private $start;
    private $end;
    private $numMonths = DEFAULT_CALENDAR_SIZE;
    private $endDateAnnounced = false;

    /**
     * Initializes the Calendar object.
     * Both initial dates are passed as String and will be parsed into a <i>\DateTime</i>
     * object. The <b>$endDate</b> might be boolean <i>false</i> if actually unknown. In
     * this case the <i>Calendar</i> will be initialized with an estimated duration given
     * by <b>$estDays</b>.
     * @param String $startDate
     * @param String $endDate
     * @param int $estDays
     */
    public function __construct($startDate, $endDate, $estDays) { //TODO: validate params
        $this->setStart( date_create_from_format(DEFAULT_DATE_FORMAT, $startDate) );
        if($endDate) {
            $this->setEndDateAnnounced(true);
            $this->setEnd( date_create_from_format(DEFAULT_DATE_FORMAT, $endDate) );
        } else {
            $this->setEnd( $this->getStart()->modify('+'.$estDays.' day') );
        }
    }

    /**
     * Returns the <i>\DateTime<i> object of today.
     * @return \DateTime
     */
    public function getToday() {
        return (new \DateTime())->setTime(0, 0, 0);
    }
    
    /**
     * Returns true if today is a seasonal day and false if not.
     * @return boolean
     */
    public function todayIsSeasonal() {
        return ($this->dayIsPastStart( $this->getToday() ) && $this->dayIsPreEstimatedEnd( $this->getToday() ));
    }

    /**
     * Returns the number of day during the current season. If today is an off-season
     * day the method returns false.
     * Note: The method might return wrong numbers if today isn't part of the season.
     * To prevent malfunctions just check if today is seasonal before.
     * @return int
     */
    public function currentDay() {
        return $this->getToday()->diff( $this->getStart() )->days;
    }

    /**
     * Returns an array of \Entities\Month objects. By default a calendar holds 4 months.
     * This can be changed by setting the number of months before requesting that array.
     * @return array \Entities\Month
     */
    public function getMonths() {
        $months = [];
        for($i=0; $i<$this->getNumMonths(); $i++) {
            $months[] = new \Entities\Month( $this->getFirstCalendarDay()->modify('+'.$i.' month') );
        }
        return $months;
    }
    
    /**
     * Returns true if the start \DateTime is a monday and false if not.
     * @return boolean
     */
    public function startIsMonday() {
        return $this->getStart()->format('N') == 1;
    }

    /**
     * Returns a formatted String of the <i>Calendar</i>'s startDate.
     * Note: The startDate doesn't represent the first day of this <i>Calendar</i>.
     * The <i>Calendar</i> may highlight the duration between start and end dates.
     * @param String $format
     * @return String
     */
    public function getStartDateFormatted($format = DEFAULT_DATE_FORMAT) {
        return $this->getStart()->format($format);
    }
    
    /**
     * Returns a formatted String of the <i>Calendar</i>'s endDate.
     * Note: The endDate doesn't represent the last day of this <i>Calendar</i>.
     * The <i>Calendar</i> may highlight the duration between start and end dates.
     * @param String $format
     * @return String
     */
    public function getEndDateFormatted($format = DEFAULT_DATE_FORMAT) {
        return $this->getEndDateAnnounced() ? $this->getEnd()->format($format) : 't.b.a.';
    }
    
    /**
     * Returns the first day of the <i>Calendar</i> as <i>\DateTime</i> object.
     * @return \DateTime
     */
    public function getFirstCalendarDay() {
        return clone $this->getStart()->modify('first day of this month');
    }

    /**
     * Returns a String of CSS classes that shall applied to the day element in
     * the frontend.
     * @param \Entities\Month $month
     * @param int $day
     * @return string
     */
    public function getDayCSSClasses(\Entities\Month $month, $day) { //TODO: atomize
        $cssClasses = [];
        //Check for valid day
        if(!$this->dayIsValid($month, $day)) {
            return 'calendar-invalid-day';
        }
        
        //Check if day is today and add css class if ...
        if($this->dayIsToday($month->getDay($day))) {
            $cssClasses[] = CSS_TODAY;
        }
        
        //Check if day is after start and before today & end of the season
        if(
            $this->dayIsPastStart($month->getDay($day)) &&
            $this->dayIsPreEstimatedEnd($month->getDay($day)) &&
            $this->dayIsPast($month->getDay($day))
            ) {
            $cssClasses[] = CSS_WAS_SEASON_DAY;
        }
        
        //Check if day is between today and end
        if(
            $this->dayIsFuture($month->getDay($day)) &&
            $this->dayIsPreEstimatedEnd($month->getDay($day))
            ) {
            $cssClasses[] = CSS_IS_SEASON_DAY;
        }
        
        //Check if day is not within start and end period
        if(
            !$this->dayIsPastStart($month->getDay($day)) ||
            !$this->dayIsPreEstimatedEnd($month->getDay($day))
            ) {
            $cssClasses[] = CSS_NO_SEASON_DAY;
        }
        return implode(' ', $cssClasses);
    }
    
    
    
    /**
     * Checks the given <b>$day</b> if it represents a valid date. Returns true
     * if yes and false if not, e.g. 32th day of a month.
     * @param \Entities\Month $month
     * @param int $day
     * @return boolean
     */
    public function dayIsValid(\Entities\Month $month, $day) {
        return ($day > 0 && $day <= $month->getLastDay());
    }

    /**
     * Checks if the given <b>$date</b> is today.
     * @param \DateTime $date
     * @return boolean
     */
    public function dayIsToday(\DateTime $date) {
        return $this->getToday()->format('Ymd') == $date->format('Ymd');
    }
    
    /**
     * Checks if the given <b>$date</b> if before today.
     * @param \DateTime $date
     * @return boolean
     */
    public function dayIsPast(\DateTime $date) {
        return $date->getTimestamp() - $this->getToday()->getTimestamp() <= 0;
    } 

    /**
     * Checks if the given <b>$date</b> is in the future of today.
     * @param \DateTime $date
     * @return boolean
     */
    public function dayIsFuture(\DateTime $date) {
        return $date->getTimestamp() - $this->getToday()->getTimestamp() > 0;
    } 

    /**
     * Checks if the given <b>$date</b> is after the initial start date of the
     * <i>Calendar</i>.
     * @param \DateTime $date
     * @return boolean
     */
    public function dayIsPastStart(\DateTime $date) {
        return ($date->getTimestamp() - $this->getStart()->getTimestamp()) >= 0;
        
    }

    /**
     * Checks if the given <b>$date</b> is before the initial end date of the
     * <i>Calendar</i>.
     * @param \DateTime $date
     * @return boolean
     */
    public function dayIsPreEstimatedEnd(\DateTime $date) {
        return ($date->getTimestamp() - $this->getEnd()->getTimestamp()) <= 0;
        
    }

    /**
     * Returns the initial date of this <i>Calendar</i>.
     * @return \DateTime
     */
    public function getStart() {
        return clone $this->start;
    }

    /**
     * Sets the initial value for the start date of this <i>Calendar</i>.
     * @param \DateTime $start
     * @return \Entities\Calendar
     */
    public function setStart(\DateTime $start) {
        $this->start = $start;
        return $this;
    }

    /**
     * Returns the initial end date of this <i>Calendar</i>.
     * @return \DateTime
     */
    public function getEnd() {
        return clone $this->end;
    }

    /**
     * Sets the initial value for the end date of this <i>Calendar</i>.
     * @param \DateTime $end
     * @return \Entities\Calendar
     */
    public function setEnd(\DateTime $end) {
        $this->end = $end;
        return $this;
    }

    /**
     * Returns the number of months the <i>Calendar</i> shall be long as.
     * @return int
     */
    public function getNumMonths() {
        return $this->numMonths;
    }

    /**
     * Sets the number of months the <i>Calendar</i> shall hold.
     * @param type $numMonths
     * @return \Entities\Calendar
     */
    public function setNumMonths($numMonths) {
        $this->numMonths = $numMonths;
        return $this;
    }

    /**
     * Returns true if the end date is already known and false if not.
     * @return boolean
     */
    public function getEndDateAnnounced() {
        return $this->endDateAnnounced;
    }

    /**
     * Sets the announced flag for the end date.
     * @param boolean $endDateAnnounced
     * @return \Entities\Calendar
     */
    public function setEndDateAnnounced($endDateAnnounced) {
        $this->endDateAnnounced = $endDateAnnounced;
        return $this;
    }
    
}
