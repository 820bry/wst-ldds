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

    <link rel="stylesheet" href="/wst-ldds/style/event.css">
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
        <h2>Event</h2>

        

        <div class="event_list">

            <div id="holder" class="holder">
                    <div onmouseout = "unloadEventOptionBox(this)" class="edit" id="edit">
                        <div class="Edit" id="Edit">Edit</div>
                        <div class="dlt" id="dlt" onclick="loadConfirmationBox(this)">Delete</div>
                    </div>
                <div class="imgholder" id="imgholder">
                <img onmouseout = "unloadEventOptionBox(this)" src="../style/images/option.png" alt="logo" class="option" onclick="loadEventOptionBox(this)"/>
                    <div class=imgbox id="imgbox">
                        <img src="../style/images/committee/CZ.JPG" />
                    </div>
                    <div class="paragraphs" id="paragraphs">
                        <h3>Event 3</h3>
                        <p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.</p>
                    </div>
                </div>
            </div>

            <div id="holder" class="holder">
                    <div onmouseout = "unloadEventOptionBox(this)" class="edit" id="edit">
                        <div class="Edit" id="Edit">Edit</div>
                        <div class="dlt" id="dlt" onclick="loadConfirmationBox(this)">Delete</div>
                    </div>
                <div class="imgholder" id="imgholder">
                <img onmouseout = "unloadEventOptionBox(this)" src="../style/images/option.png" alt="logo" class="option" onclick="loadEventOptionBox(this)"/>
                    <div class=imgbox id="imgbox">
                        <img src="../style/images/committee/CZ.JPG" />
                    </div>
                    <div class="paragraphs" id="paragraphs">
                        <h3>Event 3</h3>
                        <p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.</p>
                    </div>
                </div>
            </div>

            <div id="holder" class="holder">
                    <div onmouseout = "unloadEventOptionBox(this)" class="edit" id="edit">
                        <div class="Edit" id="Edit">Edit</div>
                        <div class="dlt" id="dlt" onclick="loadConfirmationBox(this)">Delete</div>
                    </div>
                <div class="imgholder" id="imgholder">
                <img onmouseout = "unloadEventOptionBox(this)" src="../style/images/option.png" alt="logo" class="option" onclick="loadEventOptionBox(this)"/>
                    <div class=imgbox id="imgbox">
                        <img src="../style/images/committee/CZ.JPG" />
                    </div>
                    <div class="paragraphs" id="paragraphs">
                        <h3>Event 3</h3>
                        <p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.</p>
                    </div>
                </div>
            </div>

            <div id="holder" class="holder">
                    <div onmouseout = "unloadEventOptionBox(this)" class="edit" id="edit">
                        <div class="Edit" id="Edit">Edit</div>
                        <div class="dlt" id="dlt" onclick="loadConfirmationBox(this)">Delete</div>
                    </div>
                <div class="imgholder" id="imgholder">
                <img onmouseout = "unloadEventOptionBox(this)" src="../style/images/option.png" alt="logo" class="option" onclick="loadEventOptionBox(this)"/>
                    <div class=imgbox id="imgbox">
                        <img src="../style/images/committee/CZ.JPG" />
                    </div>
                    <div class="paragraphs" id="paragraphs">
                        <h3>Event 3</h3>
                        <p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.</p>
                    </div>
                </div>
            </div>

            <div id="holder" class="holder">
                    <div onmouseout = "unloadEventOptionBox(this)" class="edit" id="edit">
                        <div class="Edit" id="Edit">Edit</div>
                        <div class="dlt" id="dlt" onclick="loadConfirmationBox(this)">Delete</div>
                    </div>
                <div class="imgholder" id="imgholder">
                <img onmouseout = "unloadEventOptionBox(this)" src="../style/images/option.png" alt="logo" class="option" onclick="loadEventOptionBox(this)"/>
                    <div class=imgbox id="imgbox">
                        <img src="../style/images/committee/CZ.JPG" />
                    </div>
                    <div class="paragraphs" id="paragraphs">
                        <h3>Event 3</h3>
                        <p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.</p>
                    </div>
                </div>
            </div>

    <div class="footer">
        <p>Copyright (C) Literature, Dance & Drama Society</p>
    </div>

</body>

</html>