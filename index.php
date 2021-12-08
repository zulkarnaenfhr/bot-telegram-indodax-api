<?php 
    $sumber = "https://indodax.com/api/tickers";
    $konten = file_get_contents($sumber);
    $data = json_decode($konten, true);
    $data = $data['tickers'];
?>

<?php 
    $arrayChatId = ['1062055729','1536466209','1087365447'];

    function sendRecomendtoBuy($msgRecomendtoBuy,$namaCoin,$low24H,$buyPrice){
        // tinggal tambahin for
        global $arrayChatId;
        for ($i=0; $i < count($arrayChatId); $i++) { 
            $msgRecomendtoBuy = "Recomend to Buy :%0a".$namaCoin."%0aLow 24H : ".$low24H."%0aBuy Price : ".$buyPrice;
            $api = "https://api.telegram.org/bot5073614406:AAEf7-M6-82p0WgCvS6RgzdMwiuorzMZnDo/sendmessage?chat_id=$arrayChatId[$i]&text=$msgRecomendtoBuy";
            $konten = file_get_contents($api);
            $data = json_decode($konten, true);
        }
    }

    function sendRecomendtoSell($msgRecomendtoSell,$namaCoin,$high24H,$sellPrice){
        global $arrayChatId;
        for ($i=0; $i < count($arrayChatId) ; $i++) { 
            $msgRecomendtoSell = "Recomend to Sell :%0a".$namaCoin."%0aHigh 24H : ".$high24H."%0aSell Price : ".$sellPrice;
            $api = "https://api.telegram.org/bot5073614406:AAEf7-M6-82p0WgCvS6RgzdMwiuorzMZnDo/sendmessage?chat_id=$arrayChatId[$i]&text=$msgRecomendtoSell";
            $konten = file_get_contents($api);
            $data = json_decode($konten, true);
        }
    }
?>

<?php 
    header( "refresh:10" );
?>

<?php 
    foreach ($data as $row => $value) {
        $msgRecomendtoSell = "";
        if ($value['high'] - $value['last'] == 0) {
            sendRecomendtoSell($msgRecomendtoSell,$row,$value['high'],$value['sell']);
        }
        if ($value['last'] - $value['low'] == 0) {
            SendRecomendtoBuy($msgRecomendtoSell,$row,$value['high'],$value['sell']);
        }
    }

?>

<!-- <!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <div id="Timer"></div>

        <script>
            var timeLeft = 30;
            var elem = document.getElementById("Timer");

            var timerId = setInterval(countdown, 1000);

            function countdown() {
                if (timeLeft == 0) {
                    clearTimeout(timerId);
                } else {
                    elem.innerHTML = timeLeft + " seconds remaining";
                    timeLeft--;
                }
            }
        </script>
    </body>
</html> -->