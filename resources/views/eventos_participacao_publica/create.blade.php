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

                <!-- Mensagem de Sucesso -->
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
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

                <!-- Formulário para Eventos de Participação Pública -->
                <form class="formulario" action="{{ route('eventos_participacao_publica.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <fieldset>
                        <h3>Cadastro de Eventos de Participação Pública</h3>
                        <p>Preencha os campos abaixo para registrar um evento.</p>

                        <div class="row g-3 align-items-center">
                            <!-- Nome do Evento -->
                            <div class="col-auto">
                                <label for="nome_evento" class="form-label">Nome do Evento</label>
                                <input type="text" class="form-control" id="nome_evento" name="nome_evento" maxlength="255" required>
                            </div>

                            <!-- Descrição -->
                            <div class="col-auto">
                                <label for="descricao" class="form-label">Descrição</label>
                                <textarea class="form-control" id="descricao" name="descricao" rows="3" required></textarea>
                            </div>

                            <!-- Data e Hora -->
                            <div class="col-auto">
                                <label for="data_hora" class="form-label">Data e Hora</label>
                                <input type="datetime-local" class="form-control" id="data_hora" name="data_hora" required>
                            </div>

                            <!-- Local -->
                            <div class="col-auto">
                                <label for="local" class="form-label">Local</label>
                                <input type="text" class="form-control" id="local" name="local" maxlength="255" required>
                            </div>

                            <!-- Tipo de Evento -->
                            <div class="col-auto">
                                <label for="tipo_evento" class="form-label">Tipo de Evento</label>
                                <select class="form-select" id="tipo_evento" name="tipo_evento" required>
                                    <option value="" disabled selected>Selecione o tipo</option>
                                    <option value="audiencia_publica">Audiência Pública</option>
                                    <option value="reuniao_comunitaria">Reunião Comunitária</option>
                                    <option value="sessao_tecnica">Sessão Técnica</option>
                                    <option value="outro">Outro</option>
                                </select>
                            </div>

                            <!-- Plano Associado -->
                            <div class="col-auto">
                                <label for="id_plano" class="form-label">Plano Associado (opcional)</label>
                                <select class="form-select" id="id_plano" name="id_plano">
                                    <option value="" disabled selected>Selecione o plano</option>
                                    @foreach ($planos as $plano)
                                        <option value="{{ $plano->id_plano }}">{{ $plano->nome_plano }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Organizador -->
                            <div class="col-auto">
                                <label for="organizador" class="form-label">Organizador</label>
                                <input type="text" class="form-control" id="organizador" name="organizador" maxlength="255" required>
                            </div>

                            <!-- Contacto -->
                            <div class="col-auto">
                                <label for="contacto" class="form-label">Contacto</label>
                                <input type="text" class="form-control" id="contacto" name="contacto" maxlength="255" required>
                            </div>

                            <!-- Link de Inscrição -->
                            <div class="col-auto">
                                <label for="link_inscricao" class="form-label">Link de Inscrição (opcional)</label>
                                <input type="url" class="form-control" id="link_inscricao" name="link_inscricao">
                            </div>

                            <!-- Anexo -->
                            <div class="col-auto">
                                <label for="anexo" class="form-label">Anexo (opcional)</label>
                                <input type="file" class="form-control" id="anexo" name="anexo" accept=".pdf, .doc, .docx, .jpg, .png">
                            </div>
                        </div>

                        <!-- Botão de envio -->
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </fieldset>
                </form>
            </div>
        </div>
        </div>
        </div>
    </body>
</html>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/scripts.js"></script>