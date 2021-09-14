<?php
require_once('../banner.php');

if($_SERVER['REQUEST_METHOD'] == "GET") {
    if(isset($_GET['eventID'])) {
        require_once("./../config/conn.php");

        $id = $_GET['eventID'];

        $query = $conn->prepare("SELECT * FROM event WHERE id = ${id}");
        $query->execute();
        $result = $query ->get_result();

        if($result->num_rows == 1) {
            $eventInfo = $result->fetch_assoc();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.grey-orange.min.css" />
        <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>

        <script src="/wst-ldds/scripts/scrollbar.js" type="text/javascript"></script>
        <link rel="stylesheet" href="/wst-ldds/style/main.css">
        <link rel="stylesheet" href="/wst-ldds/style/events.css">
        <link rel="stylesheet" href="/wst-ldds/style/event_edit.css">
        <script src="/wst-ldds/scripts/events.js" type="text/javascript"></script>
        <title>Edit Event | LDDS</title>
    </head>

    <div class="content info-content">
        <div class="event-info">
            <table class="edit-table">
                <tr>
                    <td class="label">Event Name</td>
                    <td>
                        <input type="text" name="new_name" id="new_name" placeholder="Name" value="<?php echo $eventInfo['name']; ?>">
                    </td>
                </tr>
                <tr>
                    <td class="label">Event Description</td>
                    <td>
                        <textarea name="new_desc" id="new_desc"><?php echo $eventInfo['description']; ?></textarea>   
                    </td>
                </tr>
                <tr>
                    <td class="label"> Venue</td>
                    <td>
                        <input type="text" name="new_venue" id="new_venue" placeholder="test" value="<?php echo $eventInfo['venue']; ?>">
                    </td>
                </tr>
                <tr>
                    <td class="label">Capacity</td>
                    <td>
                        <input type="number" name="new_pic" id="new_pic "min="1" max="200" value="<?php echo $eventInfo['capacity']; ?>">
                    </td>
                </tr>
                <tr>
                    <td class="label">Person-in-Charge</td>
                    <td>
                        <select name="new_pic" id="new_pic">
                            <option value="default">Default</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="label">Other Details</td>
                    <td>
                        <label for="new_date">Date</label><br>
                        <input type="date" name="new_date" id="new_date" value="<?php echo $eventInfo['date']; ?>" /><br>
                        <label for="new_start_time">Start Time</label><br>
                        <input type="time" name="new_start_time" id="new_start_time" value="<?php echo $eventInfo['start_time']; ?>" /><br>
                        <label for="new_end_time">End Time</label><br>
                        <input type="time" name="new_end_time" id="new_end_time" value="<?php echo $eventInfo['end_time']; ?>" /><br>
                        <label for="new_deadline">Registration Deadline</label><br>
                        <input type="date" name="new_deadline" id="new_deadline" value="<?php echo $eventInfo['deadline']; ?>"/><br>
                    </td>
                </tr>
            </table>
            <input type="button" value="Submit">
        </div>
    </div>
</html>