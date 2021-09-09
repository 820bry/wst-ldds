<?php
require_once(__DIR__."/config/session.php");
?>
<html>
    <head>
        <link rel="stylesheet" href="/wst-ldds/style/banner.css">

        <script src="/wst-ldds/scripts/banner.js" defer></script>
    </head>
    <body>
        <div class="banner" id="banner">
            <img class="logo "src="/wst-ldds/style/images/ldds-logo.png" alt="logo" />
            <a class="navbar" href="/wst-ldds/">Home</a>
            <a class="navbar" href="/wst-ldds/events/">Events</a>
            <a class="navbar" href="/wst-ldds/committee/">Committee</a>
            <a class="navbar" href="/wst-ldds/about-us/">About Us</a>

            <div class="dropdown">
                <img class="user-icon" src="/wst-ldds/style/images/user-icon.png" alt="user" />

                <div class="dropdown-content">
                    <?php
                        if (isset($_SESSION['permission_level'])) {
                            if ($_SESSION['permission_level'] == 0) {
                                //Member
                                $dropDown = '
                                    <div id="member">
                                        <a href="/wst-ldds/profile">Profile</a>
                                        <!-- <a href="#">My Events</a> -->
                                        <a href="#" onclick="signout()">Sign Out</a>
                                    </div>';
                            } else if ($_SESSION['permission_level'] == 1) {
                                //Admin
                                $dropDown = '
                                    <div id="member">
                                        <a href="/wst-ldds/profile">Profile</a>
                                        <!-- <a href="#">My Events</a> -->
                                        <a href="#" onclick="signout()">Sign Out</a>
                                    </div>
                                    <div id="admin">
                                        <a href="/wst-ldds/member_list/">View Member List</a>
                                        <a href="/wst-ldds/event_list/">View Event List</a>
                                    </div>';
                            } else {
                                //$_SESSION['permission_level'] defined but value invalid, assume anonymous user
                                $dropDown = '
                                    <div id="anonymous">
                                        <a href="/wst-ldds/login">Log In</a>
                                        <a href="/wst-ldds/signup">Sign Up</a>
                                    </div>';
                            }
                        } else {
                            //Anonymous user
                            $dropDown = '
                                <div id="anonymous">
                                    <a href="/wst-ldds/login">Log In</a>
                                    <a href="/wst-ldds/signup">Sign Up</a>
                                </div>';
                        }
                        
                        echo $dropDown;
                    ?>
                </div>
            </div>
        </div>

    </body>
</html>