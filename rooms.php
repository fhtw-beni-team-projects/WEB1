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
            <div class="feed" id="room-detail">


                <?php
                    $room = new room($_GET['room']);
                    $room->display_room(false);
                    if (isset($_GET['confirm'])) {
                        $order = new order();
                        $order->place_order();

                    } elseif (isset($_GET['order'])) {
                        $diff = date_diff(date_create($_POST['start']),date_create($_POST['end']));
                        $nights = $diff->format("%a");
                        $base = $room->room['price'] * $nights;
                        $total = $base;
                ?>
                <form method="post" action="?room=1&confirm" class="post main" id="order">
                    <div class="equal grid">
                        <p class="descr formleft"><?=$_POST['start']?> to <?=$_POST['end']?> (<?=$nights?> nights): </p><p class="descr formright">€ <?=$base?></p>
                            <?php
                            if ($_POST['breakfast']) {
                                $total += $nights * 10 * $room->room['beds'];
                                echo '<p class="descr formleft">Breakfast:</p><p class="descr formright">€ '. $nights * 10 * $room->room['beds'] .'</p>';
                            }
                            if ($_POST['parking']) {
                                $total += $nights * 5;
                                echo '<p class="descr formleft">Parking:</p><p class="descr formright">€ '. $nights * 5 .'</p>';
                            }
                            if ($_POST['pets']) {
                                $total += 20;
                                echo '<p class="descr formleft">Pet cleaning fee:</p><p class="descr formright">€ 20</p>';
                            }
                            ?>
                        <p class="descr formleft">Total:</p><p class="descr formright">€ <?=$total?></p>
                        <input type="hidden" name="room_id" value="<?=$_POST['room_id']?>">
                        <input type="hidden" name="start" value="<?=$_POST['start']?>">
                        <input type="hidden" name="end" value="<?=$_POST['end']?>">
                        <input type="hidden" name="breakfast" value="<?=$_POST['breakfast']?>">
                        <input type="hidden" name="parking" value="<?=$_POST['parking']?>">
                        <input type="hidden" name="pets" value="<?=$_POST['pets']?>">
                        <button type="submit" class="btn formright" name="formaction">Confirm order</button>
                        >
                    </div>
                </form>
                <?php
                    } else {
                ?>
                <form method="post" action="?room=1&order" class="post main" id="order">
                    <div class="equal grid">
                        <input type="hidden" name="room_id" value="<?=$room->id?>">
                        <label class="descr formleft" for="start">Start date: </label><input class="input formright forminput" type="date" name="start" />
                        <label class="descr formleft" for="end">End date: </label><input class="input formright forminput" type="date" name="end" />
                        <label class="descr formleft" for="breakfast">Include breakfast (+ €10/night/person): </label><input class="input formright forminput" type="checkbox" name="breakfast" />
                        <label class="descr formleft" for="parking">Include parking (+ €5   /night): </label><input class="input formright forminput" type="checkbox" name="parking" />
                        <label class="descr formleft" for="pets">Bring pets (+ €20 cleaning fee): </label><input class="input formright forminput" type="checkbox" name="pets" />
                        <button type="submit" class="btn formright" name="formaction">Preview order</button>
                    </div>
                </form>
                <?php } ?>
            </div>
        </div>
        <div class="feed" id="sidebar">
            
        </div>
        <?php
            } else {
        ?>
        <div class="grid maingrid" id="room_list">
            <div class="feed" id="rooms">
            <?php
            # filter is an associativ array with all table columns as possible filters
            # TODO: get request for filter
            
                $filter['max_beds'] = 4;

                $rooms = new room_list($filter);
    
                $rooms->list_rooms();
    
                ?>
    
            </div>
        </div>
        <?php } ?>
    </body>
</html>