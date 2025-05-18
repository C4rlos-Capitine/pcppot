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
                <legend>Contribuições</legend>
            
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tipo de Contribuição</th>
                        <th>Assunto</th>
                        <th>Nome Completo</th>
                        <th>E-mail</th>
                        <th>Plano</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contribuicoes as $contribuicao)
                    <tr>
                        <td>{{ $contribuicao->id_contribuicao }}</td>
                        <td>{{ ucfirst($contribuicao->tipo_contribuicao) }}</td>
                        <td>{{ $contribuicao->assunto }}</td>
                        <td>{{ $contribuicao->nome_completo }}</td>
                        <td>{{ $contribuicao->email }}</td>
                        <td>{{ $contribuicao->plano->nome_plano ?? 'N/A' }}</td>
                        <td>
                            <a href="{{ route('contribuicoes.show', $contribuicao->id_contribuicao) }}"><i class="bi bi-eye-fill" style="color:green"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Tipo de Contribuição</th>
                        <th>Assunto</th>
                        <th>Nome Completo</th>
                        <th>E-mail</th>
                        <th>Plano</th>
                        <th>Ações</th>
                    </tr>
                </tfoot>
            </table>
</fieldset>
            </div>
        </div>
        </div>
    </body>
</html>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>