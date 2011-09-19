<?php
// cURL //
class cURL {
    var $headers;
    var $user_agent;
    var $compression;
    var $cookie_file;
    var $proxy;
           
    function cURL($cookies=TRUE,$cookie='cookie.txt',$compression='gzip',$proxy='') {
        $this->headers[] = 'Accept: image/gif, image/x-bitmap, image/jpeg, image/pjpeg';
        $this->headers[] = 'Connection: Keep-Alive';
        $this->headers[] = 'Content-type: application/x-www-form-urlencoded;charset=UTF-8';
        $this->user_agent = 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; .NET CLR 1.0.3705; .NET CLR 1.1.4322; Media Center PC 4.0)';
        $this->compression=$compression;
        $this->proxy=$proxy;
        $this->cookies=$cookies;
        if ($this->cookies == TRUE) $this->cookie($cookie);
    }

    function cookie($cookie_file) {
        if (file_exists($cookie_file)) {
        $this->cookie_file=$cookie_file;
        } else {
        @fopen($cookie_file,'w+') or $this->error('The cookie file could not be opened. Make sure this directory has the correct permissions');
        $this->cookie_file=$cookie_file;
        @fclose($this->cookie_file);
        }
    }
    function get($url,$ref="",$user="",$pass="",$hash="",$ssl=false) {
        $process = curl_init($url);
        if($ref=="") {
            $ref=$url;
        }
        
        
        curl_setopt($process, CURLOPT_USERAGENT, $this->user_agent);
        if($ssl==true) {
            @curl_setopt($process, CURLOPT_SSL_VERIFYHOST,0);
            # Allow certs that do not match the domain
             @curl_setopt($process, CURLOPT_SSL_VERIFYPEER,0);
        }
        if(($user!="")&&($pass!="")) {
            $header[0] = "Authorization: Basic " . base64_encode($user.":".$pass) . "\n\r";
            @curl_setopt($process, CURLOPT_HTTPHEADER, $header);   
        } elseif(($user!="")&&($hash!="")) {
             $header[0] = "Authorization: WHM ".$user.":" . preg_replace("'(\r|\n)'","",$hash);
             # Remove newlines from the hash
             curl_setopt($process,CURLOPT_HTTPHEADER,$header); 
        }  else {
            curl_setopt($process, CURLOPT_HTTPHEADER, $this->headers); 
            curl_setopt($process, CURLOPT_HEADER, 0);
        }
        
        curl_setopt($process, CURLOPT_REFERER,$ref);         
        if ($this->cookies == TRUE) curl_setopt($process, CURLOPT_COOKIEFILE, $this->cookie_file);
        if ($this->cookies == TRUE) curl_setopt($process, CURLOPT_COOKIEJAR, $this->cookie_file);
        curl_setopt($process,CURLOPT_ENCODING , $this->compression);
        curl_setopt($process, CURLOPT_TIMEOUT, 30);
        if ($this->proxy) curl_setopt($process, CURLOPT_PROXY, $this->proxy);
        curl_setopt($process, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($process, CURLOPT_FOLLOWLOCATION, 1);
        $return = curl_exec($process);
        curl_close($process);
        return $return;
    }

    function post($url,$data,$ref="",$user="",$pass="",$hash="",$ssl=false) {
        if($ref=="") {
            $ref=$url;
        }        
        $process = curl_init($url);
        if($ssl==true) {
            @curl_setopt($process, CURLOPT_SSL_VERIFYHOST,0);
            # Allow certs that do not match the domain
             @curl_setopt($process, CURLOPT_SSL_VERIFYPEER,0);
        }
        if(($user!="")&&($pass!="")) {
            $header[0] = "Authorization: Basic " . base64_encode($user.":".$pass) . "\n\r";
            @curl_setopt($process, CURLOPT_HTTPHEADER, $header);   
        } elseif(($user!="")&&($hash!="")) {
             $header[0] = "Authorization: WHM ".$user.":" . preg_replace("'(\r|\n)'","",$hash);
             # Remove newlines from the hash
             curl_setopt($process,CURLOPT_HTTPHEADER,$header); 
        }  else {
            curl_setopt($process, CURLOPT_HTTPHEADER, $this->headers); 
            curl_setopt($process, CURLOPT_HEADER, 0);
        }
         
        curl_setopt($process, CURLOPT_USERAGENT, $this->user_agent);
        curl_setopt($process, CURLOPT_REFERER,$ref);            
        if ($this->cookies == TRUE) curl_setopt($process, CURLOPT_COOKIEFILE, $this->cookie_file);
        if ($this->cookies == TRUE) curl_setopt($process, CURLOPT_COOKIEJAR, $this->cookie_file);
        curl_setopt($process, CURLOPT_ENCODING , $this->compression);
        curl_setopt($process, CURLOPT_TIMEOUT, 30);
        if ($this->proxy) curl_setopt($process, CURLOPT_PROXY, $this->proxy);
        curl_setopt($process, CURLOPT_POSTFIELDS, $data);
        curl_setopt($process, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($process, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($process, CURLOPT_POST, 1);
        $return = curl_exec($process);
        curl_close($process);
        return $return;
    }
    function error($error) {           
        echo "<center><div style='width:500px;border: 3px solid #FFEEFF; padding: 3px; background-color: #FFDDFF;font-family: verdana; font-size: 10px'><b>cURL Error</b><br>$error</div></center>";
        die;
    }
    
    function cpanel($user,$hash,$ip,$cmd,$port=2086) {
        $whmusername = $user;
        $whmhash = $hash;
        # some hash value
        if($port==2086) {
            $http="http://"; 
        }else {
            $http="https://";
        }
        $query = $http.$ip.":".$port."/".$cmd;

        $curl = curl_init();
        # Create Curl Object
        @curl_setopt($curl, CURLOPT_SSL_VERIFYHOST,0);
        # Allow certs that do not match the domain
        @curl_setopt($curl, CURLOPT_SSL_VERIFYPEER,0);
        # Allow self-signed certs
        @curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
        # Return contents of transfer on curl_exec
        $header[0] = "Authorization: WHM ".$whmusername.":" . preg_replace("'(\r|\n)'","",$whmhash);
        # Remove newlines from the hash
        curl_setopt($curl,CURLOPT_HTTPHEADER,$header);
        # Set curl header
        curl_setopt($curl, CURLOPT_URL, $query);
        # Set your URL
        $result = curl_exec($curl);
        # Execute Query, assign to $result
        if ($result == false) {
            error_log("curl_exec threw error \"" . curl_error($curl) . "\" for $query");
        }
        curl_close($curl);

        return $result;
    }
}


?>