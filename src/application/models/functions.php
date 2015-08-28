<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Functions extends CI_Model {

    function __construct($table = '')
    {
        parent::__construct();
        date_default_timezone_set('Asia/Taipei');
    }

    function crypto_rand_secure($min, $max)
    {
        $range = $max - $min;
        if ($range < 0) return $min; // not so random...
        $log = log($range, 2);
        $bytes = (int) ($log / 8) + 1; // length in bytes
        $bits = (int) $log + 1; // length in bits
        $filter = (int) (1 << $bits) - 1; // set all lower bits to 1
        do {
            $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
            $rnd = $rnd & $filter; // discard irrelevant bits
        } while ($rnd >= $range);
        return $min + $rnd;
    }

    function get_token($length)
    {
        $token = "";
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
        $codeAlphabet.= "0123456789";
        for($i=0;$i<$length;$i++){
            $token .= $codeAlphabet[$this->crypto_rand_secure(0,strlen($codeAlphabet))];
        }
        $cnt = $this->db->where(array('unique_id' => $token))->from('my_reservations')->count_all_results();
        if($cnt > 0)
        {
            while($cnt > 0){
                for($i=0;$i<$length;$i++){
                    $token .= $codeAlphabet[$this->crypto_rand_secure(0,strlen($codeAlphabet))];
                }
                $cnt = $this->db->where(array('unique_id' => $token))->from('my_reservations')->count_all_results();
            }
        }
        return $token;
    }
}