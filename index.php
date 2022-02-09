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
            "title" => "Boss I am Rezwan ",
            "body" => "How was going your work? :') , i setup completed this.",
            "url" => "https://www.google.com/"
        ]));

    // send to specfic users
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