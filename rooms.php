<?php require 'i/session_start.php'?>
<!DOCTYPE html>
<html>
    <head>
        <title>Rooms</title>
        <?php require 'i/head.php'?>
    </head>
    <body>
        <?php include 'i/navbar.php'?>
    
        <?php
            if(isset($_GET['room'])) {
        ?>
            <div class="grid maingrid" id="room_list">


        <?php
                $room = new room($_GET['room']);
                $room->display_room();
        ?>
            </div>
            <div class="feed" id="order">
                <!--
                    
                    TODO: Order Form

                    - class 'order' to handle backend

                    - associative array $order

                    - argument $profile_id for place_order() is user::user['profile_id']

                    - order::order['start'] and order::order['end'] are strings in format "YYYY-MM-DD"

                -->
            </div>
        </div>
        <?php
            } else {
        ?>
            <div class="grid maingrid" id="room_list">
                <div class="feed" id="rooms">
                <?php
                # filter is an associativ array with all table columns as possible filters
                # TODO: get request for filter
            
                    $rooms = new room_list($filter);
    
                    $rooms->list_rooms();
    
                    ?>
    
                </div>
            </div>
        <?php } ?>
  

    </body>
</html>