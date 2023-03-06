<?php

    $secret = "c5mNPM0xWNNvg9qBQv4HyBZQOXSfbfLb";

    $encText = urlencode("찬란한 붉은빛 엠블렘[지능]");

    

    $url = "https://api.neople.co.kr/df/auction?itemName=".$encText."&wordType=front&apikey=".$secret;

    //echo $url;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);               //URL 지정하기
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);    //요청 결과를 문자열로 반환 
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);      //connection timeout 10초 
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);   //원격 서버의 인증서가 유효한지 검사 안함

    $response = curl_exec($ch);
    $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    curl_close($ch);

    if($status_code == 200){
        $result = json_decode($response, true);
        print_r($result);
        
    }else{
        echo "Error : ".$response;
    }

    /*
    var_dump($response);        //결과 값 출력
    print_r(curl_getinfo($ch)); //모든 정보 출력
    echo curl_errno($ch);       //에러 정보 출력
    echo curl_error($ch);       //에러 정보 출력
    */
    

?>
