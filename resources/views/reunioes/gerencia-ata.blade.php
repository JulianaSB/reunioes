<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);
?>
@extends('base')

@section('content')
    
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            ATA
        </h1>
        <ol class="breadcrumb">
            <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Reuniões</li>
        </ol>
    </section>
@if (Route::has('login'))
         @if (Auth::check())
    <!-- Main content -->
    <section class="content">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">

                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form id="formReunioes" name="formReunioes" method="POST" action="/testMail">
                    @foreach ($ata as $items)
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="comment">Texto Ata de Reunião:</label>
                                    </div>
                                    <div class="form-group">
                                        <textarea cols="10" rows="20" charswidth="23" class="form-control required printMe" name="text_body" style="resize:vertical" id="print" name="descricao">{{ $items->ata_Reuniao }}</textarea>

                                        <!-- <input type="textarea" class="form-control required" id="descricao" name="descricao" placeholder="Descrição" value="{{ $items->ata_Reuniao }}"> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </form>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                  Launch demo modal
                </button>

                <a data-target="#myModal" role="button" class="btn" data-toggle="modal" class="printmodal">Launch modal</a>
                <input type="button" onclick="cont();" value="Imprimir Div separadamente">

            </div>
        </div>
    </section>
     @else
        <a href="{{ url('/login') }}">Login</a>
        <a href="{{ url('/register') }}">Registrar</a>
    @endif
</div>
@endif     
@endsection

<div id="" class="conteudo">
// conteúdo a ser impresso pode ser um form ou um table.
</div>

<div class="modal fade hide" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
         <h3 id="myModalLabel">Modal to print</h3>

    </div>
    <div class="modal-body">
        <p>Print Me</p>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
        <button class="btn btn-primary" id="printButton">Print</button>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="content container">
            @foreach ($ata as $items)
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="form-group">
                                {{ $items->ata_Reuniao }}
                            </div>
                        </div>
                    </div>
                </div>
                
            @endforeach
        </div>

            @foreach ($ata as $items)
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <textarea cols="10" rows="10" charswidth="23" class="form-control" name="text_body" style="resize:vertical" id="descricao" name="descricao">{{ $items->ata_Reuniao }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
      </div>
      <div class="modal-footer">
      <button class="btn btn-primary" id="printButton">Print</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Imprimir</button>
      </div>
    </div>
  </div>
</div>

<script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.6.3/i18n/jquery-ui-timepicker-addon-i18n.js"></script>
    <script>
        function cont(){
           var conteudo = document.getElementById('print').innerHTML;
           tela_impressao = window.open('about:blank');
           tela_impressao.document.write(conteudo);
           tela_impressao.window.print();
           tela_impressao.window.close();
        }

            $('#printButton').on('click', function () {
                    window.print();
            });


           $("#checkBox").click(function () {
                $('#textBox').attr("disabled", $(this).is(":checked"));
                var $this = $(this);
                if ($this.is(':checked')) {
                    $('#addAssunto').append('<input type="text" class="form-control" id="assunto" name="assunto" placeholder="Assunto Novo">');
                }else{
                    $('#addAssunto').find('#assunto').remove();
                }
           });  
    </script>