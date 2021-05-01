<?php
	
	/**
		You need to modify the following parameters
			::Bot Token::
	 **/
	 
class AntiSougouSGKBot{
	
    public static function Captcha(string $chatid): int
    {
        
        $Links = 'https://api.telegram.org/bot' . '::Bot Token::' . '/' . 'getChatMember?chat_id=@Sougou111&user_id=' . $chatid;
		
		//$Links = sprintf('https://api.telegram.org/bot%s/getChatMember?chat_id=@Sougou111&user_id=%s', '::Bot Token::', $chatid);
		
        $ch           = curl_init();
        curl_setopt($ch, CURLOPT_URL, $Links);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_NOSIGNAL, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 3);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.146 Safari/537.36');
        $response = curl_exec($ch);
        curl_close($ch);
        
        $response = json_decode($response,true);
        
        if($response['ok'] !== true){
            return 0;
        }elseif($response['result']['status'] == 'left' || $response['result']['status'] == 'kicked'){
            return 1;//Users who left the supergroup or were kicked out
        }
        
        return 0;
    }
	
}
