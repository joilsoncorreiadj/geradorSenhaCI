<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gerador de senha</title>
    
    <style>
        body{
            font-family: 'Roboto', sans-serif;
        }
        .container {
            max-width: 400px;
            margin: 0 auto;
            display: flex;
            border: 1px solid #ccc;
        }
        .item {
            /* O flex: 1; é necessário para que cada item se expanda ocupando o tamanho máximo do container. */
            flex: 1;
            margin: 5px;
            background: tomato;
            text-align: center;
            font-size: 1.5em;
        }
        .row {
                flex-direction: row;
            }
        .boxAgenda{
            max-width: 320px;
            height: 160px;
            margin: 0 auto;
            margin:2px;
            border: 1px solid #C3C3C3;
            padding:5px;
            flex-direction: row;
        }
        .boxAgenda h4{
            flex:1;
            font-family: 'Roboto Black', sans-serif;
        }
    </style>
</head>
<body>
    <div class='cotainer row'>
   <?php
    setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
    date_default_timezone_set('America/Sao_Paulo');
    
    for ($i = 1; $i <= 550; $i++) { 
        $turno = null;
        if($i <= 50 )  $turno = 'Manhâ';
        if($i >= 51 && $i <= 100 ) $turno = 'Tarde';
        
        ?>
    <div class="item">
        <div class='boxAgendas'>
            <h2>Senha: <?php echo ($i < 10) ? '0'.$i : $i; ?></h2>
            <h3>
                <?php 
                
                echo strftime('%A, %d de %B de %Y', strtotime('today +5 days')); 
                
                ?>
            </h3>
            <p>Atendimento:<b> <?php  echo $turno; ?></b></p>
        </div>
    </div>
    <?php } ?>
    </div>
   
</body>
</html>