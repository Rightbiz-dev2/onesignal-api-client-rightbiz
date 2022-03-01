<?php

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


      public function SendSms(){
        
            $content      = array(
                "en" => "Test sms from rezwan",
                "es" => "yeah this is just test from rezwan"
            );
            
             
    
            $fields = array(
                'app_id' => $this->app_id,
                // 'included_segments' => array('All'),
                "name" => "test only",
                'include_phone_numbers' => ["+8801759379616"],
                // "sms_media_urls" => ["https://cat.com/cat.jpg"],
                'contents' => $content,
                "sms_from" => "+19108123355",
            );
            
            $fields = json_encode($fields);
            
            
            $response = $this->InitApi($fields);
        
        return $response;
      }
}


?>