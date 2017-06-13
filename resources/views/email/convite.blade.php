
    <!-- Content Header (Page header) -->
<H1>Olá, Participe de nossa Reunião, Cadastre-se no Reuniões ou acesse seu login!</H1>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
              
                    <div class="box-header with-border">
                        <h3 class="box-title">Reunião</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div>
                    	 Assunto:
                            {{ $Assunto }}
                    </div>
                    
                    <div>
                         Tema:
                            {{ $Tema }} 	
                    </div>      
 						
 					<div>
 						 Pauta:
                            {{ $Pauta }}
 					</div>
 						
					<div>
						 Descricao
                            {{ $Descricao }}
					</div>

                    <div>
                    	Data:
                         	{{ $Data_Hora }}
                    </div>

                    <div>
                        Tipo de Reunião:
                          	{{ $Tipo_Reuniao }}
                    </div>                        	

                 </div>
            </div>
        </div>
    </section>
@if (isset($actionText))
@component('mail::subcopy')
Se você tiver problemas para clicar no botão "{{ $actionText }}", copie e cole o URL abaixo 
em seu navegador da Web: [{{ $actionUrl }}]({{ $actionUrl }})
@endcomponent
@endif

<script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.6.3/i18n/jquery-ui-timepicker-addon-i18n.js"></script>