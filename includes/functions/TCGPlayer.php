<?php

class TCGPlayer {
    const PUBLICKEY = '9EA89293-8D6F-4B80-9A17-0898570627A0';
    const PRIVATEKEY = 'C9B24F78-7A9A-40C6-B8D9-D12D9228365D';
    const APPID = '4147';
    const VERSION = 'v1.20.0';

    public function getBearerToken() {
        // get tcg player bearer token
        $c = curl_init();
        $data = "grant_type=client_credentials&client_id=". self::PUBLICKEY ."&client_secret=". self::PRIVATEKEY;
        $header = array(
            'application/x-www-form-urlencoded'
        );
        curl_setopt($c, CURLOPT_URL, "https://api.tcgplayer.com/token");
        curl_setopt($c, CURLOPT_POST, 1);
        curl_setopt($c, CURLOPT_POSTFIELDS, $data);
        curl_setopt($c, CURLOPT_HTTPHEADER, $header);
        curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($c, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        $result = json_decode(curl_exec($c));
        curl_close($c);
        $bearer = $result->access_token;
        return $bearer;
    }

    public function getPricingbyId($id,$bearer) {
        // query tcgplayer to get buylist information
        $c = curl_init();
        $header = array(
            "Accept: application/json",
            "Authorization: bearer ".$bearer
        );
        curl_setopt($c, CURLOPT_URL, "http://api.tcgplayer.com/v1.19.0/pricing/buy/product/".$id);
        curl_setopt($c, CURLOPT_HTTPHEADER, $header);
        curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($c, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        $result = json_decode(curl_exec($c));
        curl_close($c);
        return $result;
    }

    public function getProductIdbyName($name,$bearer) {
        $qname = preg_replace('/\s+/', '%20', $name);
        // query tcgplayer to get buylist information
        $ch = curl_init();
        $cheader = array(
            "Accept: application/json",
            "Authorization: bearer ".$bearer
        );
        curl_setopt($ch, CURLOPT_URL, "http://api.tcgplayer.com/v1.19.0/catalog/products?productName=".$qname);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $cheader);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $tcgresult = json_decode(curl_exec($ch));
        curl_close($ch);
        $id = $tcgresult->results[0]->productId;
        return $id;
    }

}