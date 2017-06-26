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
                    <form id="formReunioes" name="formReunioes">
                    @foreach ($ata as $items)
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="comment">Texto Ata de Reunião:</label>
                                        <textarea class="form-control" rows="5" cols="70" id="comment"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="assunto">Texto ata</label>
                                        <input type="textarea" class="form-control required" id="descricao" name="descricao" placeholder="Descrição" value="{{ $items->ata_Reuniao }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </form>
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
<script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.6.3/i18n/jquery-ui-timepicker-addon-i18n.js"></script>
    <script>
        jQuery(document).ready(function () {
           $("#checkBox").click(function () {
                $('#textBox').attr("disabled", $(this).is(":checked"));
                var $this = $(this);
                if ($this.is(':checked')) {
                    $('#addAssunto').append('<input type="text" class="form-control" id="assunto" name="assunto" placeholder="Assunto Novo">');
                }else{
                    $('#addAssunto').find('#assunto').remove();
                }
           });
        });
        $(function () {
            $('#icheck').iCheck();
            $('#datepicker').datepicker();
            $('#formReunioes').on('submit', function(e){
                e.preventDefault();
                $(".required").parent('.form-group').removeClass('has-error');
                $(".required").each(function(){
                    if ($(this).val() == '')
                        $(this).parent('.form-group').addClass('has-error');
                });
                
                $.ajaxSetup({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                
                var reunioes = {
                    assunto: $("#assunto").val(),
                    pautas: $("#pautas").val(),
                }

                $.ajax({
                    type: "POST",
                    url: "/update",
                    data:  JSON.stringify(reunioes), 
                    contentType: "application/json; charset=utf-8",
                    success: function(response) {
                        alert("Reunião Alterada!");
                        window.location.href = '/';
                    },
                    error: function(response){
                        
                    }
                });
            });
        });
    </script>