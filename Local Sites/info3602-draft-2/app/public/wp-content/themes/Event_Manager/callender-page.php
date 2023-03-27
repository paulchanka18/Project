<?php
/*
Template Name: Callender Page
*/
?>


<?php get_header() ?>
<?php
// Set the timezone
date_default_timezone_set('UTC');

// Set the year and month
$year = isset($_GET['year']) ? $_GET['year'] : date('Y');
$month = isset($_GET['month']) ? $_GET['month'] : date('m');

// Get the number of days in the month
$numDays = cal_days_in_month(CAL_GREGORIAN, $month, $year);

// Get the name of the month
$monthName = date('F', mktime(0, 0, 0, $month, 1, $year));

// Get the first day of the month
$firstDay = date('N', mktime(0, 0, 0, $month, 1, $year));

// Create an array of the days of the week
$daysOfWeek = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');

// Generate an array of random dates to mark as booked
$bookedDays = array();
for ($i = 0; $i < 10; $i++) {
    $day = rand(1, $numDays);
    $bookedDays[] = array('day' => $day, 'month' => $month);
}

// Handle navigation between months
$prevYear = $year;
$prevMonth = $month - 1;
if ($prevMonth == 0) {
    $prevMonth = 12;
    $prevYear--;
}

$nextYear = $year;
$nextMonth = $month + 1;
if ($nextMonth == 13) {
    $nextMonth = 1;
    $nextYear++;
}
?>
<div class="calendar-container">
    <div class="calendar-header">
        <a href="?year=<?php echo $prevYear; ?>&month=<?php echo $prevMonth; ?>">Previous</a>
        <h1><?php echo $monthName . ' ' . $year; ?></h1>
        <a href="?year=<?php echo $nextYear; ?>&month=<?php echo $nextMonth; ?>">Next</a>
    </div>
    <table class="calendar-table">
        <thead>
            <tr>
                <?php foreach ($daysOfWeek as $day) : ?>
                    <th class="calendar-header"><?php echo substr($day, 0, 2); ?></th>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
            <?php
            $dayOfMonth = 1;
            $numRows = ceil(($numDays + $firstDay - 1) / 7);
            for ($i = 0; $i < $numRows; $i++) : ?>
                <tr>
                    <?php for ($j = 1; $j <= 7; $j++) : ?>
                        <?php if (($i == 0 && $j < $firstDay) || ($dayOfMonth > $numDays)) : ?>
                            <td></td>
                        <?php else : ?>
                            <?php $isBooked = false; ?>
                            <?php foreach ($bookedDays as $bookedDay) : ?>
                                <?php if ($bookedDay['day'] == $dayOfMonth && $bookedDay['month'] == $month) : ?>
                                    <?php $isBooked = true; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            <td class="<?php echo $isBooked ? 'booked' :
                                            ''; ?>"><?php echo $dayOfMonth; ?><?php if ($isBooked) : ?><span class="booked-text">BOOKED</span><?php endif; ?></td>
                            <?php $dayOfMonth++; ?>
                        <?php endif; ?>
                    <?php endfor; ?>
                </tr>
            <?php endfor; ?>
        </tbody>
    </table>

</div>


<?php get_footer() ?>