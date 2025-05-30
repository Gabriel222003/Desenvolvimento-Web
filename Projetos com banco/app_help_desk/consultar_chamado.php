<?php require_once('validor_acesso.php')?>

<?php

  $arquivo = fopen('../../app_help_desk/arquivo.hd', 'r');
  $chamado = array();

  while(!feof($arquivo)){

    $registro = fgets($arquivo);
    $valida_user = explode('#', $registro);

      // Valida se o registro não está vazio
    if($registro != ''){

      // Vê se o login não é de ADM e regsitra tudo se for ADM
      if($_SESSION['perfil_id'] == 1){
        $chamado[] = $registro;

      //Registra separadamente para cada usuário
      }elseif($_SESSION['id'] == $valida_user[0]){
          $chamado[] = $registro;
      }
    }


  }

  fclose($arquivo);

?>

<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>
      <ul class="navbar-nav">
        <li class="navbar-item">
          <a class="nav-link" href="logoff.php">SAIR</a>
        </li>
      </ul>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>
            
            <div class="card-body">
              
              <?php foreach($chamado as $chama){ ?>


                <?php 
                  
                  $chama_dados = explode('#', $chama);
                  /*
                  if($_SESSION['perfil_id'] == 2){
                    if($_SESSION['id'] != $chama_dados[0]){
                      continue;
                    }
                  }
                  */
                ?>

              <div class="card mb-3 bg-light">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $chama_dados[1]?></h5>
                  <h6 class="card-subtitle mb-2 text-muted"><?php echo $chama_dados[2]?></h6>
                  <p class="card-text"><?php echo $chama_dados[3] ?></p>

                </div>
              </div>

              <?php } ?>      
              <div class="row mt-5">
                <div class="col-6">
                  <a class="btn btn-lg btn-warning btn-block" href="home.php">Voltar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>