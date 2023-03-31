<?php 
include "../controller/UsuarioController.php";
include '../Util.php';
//Util::verificar();

   $usuario = new UsuarioController();

  if(!empty($_GET['id'])){
    $usuario->deletar($_GET['id']);
    header("location: UsuarioList.php");
  }
  if(!empty($_POST)){
    $load = $usuario->pesquisar($_POST);

  } else {
    $load = $usuario->carregar();

  }
   //var_dump($load);
  // exit;
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
  </head>

  <body>
    <h1>Listagem de Usuários</h1>
    <form action="UsuarioList.php" method="post">
      <div class="container">
        <div class="row">
          <div class="col-2">
        <select name="campo" class="form-select">
          <option value="nome">Nome</option>
          <option value="telefone">Telefone</option>
        </select>
        </div>
            <div class="col-6">
            <input type="text" class="form-control" placeholder="Pesquisar" name="valor"/>
            <input type="bth btn-primary" type="submit" value="Buscar"/>
            <button><a href="UsuarioForm.php">Cadastrar</a></button>
            </div>
          </div>
        </div>

      
      
  </form>
  <table class="table table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nome</th>
      <th scope="col">Telefone</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Telefone</th>
        </tr>
    <?php 
    foreach($load as $item){
      echo"<tr>
            <td>$item->id</td>
            <td>$item->nome</td>
            <td>$item->telefone</td>
            <td><a href='./UsuarioForm.php?id=$item->id'>Editar</a></td>
            <td><a href='./UsuarioList.php?id=$item->id'
                    onclick='return confirm(\"Deseja Excluir?\")'
            >Excluir</a></td>
           </tr>";
    }
        ?>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
  </body>
</html>

