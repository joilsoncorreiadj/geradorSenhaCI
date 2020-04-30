<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <style>
        body{
            font-family: 'Roboto', sans-serif;
            max-width: 800px;
            margin: 0 auto;
            /* background-color: tomato */
        }
        .row {
            flex-direction: row;
            justify-content: center;
            align-items: center;
        }
        .container {
            margin: 0 auto;
            display: flex;
            
        }
        /* Flex Item */
        .item {
            /* O flex: 1; é necessário para que cada item se expanda ocupando o tamanho máximo do container. */
            
            flex: 1;
            margin: 5px;
            text-align: center;
            font-size: 1.5em;
           
            display: flex;
            justify-content: center;
            align-items: center;
            
        }
        section.ultima{
            margin-top:100px;
        }
        .box{
            max-width: 160px;
            width: 100%;
            max-height: 140px;
            height: 120px;
            border: 1px solid #ccc;
            padding: 8px;
            
        }
        p{
            font-size: 12px;
            margin-top:10px;
        }
        h2{
            margin: -12px;
            font-size: 35px!important;
            font-weight: bold
        }
        h3{
            font-size: 18px;
            margin-top: 8px;
            margin-bottom: 10px;
        }
        h3.data{
            font-size:12px;
            margin-top: 15px;
            margin-bottom: -7px;
        }
        h1 {
            text-align: center;
            margin: 20px 0 0 0;
            font-size: 1.25em;
            font-weight: normal;
        }

        body {
            /* font-family: monospace; */
            font-family: 'Open Sans', sans-serif;
            color: #333;
        }
        p.semRegistro {
            padding: 10px;
            background-color: #bf2020fa;
            width: 100%;
            justify-content: center;
            align-items: center;
            display: flex;
            font-size: 15px;
            color: #fff;
        }
        @media print{
        .noprint{
            display:none;
        }
        }

        @page{
        size: auto;
        margin: 0mm;
        }
    </style>
</head>
<body>
<?php
    setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
    date_default_timezone_set('America/Sao_Paulo');
    $turno = 'Manhã';
?>
    <form method='GET' style='margin-bottom:30px; margin-top:60px;'  class="noprint">
        <label>Data Inicio</label>
        <input type='text' name='dta' id='data'  autocomplete='off' value=<?php echo ($_GET) ? $_GET['dta']:''; ?>>
        <label>Quantidade de senhas</label>
        <input type='text' name='qtdSenha'  value=<?php echo ($_GET) ? $_GET['qtdSenha']: 100; ?>>
        <button type='subimit'>Gerar</button>
        <button onclick="window.print()">Imprimir Senhas</button>
    </form>
    <section class="container row">
        <?php 
        $qtdSenha= 0;
        // $data = '05-05-2020';
        if($_GET){
            if($_GET['qtdSenha'] && !empty($_GET['qtdSenha'])){
                if(!empty($_GET['dta'])){
                    $qtdSenha = $_GET['qtdSenha'];
                    $days = $_GET['dta'];
                }else{
                    $qtdSenha = 0;
                    echo '<p class="semRegistro">E preciso informar uma data para ser gerado a senha</p>';
                }
                
            }else{
                $qtdSenha = 0;
                echo '<p class="semRegistro">E preciso informar uma quantidade para ser gerado a senha</p>';
            }
        }
        
        for ($i = 1; $i <= $qtdSenha; $i++) { 
            
            // $turno = null;
            if($i <= 50 )  $turno = 'Manhâ';
            if($i >= 51 && $i <= 100 ) $turno = 'Tarde';
            
            // (($i % 100) == 0) ? $days = $days +1 :  $days;
            
        ?>
        <div class="item">
            <div class='box'>
                <h3>Senha<?php //echo  $days; ?></h3>
                <h2><?php echo ($i < 10) ? '0'.$i : $i; ?></h2>
                <h3 class='data'>
                <?php echo utf8_encode(ucfirst(strftime('%A</br>%d de %B de %Y', strtotime($days)))); ?>
            </h3>
            <!-- <p>Atendimento</br><b style='font-size: 14px'> <?php  //echo $turno; ?></b></p> -->
            </div>
        </div>
        <?php 
        if(($i % 5) == 0){
            $ultima = (($i % 35) == 0) ? 'ultima': '';
            echo '</section><section class="container row '.$ultima.'">';
        }
    } 
    
    ?>
    </section>
    <div class='noprint' style='margin-bottom:80px;'>
        <button onclick="window.print()">Imprimir Senhas</button>
    </div>

  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#data" ).datepicker();
    $( "#data" ).datepicker( "option", "dateFormat", "dd-mm-yy", "showAnim", "drop" );
  } );
  </script>
</body>
</html>