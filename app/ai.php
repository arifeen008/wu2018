<?php

class AI
{
    public static function process($text)
    {
        $result = [
            'gender' => self::getGender($text),
            'sentiment' => self::getSentiment($text),
            'rude_words' => self::getRudeWords($text),
            'languages' => self::getLanguages($text),
        ];
        return $result;
    }

    /**
     * @return string 'Male' or 'Female' or 'Unknown'
     */
    public static function getGender($text)
    {
        $male = ["ครับ","ผม"];
        $female = ["ฉัน","ค่ะ","ว้าย"];

        for($i=0;$i < sizeof($male);$i++){
             if (strpos($text,$male[$i]) !== false) {
            return 'Male';
            }
        }
        for($i=0;$i < sizeof($female);$i++){
             if (strpos($text,$female[$i]) !== false) {
            return 'Female';
            }
        }
       return 'Unknown';
    }

    /**
     * @return string 'Positive' or 'Neutral' or 'Negative'
     */
    public static function getSentiment($text)
    {
        $Positive = ["มีความสุข","สบายใจ","อารมดี"];
        $Negative = ["เกรียจ","เศร้า","โกธร","อิจฉา"];
        for($i=0;$i < sizeof($Positive);$i++){
             if (strpos($text,$Positive[$i]) !== false) {
            return 'Positive';
            }
        }for($i=0;$i < sizeof($Negative);$i++){
             if (strpos($text,$Negative[$i]) !== false) {
            return 'Negative';
            }
        }
        return 'Neutral';
    }

    /**
     * @return array of all rude words in Thai
     */
    public static function getRudeWords($text)
    {
        $blacklist = ["ควย","เย็ด","เหี้ย","สัส","อีดอก"];
        $list = [];
        for($i=0;$i < sizeof($blacklist);$i++){
             if (strpos($text,$blacklist[$i]) !== false) {
                array_push($list,$blacklist[$i]);
            }
        }
        
        return $list;
    }

    /**
     * @return array of languages (TH, EN)
     */
    public static function getLanguages($text)
    {
        $result = [];
        if (preg_replace('/[ก-๛]+/u', '', $text)! ="") {
            array_push($result, 'TH');
        }
        
        if (preg_replace('/[a-z]+/u', '', $text)! ="") {
            array_push($result, 'EN');
        }
        return $result;
    
    }
}
