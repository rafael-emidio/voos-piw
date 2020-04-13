<!DOCTYPE html>
<html>
<?php
    require('conexao.php');
?>
<head>
    <title>Gestão de vendas de passagens aéreas</title>
    <link rel="icon" href="img/icon.ico" type="image/x-icon" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/903500f45c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="js/busca.js" type="text/javascript"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="assets/css/Footer-with-button-logo.css">
</head>

<body>
    <?php
    include('menu.php');
    ?>
    <br/><br/>
    <div class="content">
        <div class="row" id="row-main">
            <div class="col-md-3 sidebar-nav-fixed affix" id="sidebar-left" style="margin-left: 10px;">
                <img src="img/anuncio1.png">
            </div>
            <div class="col-md-6" id="content">
                <?php
                    $link = "";
                    if (isset($_REQUEST["link"])) {
                       $link = $_REQUEST["link"];
                    }

                    switch ($link) {
                        case "info":
                            include 'info.php';
                            break;
                        case "fale":
                            include 'fale.php';
                            break;
                        case "faq":
                            include 'faq.php';
                            break;
                        case "tel":
                            include 'tel.php';
                            break;
                        case "checkin":
                            include 'checkin.php';
                            break;
                        case "checkin1":
                            include 'checkin1.php';
                            break;
                        case "aviao":
                            include 'aviao.php';
                            break;
                        case "voo":
                            include 'voo.php';
                            break;
                        case "ocupacao":
                            include 'ocupacao.php';
                            break;
                        case "venda":
                            include 'venda.php';
                            break;
                        case "vendaPass":
                            include 'vendaPass.php';
                            break;
                        case "vender":
                            include 'vender.php';
                            break;
                        case "relVenda":
                            include 'relVenda.php';
                            break;
                        case "relOcupacao":
                            include 'relOcupacao.php';
                            break;
                        default:
                            include 'home.php';
                    }
                ?>

           </div>
       </div>
   </div>



   <br/><br/>
   <?php
   include('footer.php');
   ?>
</body>

</html>
