<!DOCTYPE html>
<html lang="en">
    @include('head')
    <body>
        <div class="d-flex" id="wrapper">
            @include('side')
            <div id="page-content-wrapper">
            @include('nav')
                <!-- Page content-->
            <div class="container-fluid">
            
           <!-- <a href="{{ route('consultas_publicas.create') }}" class="btn btn-primary">Adicionar Nova Consulta Pública</a>-->
            <br><br>
            <h1>Consultas públicas</h1>
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome Completo</th>
                        <th>Data de Nascimento</th>
                        <th>Gênero</th>
                        <th>Bairro</th>
                        <th>Plano Consultado</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($consultas as $consulta)
                    <tr>
                        <td>{{ $consulta->id_consulta }}</td>
                        <td>{{ $consulta->nome_completo }}</td>
                        <td>{{ $consulta->data_nascimento }}</td>
                        <td>{{ ucfirst($consulta->genero) }}</td>
                        <td>{{ $consulta->bairro->nome_bairro }}</td>
                        <td>{{ $consulta->plano->nome_plano ?? 'N/A' }}</td>
                        <td>
                            <a href="{{ route('consultas_publicas.show', $consulta->id_consulta) }}"><i class="bi bi-eye-fill" style="color:green"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Nome Completo</th>
                        <th>Data de Nascimento</th>
                        <th>Gênero</th>
                        <th>Bairro</th>
                        <th>Plano Consultado</th>
                        <th>Ações</th>
                    </tr>
                </tfoot>
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