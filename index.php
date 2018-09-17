<!doctype html>
<!-- Desafio Plannix 
      Nome do candidato: Rafael Barros de Oliveira
      E-Mail:            rafaelbarros2007@gmail.com
      GitHub:            https://github.com/Alerrinox

  Projeto feito com CDN bootStrap e PHP.
-->
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- CSS da Pasta CSS, também tem a versão minificada (site de minificação https://cssminifier.com/)  -->
    <link rel="stylesheet" type="text/css" href="css/style.min.css">

    <title>Pokémon!</title>
  </head>
  <body>

    <!-- conteúdo principal -->
    <!-- NAVBAR -->
      <nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#000; height: 56px;">
        <a href="#" class="d-inline-block align-top logo"></a>
      </nav>
      <hr class="linhaBranca">
      <div class="jumbotron CssTransparencia">
        <h1 class="display-4 ConteudoJumbotron">Seja bem vindo treinador! </h1>
        <p class="lead ConteudoJumbotron">Bem vindo ao mundo Pokémon, um universo livre e repleto de aventura.</p>
      </div>
    
      <div class="container">
          <!-- formulário de envio pra "Pesquisa_de_Pokemon" --> 
          <form class="formulario">
            <div class="form-group">
              <label for="pokedex" class="CssColor">Pesquisa Pokédex</label><br>
              <input class="CorInput form-control col-md-4" type="text" id="pokedex" name="Pesquisa_de_Pokemon" placeholder="Digite o nome ou o número do pokémon">
            </div>
            <div class="form-group ">
              <input class="btn btn-secondary" type="submit" value="Pesquisar Pokemon">
            </div>
          </form>

          <div class="container">
            <div class="text-center">
              <div class="PaiPHP">
                <!-- Imagem da pokedex -->
                  <img src="img/Pokédex_Kanto.png" class="rounded" alt="...">

                  <!---------------------------------------------------------------------------------------->
                  <!------------------------- Código para buscar pokemon em PHP ---------------------------->
                  <!---------------------------------------------------------------------------------------->
                  <?php

                    #---- isset pra tratamento de erro no primeiro carregamento ----
                    if (isset($_GET['Pesquisa_de_Pokemon'])) {

                      try {
                      
                      #---- variável do formalário responsável pela pesquisa ----
                      $PokemonProcurado = $_GET['Pesquisa_de_Pokemon'];

                      #---- (49) requerindo da url, (50) convertendo o json pra vetor, (51) armazenando em uma variável pra pesquisa no vetor ----
                      ///////////---ALERTA : Esta lista é a nacional, ou seja tem todos os 949 pokémons pode se que atrase no carregamento--- //////////
                      ///////////---ALERTA : Caso queria trabalhar com menos Pokémon basta colocar o número de pokémons menor em /?limit= XXX ---//////////
                      $dados = file_get_contents("https://pokeapi.co/api/v2/pokemon/?limit=949"); 
                      $arrayDePokemons = json_decode($dados, true);
                      $pokemon = $arrayDePokemons['results'];
                      #---- foreach correndo vetor o pokemon na URL pokemon/national/  ----
                      foreach ($pokemon as $key => $value) {
                         #--- comparando pokémon do Formulário pelo o nome OU pelo número de ID ---
                        if (strtolower($PokemonProcurado) === $value['name'] || (((int)$PokemonProcurado) - 1) == $key) {

                          #--- Acessando dados do Pokemon direto da URL do seu registro --- 
                          $dados = file_get_contents($value['url']);
                          $arrayDoPokemon = json_decode($dados, true);

                          #---- Printando na tela os dados na pesquisa / o número do pokémon  / nome do pokémon / e o tipo que esta no while logo a baixo -----
                          echo ('<div class="PositionID"><span> ID: '.($key + 1)."</span></div>");
                          echo ('<div class="PositionNome">  Nome: '.$value['name']."</div>");

                           #---- Printando a imagem do pokemon /sprites/front_default -----
                          $dados = file_get_contents($arrayDoPokemon['forms'][0]['url']);
                          $arrayDaformaDoPokemon = json_decode($dados, true);
                          $url = $arrayDaformaDoPokemon['sprites']['front_default'];

                          echo '<div class="FormaFisica"><img src='.$url."></div>";


                          #------- Alguns dos pokémons tem mais de um tipo e o while irá verificar se tem que todos o types foram exibidos -------- 
                            $countControl = 0;
                          while (isset($arrayDoPokemon['types'][ $countControl ]["type"]['name'])){
                            # printando tipo ou tipos
                            echo ("<div class='PositionTipo".$countControl."'>".$arrayDoPokemon['types'][ $countControl ]["type"]['name']."</div>");

                              $countControl++;
                          }
                          
                          # -- Break esta aqui pra evitar percorre o vetor todo sem necessidade --
                          break;
                        }
                      }

                      } catch (Exception $e) {  }
                    }

                  ?>
                </div>
              </div>
            </div>
        <!---------------------------------------------------------------------------------------->
      </div>
    <!-- Rodapé básico e duas linhas de enfeite -->
    <hr class="linhaVermelha">
    <hr class="linhaBranca">
  <footer class="footer">
    <div class="footer-copyright footerTexto text-center">© 2018 Copyright:
    <a href="#"> FanaticosPorPokemons.com.br</a>
    </div>
  </footer>

    

    <!-- ------------------------------------------------------------------------------------------ -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- ------------------------------------------------------------------- -->

    <!-- Optional JavaScript -->
    <!-- JavaScript -->

    <!-- CDN AXIOS -->
    <!--  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>  -->
    <!-- ------------------------------------------------------------------- -->
    
  </body>
</html>