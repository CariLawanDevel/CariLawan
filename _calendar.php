<?php

include_once('_functioncalendar.php');

?>

<div class="card mb-4">
    <h5 class="card-header">Kalender</h5>
    <div class="card-body">
        <div id="calendar_div">
            <?php echo getCalender(); ?>
        </div>
    </div>
</div>