<?php 
    $sumber = "https://indodax.com/api/tickers";
    $konten = file_get_contents($sumber);
    $data = json_decode($konten, true);
    $data = $data['tickers'];
?>

<?php 
    $arrayChatId = ['1062055729','1536466209','1087365447','1185684571'];

    function sendRecomendtoBuy($msgSendtoBuy){
        global $arrayChatId;

        for ($i=0; $i < count($arrayChatId); $i++) { 
            $api = "https://api.telegram.org/bot5073614406:AAEf7-M6-82p0WgCvS6RgzdMwiuorzMZnDo/sendmessage?chat_id=$arrayChatId[$i]&text=$msgSendtoBuy";
            $konten = file_get_contents($api);
        }
    }

    function splitRecomendtoBuy(){
        global $arrayDataBuy;
        $msg1 = "";
        $msg2 = "";
        $msg3 = "";
        $msg4 = "";
        $msg5 = "";
        $msg6 = "";
        $msg7 = "";
        $msg8 = "";
        for ($i=0; $i < count($arrayDataBuy)/8; $i++) { 
            $msg1 .= $arrayDataBuy[$i];
        }
        for ($i=ceil(count($arrayDataBuy)/8); $i < count($arrayDataBuy)*2/8; $i++) { 
            $msg2 .= $arrayDataBuy[$i];
        }
        for ($i=ceil(count($arrayDataBuy)*2/8); $i < count($arrayDataBuy)*3/8; $i++) { 
            $msg3 .= $arrayDataBuy[$i];
        }
        for ($i=ceil(count($arrayDataBuy)*3/8); $i < count($arrayDataBuy)*4/8; $i++) { 
            $msg4 .= $arrayDataBuy[$i];
        }
        for ($i=ceil(count($arrayDataBuy)*4/8); $i < count($arrayDataBuy)*5/8; $i++) { 
            $msg5 .= $arrayDataBuy[$i];
        }
        for ($i=ceil(count($arrayDataBuy)*5/8); $i < count($arrayDataBuy)*6/8; $i++) { 
            $msg6 .= $arrayDataBuy[$i];
        }
        for ($i=ceil(count($arrayDataBuy)*6/8); $i < count($arrayDataBuy)*7/8; $i++) { 
            $msg7 .= $arrayDataBuy[$i];
        }
        for ($i=ceil(count($arrayDataBuy)*7/8); $i < count($arrayDataBuy)*8/8; $i++) { 
            $msg8 .= $arrayDataBuy[$i];
        }
        sendRecomendtoBuy($msg1);
        sendRecomendtoBuy($msg2);
        sendRecomendtoBuy($msg3);
        sendRecomendtoBuy($msg4);
        sendRecomendtoBuy($msg5);
        sendRecomendtoBuy($msg6);
        sendRecomendtoBuy($msg7);
        sendRecomendtoBuy($msg8);
    }

    function sendRecomendtoSell($msgSendtoSell){
        global $arrayChatId;

        for ($i=0; $i < count($arrayChatId); $i++) { 
            $api = "https://api.telegram.org/bot5073614406:AAEf7-M6-82p0WgCvS6RgzdMwiuorzMZnDo/sendmessage?chat_id=$arrayChatId[$i]&text=$msgSendtoSell";
            $konten = file_get_contents($api);
        }
    }

    function splitRecomendtoSell(){
        global $arrayDataSell;
        $msg1 = "";
        $msg2 = "";
        $msg3 = "";
        $msg4 = "";
        $msg5 = "";
        $msg6 = "";
        $msg7 = "";
        $msg8 = "";

        for ($i=0; $i < count($arrayDataSell)/8; $i++) { 
            $msg1 .= $arrayDataSell[$i];
        }
        for ($i=ceil(count($arrayDataSell)/8); $i < count($arrayDataSell)*2/8; $i++) { 
            $msg2 .= $arrayDataSell[$i];
        }
        for ($i=ceil(count($arrayDataSell)*2/8); $i < count($arrayDataSell)*3/8; $i++) { 
            $msg3 .= $arrayDataSell[$i];
        }
        for ($i=ceil(count($arrayDataSell)*3/8); $i < count($arrayDataSell)*4/8; $i++) { 
            $msg4 .= $arrayDataSell[$i];
        }
        for ($i=ceil(count($arrayDataSell)*4/8); $i < count($arrayDataSell)*5/8; $i++) { 
            $msg5 .= $arrayDataSell[$i];
        }
        for ($i=ceil(count($arrayDataSell)*5/8); $i < count($arrayDataSell)*6/8; $i++) { 
            $msg6 .= $arrayDataSell[$i];
        }
        for ($i=ceil(count($arrayDataSell)*6/8); $i < count($arrayDataSell)*7/8; $i++) { 
            $msg7 .= $arrayDataSell[$i];
        }
        for ($i=ceil(count($arrayDataSell)*7/8); $i < count($arrayDataSell)*8/8; $i++) { 
            $msg8 .= $arrayDataSell[$i];
        }
        sendRecomendtoSell($msg1);
        sendRecomendtoSell($msg2);
        sendRecomendtoSell($msg3);
        sendRecomendtoSell($msg4);
        sendRecomendtoSell($msg5);
        sendRecomendtoSell($msg6);
        sendRecomendtoSell($msg7);
        sendRecomendtoSell($msg8);
    }
?>

<?php 
    $arrayDataBuy = array();
    $arrayDataSell = array();
    foreach ($data as $row => $value) {
        $msgRecomendtoSell = "";
        $batasAmanSell = $value['high'] * 1/100;
        $isHigh = ($value['high'] - $value['last']);

        $msgRecomendtoBuy = "";
        $batasAmanBuy = $value['low'] * 1/100;
        $isLow = ($value['last'] - $value['low']);


        if ($value['last'] < 2) {
            $valueLast = number_format($value['last'],7,",",".");
        }else {
            $valueLast = number_format($value['last']);
        }

        if ($value['high'] < 2) {
            $valueHigh = number_format($value['high'],7,",",".");
        }else {
            $valueHigh = number_format($value['high']);
        }

        if ($value['sell'] < 2) {
            $valueSell = number_format($value['sell'],7,",",".");
        }else {
            $valueSell = number_format($value['sell']);
        }

        // batas msg rekomen buy
        if ($value['low'] < 2) {
            $valueLow = number_format($value['low'],7,",",".");
        }else {
            $valueLow = number_format($value['low']);
        }

        if ($value['buy'] < 2) {
            $valueBuy = number_format($value['buy'],7,",",".");
        }else {
            $valueBuy = number_format($value['buy']);
        }

        if ($isHigh<$isLow && ($value['high'] - $value['last']) < $batasAmanSell) {
            $msgRecomendtoSell = "Recommend  to Sell :%0a".$row."%0aLast Price : ".$valueLast."%0aHigh 24H : ".$valueHigh."%0aSell Price : ". $valueSell."%0a%0a";
            array_push($arrayDataSell,$msgRecomendtoSell);
        }

        if ($isLow<$isHigh && ($value['last'] - $value['low']) < $batasAmanBuy) {
            $msgRecomendtoBuy = "Recommend  to Buy :%0a".$row."%0aLast Price : ".$valueLast."%0aLow 24H : ".$valueLow."%0aBuy Price : ".$valueBuy."%0a%0a";
            array_push($arrayDataBuy,$msgRecomendtoBuy);
        }
    }
    splitRecomendtoSell();
    splitRecomendtoBuy();

    echo 'only telegram bot can access this, visit <a href="http://t.me/Monitoring_Cryptocurrency_bot">t.me/Monitoring_Cryptocurrency_bot</a>';
?>

