<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);
?>
@extends('base')

@section('content')
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
            <section class="content">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                            </div>
                            <form id="formReunioesEdit" name="formReunioesEdit">
                                @foreach ($ata as $items)
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="comment">Texto Ata de Reunião:</label>
                                                </div>
                                                <div class="form-group">
                                                    <textarea cols="10" rows="20" charswidth="23" class="form-control required printMe" name="text_body" style="resize:vertical" id="print" name="descricao">{{ $items->ata_Reuniao }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <input type="hidden" name="id" value="{{$items->ID_Ata}}">
                                    </div>
                                    <div class="box-footer">
                                        <!-- <button type="submit" class="btn btn-primary">Salvar</button> -->
                                    </div>
                                @endforeach
                            </form>
                            <input type="button" onclick="cont();" value="Imprimir Ata" class="btn btn-primary">
                        </div>
                    </div>
                </div>
            </section>
        @else
            <a href="{{ url('/login') }}">Login</a>
            <a href="{{ url('/register') }}">Registrar</a>
        @endif
    @endif     
@endsection

<script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>

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

    $(function () {
        $('#formReunioesEdit').on('submit', function(e){
            e.preventDefault()                

            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')                    }
            });                

            var reunioesEdit = {
                ata_Reuniao: $("#print").val(),
            }

            $.ajax({
                type: "PUT",
                url: "/save-ata/{{$items->ID_Ata}}",
                data:  JSON.stringify(reunioesEdit), 
                contentType: "application/json; charset=utf-8",
                success: function(response) {
                    window.location.href = '//manageMeeting';
                },
                error: function(response){
                    
                }
            });
        });
    });
</script>