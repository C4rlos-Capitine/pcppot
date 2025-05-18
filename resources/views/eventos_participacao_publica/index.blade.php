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

            <a href="{{ route('eventos_participacao_publica.create') }}" class="btn btn-primary">Adicionar Novo Evento</a>
            <br><br>
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome do Evento</th>
                        <th>Data e Hora</th
                        <th>Local</th>
                        <th>Tipo de Evento</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($eventos as $evento)
                    <tr>
                        <td>{{ $evento->id_evento }}</td>
                        <td>{{ $evento->nome_evento }}</td>
                        <td>{{ $evento->data_hora }}</td>
                        <td>{{ $evento->local }}</td>
                        <td>{{ ucfirst(str_replace('_', ' ', $evento->tipo_evento)) }}</td>
                        <td>
                            <a href="{{ route('eventos_participacao_publica.edit', $evento->id_evento) }}" class="btn btn-primary">Editar</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Nome do Evento</th>
                        <th>Data e Hora</th>
                        <th>Local</th>
                        <th>Tipo de Evento</th>
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