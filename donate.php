<?php
#-----------------------------------------------------------------------#
#                                                                       #
#       ________                                                        #
#     ___  __ \_____ ___      ________ _____  __ ___________      __    #
#     __  / / /  __ `/_ | /| / /_  __ `/_  / / / ___  __ \_ | /| / /    #
#     _  /_/ // /_/ /__ |/ |/ /_  /_/ /_  /_/ /____  /_/ /_ |/ |/ /     #
#     /_____/ \__,_/ ____/|__/ _\__, / _\__, /_(_)  .___/____/|__/      #
#                         /____/  /____/    /_/                         #
#                                                                       #
#    3/15/2017                                                          #
#    Checksum: c2071d260f20eb8e491bb1ad9f39a6b522995e83                 #
#                                                                       #
#-----------------------------------------------------------------------#

include('config.php');

$amt = htmlspecialchars($_POST['amount']);

function get_between($string, $start, $end)
{
    $string = ' ' . $string;
    $ini    = strpos($string, $start);
    if ($ini == 0)
        return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
}


if (in_array($amt, array(
    '5',
    '10',
    '20',
    '40'
))) {
    if ($_POST['processor'] === "paypal") {
        $post = array(
            'business' => $paypaladdress,
            'cmd' => '_xclick',
            'item_name' => 'Donation - $' . $amt . '',
            'item_number' => '0',
            'page_style' => $paypalstyle,
            'amount' => $amt,
            'currency_code' => 'USD',
            'cancel_return' => $cancel_url,
            'return' => $success_url,
            'submit' => '1'
            
        );
        
        
        
        
        $ch = curl_init();
        
        
        curl_setopt($ch, CURLOPT_URL, 'https://www.paypal.com/cgi-bin/webscr');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        
        
        $result = curl_exec($ch);
        
        $url = get_between($result, 'Location: ', 'Cache-Control');
        $url = str_replace("Content-Encoding: gzip", "", $url);
        
        curl_close($ch);
        
?>
   <script>var url = '<?php
        print($url);
?>';</script>
    <meta http-equiv="refresh" content="0; url=<?php
        print($url);
?>">
<?php
    }
    
    if ($_POST['processor'] === "other") {
        
        $url = 'https://api.processout.com/invoices';
        
        
        
        
        $ch = curl_init();
        
        
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_USERPWD, $accessproject . ":" . $accesskey);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "currency=USD&name=Donation&amount=" . $amt . "&statement_descriptor=US" . $amt . " at dawgyTIPS&return_url=" . $success_url . "&cancel_url=" . $cancel_url . "");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        
        $result = curl_exec($ch);
        
        $url = get_between($result, '"url":"', '","created_at"');
        
        curl_close($ch);
        
?>
   <script>var url = '<?php
        print($url);
?>';</script>
    <meta http-equiv="refresh" content="0; url=<?php
        print($url);
?>">
<?php
    }
}

?>
