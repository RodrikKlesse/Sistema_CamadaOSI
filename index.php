<?php
require_once "bootstrap.php";
$aplicacao = new Aplicacao();
$dados = $aplicacao->get_dados();

if(isset($_GET['debug']))
{
    var_dump($dados);
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title> Camadas OSI </title>
      <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="assets/css/simple-line-icons.min.css">
      <link rel="stylesheet" type="text/css" href="assets/css/style.min.css">
      <style type="text/css">
      	.card-header{
      		background-color: #3949ab;
      		color: #fff;
      	}
      </style>
   </head>
   <body class="app pace-done">
   <div class="app-body" style="margin-top: 30px;">
         <main class="main">
            <div class="container-fluid">
               <div class="animated fadeIn">

                  <div class="row">
                     <div class="col-md-12">
                        <div class="card">
                           <div class="card-header" style="background: #de1a1a;">
                              Camada 7 - Aplicação
                           </div>
                           <div class="card-body">


                              <div class="row">
                                 <div class="col-md-4">
                                    <div class="card">
                                       <div class="card-header">
                                          Camada 1 - Física
                                       </div>
                                       <div class="card-body">
                                       	<br />
                                       	<br />
                                       </div>
                                    </div>
                                 </div>

                                 <div class="col-md-4">
                                    <div class="card">
                                       <div class="card-header">
                                          Camada 2 - Enlace
                                       </div>
                                       <div class="card-body">
                                       		MAC Origem - <?=$dados['mac_origem']?> <br />
                                       		MAC Destino - <?=$dados['mac_destino']?>
                                       </div>
                                    </div>
                                 </div>


                                 <div class="col-md-4">
                                    <div class="card">
                                       <div class="card-header">
                                          Camada 3 - Rede
                                       </div>
                                       <div class="card-body">
                                       		IP Origem - <?=$dados['ip_origem']?> <br />
                                       		IP Destino - <?=$dados['ip_destino']?>
                                       </div>
                                    </div>
                                 </div>
                              </div>

                              <div class="row">


                                 <div class="col-md-4">
                                    <div class="card">
                                       <div class="card-header">
                                          Camada 4 - Transporte
                                       </div>
                                       <div class="card-body">
                                          <div class="alert alert-success">
                                             Teste
                                          </div> 
                                             <br />
                                          Porta Destino - <?=$dados['porta_destino']?>
                                       </div>
                                    </div>
                                 </div>

                                <div class="col-md-4">
                                    <div class="card">
                                       <div class="card-header">
                                          Camada 5 - Sessão
                                       </div>
                                       <div class="card-body">
                                          <input type="password" class="form-control" maxlength="20" id="campo_sessao" placeholder="Por favor, digite algo para ser armazenado"> <br />
                                          <button class="btn btn-info" style="color: #FFF;" id="btn_enviar">Armazenar</button>
                                       </div>
                                    </div>
                                 </div>
                                <div class="col-md-4">
                                    <div class="card">
                                       <div class="card-header">
                                          Camada 6 - Apresentação
                                       </div>
                                       <div class="card-body">
                                          <div id="conteudo_apresentacao" style="display: none;">
                                             Dados Criptografado - <span id="texto_criptografado"></span> <br />
                                             Dados Descriptografado - <span id="texto_descriptografado"></span>
                                          </div>
                                          <div id="blank_apresentacao">
                                             Digite o valor no campo ao lado para criptografar nessa sessão. 
                                          </div>
                                       </div>
                                    </div>
                                 </div>

                              </div>
                           </div>
                        </div>
                     </div>
                  </div>

               </div>
            </div>
         </main>
      </div>
      <script type="text/javascript" src="assets/js/jquery.min.js"></script>
      <script type="text/javascript" src="assets/js/popper.min.js"></script>
      <script type="text/javascript" src="assets/js/pace.min.js"></script>
      <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
      <script type="text/javascript">
        $("btn_enviar").click(function()
        {
            var sessao_input = $("#campo_sessao").val();

            if(sessao_input != '')
            {
                var send = {campo_sessao: sessao_input};

                $.get("socorro.php", send, function(data, status)
                {
                    var dados = JSON.parse(data);

                    if(data)
                    {
                        $("#texto_criptografado").html(dados.criptografado);
                        $("#texto_descriptografado").html(dados.descriptografado);
                        mostrar_apresentacao();
                    } else
                        esconder_apresentacao();
                    
                    $("#campo_sessao").val('');
                    $("#campo_sessao").focus();
                    
                });
            } else 
            {
                $("#campo_sessao").focus();
                esconder_apresentacao();
            }
        });

        function esconder_apresentacao()
         {
            $("#conteudo_apresentacao").hide();
            $("#blank_apresentacao").show();
         }

         function mostrar_apresentacao()
         {
            $("#blank_apresentacao").hide();
            $("#conteudo_apresentacao").show();
         }
         
      </script>
   </body>
</html>