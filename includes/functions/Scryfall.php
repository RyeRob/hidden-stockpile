<?php

class Scryfall {
    public function getCardByName($card) {
        // find the name and info of a card based on its name; supports 'fuzzy search'
        $scard = preg_replace('/\s+/', '+', $card);
        $c = curl_init();
        $header = array(
            "Accept: application/json",
        );
        curl_setopt($c, CURLOPT_URL, "https://api.scryfall.com/cards/named?fuzzy=".$scard);
        curl_setopt($c, CURLOPT_HTTPHEADER, $header);
        curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($c, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        $result = json_decode(curl_exec($c));
        curl_close($c);
        return $result;
    }

    public function getAllPrintedVersionsofCards($name) {
        // find all printed versions of cards based on their name as it is exactly printed
        $c = curl_init();
        $header = array(
            "Accept: application/json",
        );
        curl_setopt($c, CURLOPT_URL, 'https://api.scryfall.com/cards/search?unique=prints&q=!"'.$name.'"');
        curl_setopt($c, CURLOPT_HTTPHEADER, $header);
        curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($c, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        $result = json_decode(curl_exec($c));
        curl_close($c);
        return $result;
    }


}