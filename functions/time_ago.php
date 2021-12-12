<?php
function time_ago($timestamp){
    //type cast, current time, difference in timestamps
    $timestamp      = (int) $timestamp;
    $current_time   = time();
    $diff           = $current_time - $timestamp;
    //intervals in seconds
    $intervals      = array (
        'year' => 31556926, 'month' => 2629744, 'week' => 604800, 'day' => 86400, 'hour' => 3600, 'minute'=> 60
    );
    //now we just find the difference
    if ($diff < 20){
        return lang('just_now');
    }
    if ($diff < 60){
        return lang('minute_ago');
    }
    if ($diff >= 60 && $diff < $intervals['hour']){ // Minute, minutes
        $diff = floor($diff/$intervals['minute']);
        return $diff == 1 ? $diff .' '. lang('minute') : $diff .' '. lang('minutes');
    }
    if ($diff >= $intervals['hour'] && $diff < $intervals['day']){ // hour, hours
        $diff = floor($diff/$intervals['hour']);
        return $diff == 1 ? $diff .' '. lang('hour') : $diff .' '. lang('hours');
    }
    if ($diff >= $intervals['day'] && $diff < $intervals['week']){ // Day, Days
        $diff = floor($diff/$intervals['day']);
        return $diff == 1 ? $diff .' '. lang('day') : $diff .' '. lang('days');
    }
    if ($diff >= $intervals['week'] && $diff < $intervals['month']){ // week, weeks
        $diff = floor($diff/$intervals['week']);
        return $diff == 1 ? $diff .' '. lang('week') : $diff .' '. lang('weeks');
    }
    if ($diff >= $intervals['month'] && $diff < $intervals['year']){ // Month, months
        $diff = floor($diff/$intervals['month']);
        return $diff == 1 ? $diff .' '. lang('month') : $diff .' '. lang('months');
    }
    if ($diff >= $intervals['year']){ // Year, Years
        $diff = floor($diff/$intervals['year']);
        return $diff == 1 ? $diff .' '. lang('year') : $diff .' '. lang('years');
    }
}
