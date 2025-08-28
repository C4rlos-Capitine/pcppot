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
             @if (session('success'))
                    <div class="alert alert-success">
                        {!! session('success') !!}
                    </div>
                @endif

                <!-- Erros de Validação -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            <table class="table table-bordered">
                <tr>
                    <th>Código da Consulta</th>
                    <td>{{ $contribuicao->codigo }}</td>
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
                <tr>
                    <th>Status</th>
                    <td>{{ $contribuicao->status }}</td>
            </table>
            </fiedset>
            <a href="{{ route('contribuicoes.index') }}" class="btn btn-secondary">Voltar</a>
        <button class="btn btn-primary" onclick="open_feedback_form()">Emitir feedback</button>
        </div>
        </div>
        </div>
        <div class="modal fade" id="feedbackModal" tabindex="-1" role="dialog" aria-labelledby="feedbackModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="feedbackModalLabel">Emitir Feedback</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="feedbackForm" method="POST" action="{{ route('contribuicoes.feedback', $contribuicao->id_contribuicao) }}">
                            @csrf
                                <div class="col-auto">
                                <label for="status" class="form-label"></label>
                                <select class="form-select" id="status" name="status">
                                    <option value="" disabled selected>Selecione o tipo de resposta</option>
                                    <option value="pendente">pendente</option>
                                     <option value="resolvida">resolvida</option>
                                    <option value="rejeitada">rejeitada</option>
                                    <option value="em_análise">em análise</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="feedback">Feedback</label>
                                <textarea class="form-control" id="feedback" name="resposta" rows="4" required></textarea>
                                <small class="form-text text-muted">Escreva seu feedback sobre esta contribuição.</small>
                            </div>
                            <button type="submit" class="btn btn-primary">Guardar o feedback</button>
                        </form>
                    </div>
                    <script>
                        function open_feedback_form() {
                            $('#feedbackModal').modal('show');
                        }
                        </script>

</body>
</html>