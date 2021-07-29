<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.grey-orange.min.css" />
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" href="../style/main.css">
    <script src="../scripts/carousel.js" type="text/javascript"></script>
    <script src="../scripts/events.js" type="text/javascript"></script>
    <title>Events | LDDS</title>
</head>


<body>

    <div class="event_delete" id="event_delete">
        <div class="event_delete_window" id="event_delete_window">
            <div class="event_delete_text">
                <p>Are you sure want to delete?</p>
            </div>
            <div class="event_delete_button">
                <img class="cross" src="../style/images/cross.png" alt="logo" onclick="deleteEvent(false)">
                <img class="tick" src="../style/images/tick.png" alt="logo" onclick="deleteEvent(true)">
            </div>
        </div>
    </div>

    <div class="banner">
        <img src="../style/images/ldds-logo.png" alt="logo" />
        <a href="../">Home</a>
        <a href="../events/">Events</a>
        <a href="../committee/">Committee</a>
        <a href="../about-us/">About Us</a>
    </div>



    <div class="content">
        <h3>Event</h3>

        

        <div class="event_list">
            <div class="event">
                <div class="edit" id="event_option_box">
                    <div>Edit</div>
                    <div>Delete</div>
                </div>
                <div class="event_info_top">
                    <span>Event Name</span>
                    <img src="../style/images/option.png" alt="logo" class="option" onclick="loadEventOptionBox(this)"/>
                </div>
                <div class="event_info_btm">
                    <span>Details</span>
                </div>

            </div>

            <div class="event">
                <div class="edit">
                    <div>Edit</div>
                    <div>Delete</div>
                </div>
                <div class="event_info_top">
                    <span>Event Name</span>
                    <img src="../style/images/option.png" alt="logo" class="option" onclick="loadEventOptionBox(this)"/>
                </div>
                <div class="event_info_btm">
                    <span>Details</span>
                </div>
            </div>

            <div class="event">
                <div class="edit">
                    <div>Edit</div>
                    <div>Delete</div>
                </div>
                <div class="event_info_top">
                    <span>Event Name</span>
                    <img src="../style/images/option.png" alt="logo" class="option" onclick="loadEventOptionBox(this)"/>
                </div>
                <div class="event_info_btm">
                    <span>Details</span>
                </div>
            </div>

            <div class="event">
                <div class="edit">
                    <div>Edit</div>
                    <div>Delete</div>
                </div>
                <div class="event_info_top">
                    <span>Event Name</span>
                    <img src="../style/images/option.png" alt="logo" class="option" onclick="loadEventOptionBox(this)"/>
                </div>
                <div class="event_info_btm">
                    <span>Details</span>
                </div>
            </div>

            <div class="event">
                <div class="edit">
                    <div>Edit</div>
                    <div>Delete</div>
                </div>
                <div class="event_info_top">
                    <span>Event Name</span>
                    <img src="../style/images/option.png" alt="logo" class="option" onclick="loadEventOptionBox(this)"/>
                </div>
                <div class="event_info_btm">
                    <span>Details</span>
                </div>
            </div>

            <div class="event">
                <div class="edit">
                    <div>Edit</div>
                    <div>Delete</div>
                </div>
                <div class="event_info_top">
                    <span>Event Name</span>
                    <img src="../style/images/option.png" alt="logo" class="option" onclick="loadEventOptionBox(this)"/>
                </div>
                <div class="event_info_btm">
                    <span>Details</span>
                </div>
            </div>

        </div> 

        
    </div>

    <div class="footer">
        <p>Copyright (C) Literature, Dance & Drama Society</p>
    </div>

</body>

</html>