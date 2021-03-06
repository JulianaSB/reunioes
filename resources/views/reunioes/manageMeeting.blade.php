@extends('base')

@section('content')

    <link rel="stylesheet" type="text/css" href="{{asset('css/manageMeetingStile.css')}}" />

    @if (session('success'))
        <div class="alert alert-success">
            <h4><i class="fa fa-check"></i> Pronto! </h4>
            <strong>{{ session('success') }}</strong>
        </div>
    @elseif (session('failed'))
        <div class="alert alert-danger">
            <h4><i class="fa fa-warning"></i> ERRO! </h4>
            <strong>{{ session('failed') }}</strong>
        </div>
    @endif
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Reuniões Criadas
        </h1>
        <ol class="breadcrumb">
            <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Reuniões Criadas</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row manage">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Reuniões Criadas</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Ata</th>
                                <th>Reunião ID</th>
                                <th>Tema</th>
                                <th>Criado em</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($itensgerencia as $itens)
                            <tr>
                                <td><a href="{{ url('/manageAta/') .'/'. $itens->ID_Reuniao}}"><i class="fa fa-newspaper-o" aria-hidden="true"></i></a></td>
                                <td>{{ $itens->ID_Reuniao }}</td>
                                <td>{{ $itens->Tema }}</td>
                                <td>{{ $itens->Data_Hora }}</td>
                                <td><center><a href="{{ url('/viewMeeting/') .'/'. $itens->ID_Reuniao}}"><i class="fa fa-eye" aria-hidden="true"></i></a></center></td>
                                <td><center><a href="{{ url('/editManageMeeting/') .'/'. $itens->ID_Reuniao}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></center></td>
                                <td><center>
                                <form method="DELETE" action="{{ url('/deleteMeeting/') . '/' . $itens->ID_Reuniao}}">
                                    <button><i class="fa fa-times" aria-hidden="true"></i></button>
                                </form>
                                </center></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

@endsection
<script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.6.3/i18n/jquery-ui-timepicker-addon-i18n.js"></script>