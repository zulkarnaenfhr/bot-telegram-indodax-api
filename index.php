<?php 
    $sumber = "https://indodax.com/api/tickers";
    $konten = file_get_contents($sumber);
    $data = json_decode($konten, true);
    $data = $data['tickers'];
?>

<?php 
    $arrayChatId = ['1062055729','1536466209','1087365447'];
    // $arrayChatId = ['1062055729'];

    // function sendRecomendtoBuy($msgRecomendtoBuy,$namaCoin,$lastPrice,$low24H,$buyPrice){
    //     // tinggal tambahin for
    //     global $arrayChatId;
    //     for ($i=0; $i < count($arrayChatId); $i++) { 
    //         $msgRecomendtoBuy = "Recomend to Buy :%0a".$namaCoin."%0aLast Price : Rp ".number_format($lastPrice)."%0aLow 24H : Rp ".number_format($low24H)."%0aBuy Price : Rp ".number_format($buyPrice);
    //         $api = "https://api.telegram.org/bot5073614406:AAEf7-M6-82p0WgCvS6RgzdMwiuorzMZnDo/sendmessage?chat_id=$arrayChatId[$i]&text=$msgRecomendtoBuy";
    //         $konten = file_get_contents($api);
    //         // $data = json_decode($konten, true);
    //     }
    // }

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
        for ($i=count($arrayDataBuy)/8; $i < count($arrayDataBuy)*2/8; $i++) { 
            $msg2 .= $arrayDataBuy[$i];
        }
        for ($i=count($arrayDataBuy)*2/8; $i < count($arrayDataBuy)*3/8; $i++) { 
            $msg3 .= $arrayDataBuy[$i];
        }
        for ($i=count($arrayDataBuy)*3/8; $i < count($arrayDataBuy)*4/8; $i++) { 
            $msg4 .= $arrayDataBuy[$i];
        }
        for ($i=count($arrayDataBuy)*4/8; $i < count($arrayDataBuy)*5/8; $i++) { 
            $msg5 .= $arrayDataBuy[$i];
        }
        for ($i=count($arrayDataBuy)*5/8; $i < count($arrayDataBuy)*6/8; $i++) { 
            $msg6 .= $arrayDataBuy[$i];
        }
        for ($i=count($arrayDataBuy)*6/8; $i < count($arrayDataBuy)*7/8; $i++) { 
            $msg7 .= $arrayDataBuy[$i];
        }
        for ($i=count($arrayDataBuy)*7/8; $i < count($arrayDataBuy)*8/8; $i++) { 
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

    // function sendRecomendtoSell($msgRecomendtoSell,$namaCoin,$lastPrice,$high24H,$sellPrice){
    //     global $arrayChatId;
    //     for ($i=0; $i < count($arrayChatId) ; $i++) { 
    //         $msgRecomendtoSell = "Recomend to Sell :%0a".$namaCoin."%0aLast Price : Rp ".number_format($lastPrice)."%0aHigh 24H : Rp ".number_format($high24H)."%0aSell Price : Rp ". number_format($sellPrice);
    //         $api = "https://api.telegram.org/bot5073614406:AAEf7-M6-82p0WgCvS6RgzdMwiuorzMZnDo/sendmessage?chat_id=$arrayChatId[$i]&text=$msgRecomendtoSell";
    //         $konten = file_get_contents($api);
    //         // $data = json_decode($konten, true);
    //     }
    // }

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
        for ($i=count($arrayDataSell)/8; $i < count($arrayDataSell)*2/8; $i++) { 
            $msg2 .= $arrayDataSell[$i];
        }
        for ($i=count($arrayDataSell)*2/8; $i < count($arrayDataSell)*3/8; $i++) { 
            $msg3 .= $arrayDataSell[$i];
        }
        for ($i=count($arrayDataSell)*3/8; $i < count($arrayDataSell)*4/8; $i++) { 
            $msg4 .= $arrayDataSell[$i];
        }
        for ($i=count($arrayDataSell)*4/8; $i < count($arrayDataSell)*5/8; $i++) { 
            $msg5 .= $arrayDataSell[$i];
        }
        for ($i=count($arrayDataSell)*5/8; $i < count($arrayDataSell)*6/8; $i++) { 
            $msg6 .= $arrayDataSell[$i];
        }
        for ($i=count($arrayDataSell)*6/8; $i < count($arrayDataSell)*7/8; $i++) { 
            $msg7 .= $arrayDataSell[$i];
        }
        for ($i=count($arrayDataSell)*7/8; $i < count($arrayDataSell)*8/8; $i++) { 
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
    $arrayDataSell = array();
    foreach ($data as $row => $value) {
        $msgRecomendtoSell = "";
        $batasAmanSell = $value['high'] * 1/100;
        $batasAmanSell = $batasAmanSell;
        if ($value['last'] > 1 && ($value['high'] - $value['last']) < $batasAmanSell) {
            $msgRecomendtoSell = "Recomend to Sell :%0a".$row."%0aLast Price : Rp ".number_format($value['last'])."%0aHigh 24H : Rp ".number_format($value['high'])."%0aSell Price : Rp ". number_format($value['sell'])."%0a%0a";
            array_push($arrayDataSell,$msgRecomendtoSell);
        }
        
    }
    splitRecomendtoSell();
    // echo count($arrayDataSell)." ";

    $arrayDataBuy = array();
    foreach ($data as $row => $value) {
        $msgRecomendtoBuy = "";
        $batasAmanBuy = $value['low'] * 1/100;
        $batasAmanBuy = $batasAmanBuy;

        if ($value['last'] > 1 && ($value['last'] - $value['low']) < $batasAmanBuy) {
            $msgRecomendtoBuy = "Recomend to Buy :%0a".$row."%0aLast Price : Rp ".number_format($value['last'])."%0aLow 24H : Rp ".number_format($value['low'])."%0aBuy Price : Rp ".number_format($value['buy'])."%0a%0a";
            array_push($arrayDataBuy,$msgRecomendtoBuy);
        }
    }
    splitRecomendtoBuy();
    // echo count($arrayDataBuy);
?>