<?php
require_once "bootstrap.php";

$fisica = new Fisica();
$camada_fisica = $fisica->encapsular();

$rede = new Rede();
$camada_rede = $rede->encapsular($camada_fisica);

$transporte = new Transporte();
$camada_transporte = $transporte->encapsular($camada_rede);

$aplicacao = new Aplicacao();
$camada_aplicacao = $aplicacao->encapsular($camada_transporte);

?>

<!DOCTYPE html>
<html lang="pt-br">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title> Camadas TCP/IP </title>
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
                              Camada 7 - Aplicação - <?=$camada_aplicacao->getDados('aplicacao')?> <span class="pull-right"> <a href="#" data-toggle="modal" data-target="#largeModal" style="color: #FFF;"> Explicação </a></span>
                           </div>
                           <div class="card-body">


                              <div class="row">
                                 <div class="col-md-6">
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

                                 <div class="col-md-6">
                                    <div class="card">
                                       <div class="card-header">
                                          Camada 2 - Rede
                                       </div>
                                       <div class="card-body">
                                             IP Origem - <?=$camada_rede->getDados('ip_origem')?> <br />
                                             IP Destino - <?=$camada_rede->getDados('ip_destino')?>
                                       </div>
                                    </div>
                                 </div>

                              </div>

                              <div class="row">


                                 <div class="col-md-12">
                                    <div class="card">
                                       <div class="card-header">
                                          Camada 3 - Transporte
                                       </div>
                                       <div class="card-body">
                                          <div class="row">
                                             <div class="col-md-6">
                                                <pre>
                                                   <?=$camada_transporte->getDados('protocolos')?>
                                                </pre>
                                             </div>
                                             <div class="col-md-6">
                                                PID do processo que está sendo executado: <b><?=getmypid()?></b>
                                                <br/>
                                                <pre>
                                                <?=$camada_transporte->getDados('servico')?>
                                                </pre>
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
                  <img src="../assets/images/tcpip.jpg" style="width: 100%;">
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
   </body>
</html>