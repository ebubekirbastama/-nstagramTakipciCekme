<?php

set_time_limit(0);
$max_id = "";
$frienid = "";
$maxid="";
$cookie="";
$Csrftoken="";
$IgAppId="";
$XIgWwwClaim="";
$Asbid="";
        
for ($index = 0; $index < 5; $index++) {
    $veriler = İnstaVeriCek($max_id);
    foreach (json_decode($veriler)->users as $key => $value) {
        print_r($value->pk . " : " . $value->username . "</br>");
    }
    $max_id = $max_id + 12;
}

function İnstaVeriCek($maxid, $frienid, $cookie, $Csrftoken, $IgAppId, $XIgWwwClaim, $Asbid) {
    // Ebubekir Bastama https://www.ebubekirbastama.com
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'https://www.instagram.com/api/v1/friendships/' . $frienid . '/followers/?count=12&max_id=' . $maxid . '&search_surface=follow_list_page');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

    curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

    $headers = array();
    $headers[] = 'Authority: www.instagram.com';
    $headers[] = 'Cookie: ' . $cookie;
    $headers[] = 'Pragma: no-cache';
    $headers[] = 'Sec-Ch-Ua: \"Not?A_Brand\";v=\"8\", \"Chromium\";v=\"109\", \"Google Chrome\";v=\"109\"';
    $headers[] = 'Sec-Ch-Ua-Mobile: ?0';
    $headers[] = 'Sec-Ch-Ua-Platform: \"Windows\"';
    $headers[] = 'Sec-Fetch-Dest: empty';
    $headers[] = 'Sec-Fetch-Mode: cors';
    $headers[] = 'Sec-Fetch-Site: same-origin';
    $headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36';
    $headers[] = 'Viewport-Width: 2560';
    $headers[] = 'X-Asbd-Id: ' . $Asbid;
    $headers[] = 'X-Csrftoken: ' . $Csrftoken;
    $headers[] = 'X-Ig-App-Id: ' . $IgAppId;
    $headers[] = 'X-Ig-Www-Claim: ' . $XIgWwwClaim;
    $headers[] = 'X-Requested-With: XMLHttpRequest';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}
