<?php
require_once "bootstrap.php";

$fisica = new Fisica();
$camada_fisica = $fisica->encapsular();

$enlace = new Enlace();
$camada_enlace = $enlace->encapsular($camada_fisica);

$rede = new Rede();
$camada_rede = $rede->encapsular($camada_enlace);

$transporte = new Transporte();
$camada_transporte = $transporte->encapsular($camada_rede, 'UNIARARAS');

$sessao = new Sessao();
$camada_sessao = $sessao->encapsular($camada_transporte);

$apresentacao = new Apresentacao();
$camada_apresentacao = $apresentacao->encapsular($camada_sessao);

$aplicacao = new Aplicacao();
$camada_aplicacao = $aplicacao->encapsular($camada_apresentacao);

?>

<!DOCTYPE html>
<html lang="pt-br">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title> Camadas OSI </title>
      <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
      <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="../assets/css/simple-line-icons.min.css">
      <link rel="stylesheet" type="text/css" href="../assets/css/style.min.css">
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
                        <a href="../index.php" class="btn btn-success" style="color: #FFF;">Voltar</a> 
                     </div>
                  </div><br />

                  <div class="row">
                     <div class="col-md-12">
                        <div class="card">
                           <div class="card-header" style="background: #de1a1a;">
                              Camada 7 - Aplicação - <?=$camada_aplicacao->getDados('aplicacao')?> <span class="pull-right"> <a href="#" data-toggle="modal" data-target="#largeModal" style="color: #FFF;"> Explicação </a> </span>
                           </div>
                           <div class="card-body">


                              <div class="row">
                                 <div class="col-md-4">
                                    <div class="card">
                                       <div class="card-header">
                                          Camada 1 - Física
                                       </div>
                                       <div class="card-body">
                                          Adaptadores Ethernet - <br />
                                          <?=$camada_fisica->getDados('componentes')?>
                                       </div>
                                    </div>
                                 </div>

                                 <div class="col-md-4">
                                    <div class="card">
                                       <div class="card-header">
                                          Camada 2 - Enlace
                                       </div>
                                       <div class="card-body">
                                       		MAC Origem - <?=$camada_enlace->getDados('mac_origem')?> <br />
                                       		MAC Destino - <?=$camada_enlace->getDados('mac_destino')?>
                                       </div>
                                    </div>
                                 </div>


                                 <div class="col-md-4">
                                    <div class="card">
                                       <div class="card-header">
                                          Camada 3 - Rede
                                       </div>
                                       <div class="card-body">
                                       		IP Origem -  <?=$camada_rede->getDados('ip_origem')?> <br />
                                       		IP Destino - <?=$camada_rede->getDados('ip_destino')?>
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
                                          <span>Porta Destino - <?=$camada_transporte->getDados('porta_destino')?></span><br /><br />
                                          <input type="text" class="form-control" maxlength="20" id="campo_sessao" placeholder="Por favor, digite algo para ser transportado" autofocus> <br />
                                          <button class="btn btn-info" style="color: #FFF;" id="btn_enviar">Armazenar</button>
                                       </div>
                                    </div>
                                 </div>

                                <div class="col-md-4">
                                    <div class="card">
                                       <div class="card-header">
                                          Camada 5 - Sessão
                                       </div>
                                       <div class="card-body">
                                          <div class="alert alert-success" id="notificacao">
                                             Mensagem armazenada e enviada
                                          </div> 
                                          <span id="mensagem_armazenada">Mensagem armazenada - <span id="texto_enviado"><?=$camada_sessao->getDados('valor_sessao')?></span></span>
                                       </div>
                                    </div>
                                 </div>
                                <div class="col-md-4">
                                    <div class="card">
                                       <div class="card-header">
                                          Camada 6 - Apresentação
                                       </div>
                                       <div class="card-body">
                                          <div id="conteudo_apresentacao">
                                             Dados Criptografado - <span id="texto_criptografado"><?=$camada_apresentacao->getDados('msg_crypt')?></span> <br />
                                             Dados Descriptografado - <span id="texto_descriptografado"><?=$camada_apresentacao->getDados('msg_decrypt')?></span>
                                          </div>
                                          <div id="blank_apresentacao" style="display: none">
                                             Digite o valor na camada transporte para mostrar na apresentação.
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
        <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Explicação</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
                  <img src="../assets/images/osi.png" height="70%" width="70%">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
      <script type="text/javascript" src="../assets/js/jquery.min.js"></script>
      <script type="text/javascript" src="../assets/js/popper.min.js"></script>
      <script type="text/javascript" src="../assets/js/pace.min.js"></script>
      <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
      <script type="text/javascript">

         $("#btn_enviar").click(function(){

            var sessao_input = $("#campo_sessao").val();

            if(sessao_input != '')
            {
               var send = {campo_sessao: sessao_input};

                $.get("ajax.php", send, function(data, status){
                     var dados = JSON.parse(data);

                     if(data)
                     {
                        $("#texto_enviado").html(dados.mensagem_original);
                        $("#texto_criptografado").html(dados.criptografado);
                        $("#texto_descriptografado").html(dados.descriptografado);
                        show_status(status);
                     }
                     else
                        hide_status();

                     $("#campo_sessao").val('');
                     $("#campo_sessao").focus();
                });
            }
            else
            {
               $("#campo_sessao").focus();
               hide_status();
            }
         });

         function hide_status()
         {
            $("#mensagem_armazenada").hide();
            $("#conteudo_apresentacao").hide();
            $("#blank_apresentacao").show();

            $("#notificacao").hide();
            $("#notificacao").html('Mensagem não enviada').show(); 

         }

         function show_status(status)
         {

            if(status == 'success')
            {
               $("#blank_apresentacao").hide();
               $("#conteudo_apresentacao").show();
               $("#mensagem_armazenada").show();

               $( "#notificacao" ).removeClass( "alert-danger" );
               $( "#notificacao" ).addClass( "alert-success" );
               $("#notificacao").html('Mensagem armazenada e enviada').show();
            }
            else
            {
               $( "#notificacao" ).removeClass( "alert-success" );
               $( "#notificacao" ).addClass( "alert-danger" );
               $("#notificacao").html('Mensagem não enviada').show(); 
            }
         }


      </script>

   </body>
</html>