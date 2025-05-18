
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

<br><br>
<fieldset>
    <legend>Propostas Comunitárias</legend>

<table id="example" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome do Proponente</th>
            <th>Contacto</th>
            <th>Bairro</th>
            <th>Tipo de Intervenção</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($propostas as $proposta)
        <tr>
            <td>{{ $proposta->id_proposta }}</td>
            <td>{{ $proposta->nome_proponente }}</td>
            <td>{{ $proposta->contacto }}</td>
            <td>{{ $proposta->bairro->nome_bairro }}</td>
            <td>{{ ucfirst($proposta->tipo_intervencao) }}</td>
            <td>
               <!-- <a href="{{ route('propostas_comunitarias.edit', $proposta->id_proposta) }}" class="btn btn-primary">Editar</a>-->
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</fieldset>

</div>
        </div>
        </div>
    </body>
</html>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/scripts.js"></script>