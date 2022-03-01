<?php

    /*
    * This is example file.
    ! include "OneSignal.php";
    ! create an object: $Onesignal = new OneSignal();
    * Method You can call: 
    * 
    */
    // include "OneSignal.php";  // include onesignal file like this

    // $Onesignal = new OneSignal(); // create an object like this

    // send to all su scribed users
    // echo($Onesignal->sendPushToAllSubscribedUsers([
    //         "title" => "New messages from rezwan", //notif title
    //         "body" => "Please check your new message", // notif body msg
    //         "url" => "https://www.rightbiz.co.uk/member_secure/my_msg/messages.php",  // url you want to push on app
    //         "big_picture" => "https://t4.ftcdn.net/jpg/03/17/25/45/360_F_317254576_lKDALRrvGoBr7gQSa1k4kJBx7O2D15dc.jpg"
    //     ]));

    //send to specfic users
    // echo($Onesignal->SendPushToUser(
    //     ["ae86df00-8428-11ec-9264-067d4a2de64a"],
    //     [
    //         "title" => "THis is single user title", //notif title
    //         "body" => "HI this is body for this notif", //notif body msg
    //         "url" => "https://www.google.com/", // url you want to push on app
    //          "big_picture" => "https://t4.ftcdn.net/jpg/03/17/25/45/360_F_317254576_lKDALRrvGoBr7gQSa1k4kJBx7O2D15dc.jpg" // for add big image in notif, pass image url
    //     ]
    // ));
    
    // get all devices
    // echo ($Onesignal->getDevices());

    // view specific device info
    // echo ($Onesignal->viewDevice("ae86df00-8428-11ec-9264-067d4a2de64a")); // here you just need to pass appid.

?>