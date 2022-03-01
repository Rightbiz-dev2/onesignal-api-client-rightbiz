<?php
    // -----------------instruction---------------------//
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
    // -----------------instruction---------------------//


class OneSignal
{
    private $api_key = "MTRhZWU4NzEtMjhkZS00ZDZmLTljYTEtYzI2NjUzZWI0MmY2";
    private $app_id = "13459cb6-bafa-402e-b308-a5689f9f4535";
    function __constructor(){
        
    }

    private function InitApi($fields){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json; charset=utf-8',
            'Authorization: Basic '.$this->api_key
            
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        
        $response = curl_exec($ch);
        curl_close($ch);
        
        return $response;
    }

    public function sendPushToAllSubscribedUsers($data = array()) {
        if (isset($data['title']) && isset($data['body']) && isset($data["url"])) {
        
            $heading = array(
                "en" => $data['title']
             );
            $content      = array(
                "en" => $data['body']
            );
            
            $fields = array(
                'app_id' => $this->app_id,
                'included_segments' => array(
                    'Subscribed Users'
                ),
                'data' => array(
                    "launch_url" => $data["url"]
                ),
                'contents' => $content,
                'headings' => $heading,
                "small_icon" => "ic_stat_onesignal_default",
                "big_picture" => isset($data['big_picture']) ? $data["big_picture"] : "",
                "android_accent_color" => "2464b3",
                "android_led_color" => "2464b3"
                
            );
            
            
            $fields = json_encode($fields);
            
            
            $response = $this->InitApi($fields);
        }else{
            $response = "Please Insert `title`, `body` and `url`";
        }
            
            return $response;
    }

    public function SendPushToUser($users_id = array(), $data = array()){
        if (isset($data['title']) && isset($data['body']) && isset($data["url"])) {
            $content      = array(
                "en" => $data['body']
            );
            $heading = array(
                "en" => $data['title']
             );
             
    
            $fields = array(
                'app_id' => $this->app_id,
                // 'included_segments' => array('All'),
                'include_player_ids' => $users_id,
                'data' => array(
                    "launch_url" => $data['url']
                ),
                'contents' => $content,
                'headings' => $heading,
                "small_icon" => "ic_stat_onesignal_default",
                "big_picture" => isset($data['big_picture']) ? $data["big_picture"] : "",
                "android_accent_color" => "2464b3",
                "android_led_color" => "2464b3"
            );
            
            $fields = json_encode($fields);
            
            
            $response = $this->InitApi($fields);
        }else{
            $response = "Please Insert `title`, `body` and `url`";
        }
        
        
        return $response;
    }

    public function getDevices(){ 
        $ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/players?app_id=" . $this->app_id); 
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 
                                                   'Authorization: Basic '.$this->api_key)); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); 
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        $response = curl_exec($ch); 
        curl_close($ch); 
        return $response; 
      }

    
      public function viewDevice($device_id){ 
        $ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/players/" .$device_id); 
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 
                                                   'Authorization: Basic '.$this->api_key)); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); 
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        $response = curl_exec($ch); 
        curl_close($ch); 
        return $response; 
      }

}


?>