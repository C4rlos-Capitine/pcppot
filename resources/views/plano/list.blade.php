<!DOCTYPE html>
<html lang="en">
    @include('head')
    <body>
        <div class="d-flex" id="wrapper">
            @include('side')
            <div id="page-content-wrapper">
            @include('nav')
             
            <div class="container-fluid">

            <a href="{{ route('plano.create') }}" class="btn btn-primary">Adicionar Novo Plano</a>
            <br><br>
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome do Plano</th>
                        <th>Tipo de Plano</th>
                        <th>Data de Início</th>
                        <th>Data de Fim</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($planos as $plano)
                    <tr>
                        <td>{{ $plano->id_plano }}</td>
                        <td>{{ $plano->nome_plano }}</td>
                        <td>{{ $plano->nome_tipo_plano }}</td>
                        <td>{{ $plano->data_inicio }}</td>
                        <td>{{ $plano->data_fim }}</td>
                        <td><a href="{{ route('plano.edit', $plano->id_plano) }}"><i class="bi bi-pencil-fill" style="color:green"></i></a><a href="{{ route('plano.show', $plano->id_plano) }}"><i class="bi bi-eye-fill" style="color:green"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Nome do Plano</th>
                        <th>Tipo de Plano</th>
                        <th>Data de Início</th>
                        <th>Data de Fim</th>
                        <th>Ações</th>
                    </tr>
            </table>

            </div>
        </div>
        </div>
    </body>
</html>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>