<?php

    /*
    * This is example file.
    ! include "OneSignal.php";
    ! create an object: $Onesignal = new OneSignal();
    * Method You can call: 
    * 
    */
    include "OneSignal.php";

    $Onesignal = new OneSignal();

    // send to all su scribed users
    echo($Onesignal->sendPushToAllSubscribedUsers([
            "title" => "New messages from rezwan",
            "body" => "Please check your new message",
            "url" => "https://www.rightbiz.co.uk/member_secure/my_msg/messages.php",
            "big_picture" => "https://t4.ftcdn.net/jpg/03/17/25/45/360_F_317254576_lKDALRrvGoBr7gQSa1k4kJBx7O2D15dc.jpg"
        ]));

    //send to specfic users
    // echo($Onesignal->SendPushToUser(
    //     ["ae86df00-8428-11ec-9264-067d4a2de64a"],
    //     [
    //         "title" => "THis is single user title",
    //         "body" => "HI this is body for this notif",
    //         "url" => "https://www.google.com/"
    //     ]
    // ));
    
    // get all devices
    // echo ($Onesignal->getDevices());

    // view specific device info
    // echo ($Onesignal->viewDevice("ae86df00-8428-11ec-9264-067d4a2de64a"));

?>