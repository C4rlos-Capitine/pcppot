<!-- resources/views/contribuicoes/show.blade.php -->
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
        <div class="container mt-4">
            <fieldset>
                <legend>Contribuição</legend>
            <h3>Detalhes da Contribuição</h3>
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <td>{{ $contribuicao->id_contribuicao }}</td>
                </tr>
                <tr>
                    <th>Tipo de Contribuição</th>
                    <td>{{ ucfirst($contribuicao->tipo_contribuicao) }}</td>
                </tr>
                <tr>
                    <th>Assunto</th>
                    <td>{{ $contribuicao->assunto }}</td>
                </tr>
                <tr>
                    <th>Mensagem</th>
                    <td>{{ $contribuicao->mensagem }}</td>
                </tr>
                <tr>
                    <th>Plano Relacionado</th>
                    <td>
                        @if($contribuicao->id_plano)
                            {{ optional($contribuicao->plano)->nome_plano ?? 'Plano removido' }}
                        @else
                            Não informado
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Nome Completo</th>
                    <td>{{ $contribuicao->nome_completo }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $contribuicao->email }}</td>
                </tr>
                <tr>
                    <th>Contacto Telefónico</th>
                    <td>{{ $contribuicao->contacto_telefonico ?? 'Não informado' }}</td>
                </tr>
                <tr>
                    <th>Anexo</th>
                    <td>
                        @if($contribuicao->anexo)
                            <a href="{{ asset('storage/' . $contribuicao->anexo) }}" target="_blank">Ver Anexo</a>
                        @else
                            Não enviado
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Criado em</th>
                    <td>{{ $contribuicao->created_at }}</td>
                </tr>
                <tr>
                    <th>Atualizado em</th>
                    <td>{{ $contribuicao->updated_at }}</td>
                </tr>
            </table>
            </fiedset>
            <a href="{{ route('contribuicoes.index') }}" class="btn btn-secondary">Voltar</a>
        </div>
        </div>
        </div>
</body>
</html>