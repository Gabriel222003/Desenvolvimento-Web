<?php

    session_start();
    $usuario_autenticado = false;

    $usuario_id = null;

    $usuario_id_perfil = null;
    //Perfil com id = 1 (Admistrador) e Perfil com id = 2 (usuário)
    $usuarios_app = array(
        array('id'=> 1,'email' => 'adm@teste.com.br', 'senha' => '1234', 'perfil_id' => 1),
        array('id'=> 2,'email' => 'user@teste.com.br', 'senha' => '1234', 'perfil_id' => 1),
        array('id'=> 3,'email' => 'jose@teste.com.br', 'senha' => '1234', 'perfil_id' => 2),
        array('id'=> 4,'email' => 'maria@teste.com.br', 'senha' => '1234', 'perfil_id' => 2)
    );

    foreach($usuarios_app as $user){
        if($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha'] ){
            $usuario_autenticado = true;
            $usuario_id = $user['id'];
            $usuario_id_perfil = $user['perfil_id'];
        }
    }

    if($usuario_autenticado){
        echo 'Autenticado';
        $_SESSION['autenticado'] = 'SIM' ;
        $_SESSION['id'] = $usuario_id;
        $_SESSION['perfil_id'] = $usuario_id_perfil;

        header('Location: home.php');
    }else{
        $_SESSION['autenticado'] = 'NAO' ;
        header('Location: index.php?login=erro');
    }

?>