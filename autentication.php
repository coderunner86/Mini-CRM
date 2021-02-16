<?php 
function autentication($curl_init, $endpoint_username, $endpoint_password)
{
    curl_setopt($curl_init, CURLOPT_USERPWD, $endpoint_username . ":" . $endpoint_password);
    curl_setopt($curl_init, CURLOPT_RETURNTRANSFER, true);
    try{
        $response = curl_exec($curl_init);
    }
    catch (Exception $e) {
        echo 'Catch error message: ' .$e->getMessage();
    
        if (curl_errno($curl_init)) {
            throw new Exception(curl_error($curl_init));
            print "Error accessing site: errno:  ".curl_error($curl_init);
    }
    }
    return json_decode($response);
}
?>