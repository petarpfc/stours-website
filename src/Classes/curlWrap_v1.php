<?php
    use Illuminate\Support\Facades\URL;

    /**
     * Curl Wrap
     *
     * The Curl Wrap is the entry point to all services.
     */


    function curlWrap($entity, $sentData, $method, $content_type) {
    	if(!is_null(env('API_URL')))
    		$api_url = env('API_URL').'/'.$entity;
    	else{
    		$api_url = URL::to('/').'/api/' . $entity;
    	}
    	
    	
    	if ($content_type == NULL) {
            $content_type = "application/json";
        }
        if($entity == 'get-menu' || $entity == 'get-footer'){
        	$current_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        	
        	$trimmedUrl = (strstr($current_url, 'public/', true)); 
        	
        	if(is_null($api_url))
        		$send_url = (strstr($trimmedUrl, '/site', true));
        	else $send_url = $trimmedUrl;
        	$sentData['host_link'] = $send_url;
        }
        
        $data['data'] = $sentData;
        
        $prepared_data = json_encode($data, true);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
        curl_setopt($ch, CURLOPT_UNRESTRICTED_AUTH, TRUE);
        switch ($method) {
            case "POST":
                $url = $api_url;
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                curl_setopt($ch, CURLOPT_POSTFIELDS, $prepared_data);
                
                break;
            case "GET":
                $url = $api_url;
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
                break;
            case "PUT":
                $url = $api_url;
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                break;
            case "DELETE":
                $url = $api_url;
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
                break;
            default:
                break;
        }
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Content-type : $content_type;",
            'Accept : application/json'
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_TIMEOUT, 120);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $output = curl_exec($ch);
        curl_close($ch);

        //var_dump($output); exit();
        return $output;
    }
