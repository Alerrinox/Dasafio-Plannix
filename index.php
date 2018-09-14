<!doctype html>
<!-- Desafio Plannix 
      Nome do candidato: Rafael Barros de Oliveira
      E-Mail:            rafaelbarros2007@gmail.com

  Projeto feito com CDN bootStrap e PHP.
-->
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Pokémon!</title>
  </head>
  <body>

    <!-- conteúdo principal --> 
    <div class="container">
      <div class="jumbotron">
        <h1 class="display-4">Seja bem vindo treinador! </h1>
        <p class="lead">Bem vindo ao mundo Pokémon, um universo livre e repleto de aventura.</p>
      </div>

      <div class="container">
        <div class="panel panel-default">
          <div class="panel-heading">Buscar pokemon</div>
          <form>
              <input type="text" name="Pesquisa_de_Pokemon">
              <input type="submit" value="Pesquisar Pokemon">
          </form>
          <div class="panel-body">

            <?php
            if (isset($_GET['Pesquisa_de_Pokemon'])) {
                

              $PokemonProcurado = $_GET['Pesquisa_de_Pokemon'];
              $dados = file_get_contents("https://pokeapi.co/api/v2/pokemon/?limit=949");
              $arrayDePokemons = json_decode($dados, true);
              $pokemon = $arrayDePokemons['results'];
              
              foreach ($pokemon as $key => $value) {
                if ($PokemonProcurado === $value['name'] || (((int)$PokemonProcurado) - 1) == $key) {
                  
                  echo (" Id: ".($key + 1)."<br> Nome: ".$value['name']."<br> Tipo: ??");

                  break;
                }
              }
            }
            ?>
          </div>
        </div>
      </div>

    </div>

    <!-- ------------------------------------------------------------------- -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- ------------------------------------------------------------------- -->

    <!-- Optional JavaScript -->
    <!-- JavaScript -->
    <!-- <script src="scripts/javaScript.js"></script>  -->
    <!-- CDN AXIOS -->
    <!--  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>  -->
    <!-- ------------------------------------------------------------------- -->
    
  </body>
</html>