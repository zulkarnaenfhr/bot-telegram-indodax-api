<?php 
    $sumber = "https://indodax.com/api/tickers";
    $konten = file_get_contents($sumber);
    $data = json_decode($konten, true);
    $data = $data['tickers'];
?>

<?php 
    $arrayChatId = ['1062055729','1536466209','1087365447'];

    function sendRecomendtoBuy($msgRecomendtoBuy,$namaCoin,$lastPrice,$low24H,$buyPrice){
        // tinggal tambahin for
        global $arrayChatId;
        for ($i=0; $i < count($arrayChatId); $i++) { 
            // $msgRecomendtoBuy = "Recomend to Buy :%0a".$namaCoin."%0aLast Price : Rp ".number_format($lastPrice)."%0aLow 24H : Rp ".number_format($low24H)."%0aBuy Price : Rp ".number_format($buyPrice);
            $msgRecomendtoBuy = "Recomend to Buy :%0a".$namaCoin."%0aLow 24H : Rp ".number_format($low24H)."%0aBuy Price : Rp ".number_format($buyPrice);
            $api = "https://api.telegram.org/bot5073614406:AAEf7-M6-82p0WgCvS6RgzdMwiuorzMZnDo/sendmessage?chat_id=$arrayChatId[$i]&text=$msgRecomendtoBuy";
            $konten = file_get_contents($api);
            // $data = json_decode($konten, true);
        }
    }

    function sendRecomendtoSell($msgRecomendtoSell,$namaCoin,$lastPrice,$high24H,$sellPrice){
        global $arrayChatId;
        for ($i=0; $i < count($arrayChatId) ; $i++) { 
            // $msgRecomendtoSell = "Recomend to Sell :%0a".$namaCoin."%0aLast Price : Rp ".number_format($lastPrice)."%0aHigh 24H : Rp ".number_format($high24H)."%0aSell Price : Rp ". number_format($sellPrice);
            $msgRecomendtoSell = "Recomend to Sell :%0a".$namaCoin."%0aHigh 24H : Rp ".number_format($high24H)."%0aSell Price : Rp ". number_format($sellPrice);
            $api = "https://api.telegram.org/bot5073614406:AAEf7-M6-82p0WgCvS6RgzdMwiuorzMZnDo/sendmessage?chat_id=$arrayChatId[$i]&text=$msgRecomendtoSell";
            $konten = file_get_contents($api);
            // $data = json_decode($konten, true);
        }
    }
?>

<?php 
    foreach ($data as $row => $value) {
        $stringKosong = "";
        $batasAmanSell = $value['high'] * 1/100;
        $batasAmanSell = $batasAmanSell;
        if (($value['high'] - $value['last']) < $batasAmanSell) {
            sendRecomendtoSell($stringKosong,$row,$value['last'],$value['high'],$value['sell']);
        }
        // if ($value['high'] - $value['last'] == 0) {
        //     sendRecomendtoSell($stringKosong,$row,$value['last'],$value['high'],$value['sell']);
        // }
        
    }
    foreach ($data as $row => $value) {
        $stringKosong = "";
        $batasAmanBuy = $value['low'] * 1/100;
        $batasAmanBuy = $batasAmanBuy;
        if (($value['last'] - $value['low']) < $batasAmanBuy) {
            SendRecomendtoBuy($stringKosong,$row,$value['last'],$value['low'],$value['buy']);
        }
        // if ($value['last'] - $value['low'] == 0) {
        //     SendRecomendtoBuy($stringKosong,$row,$value['last'],$value['low'],$value['buy']);
        // }
    }
?>