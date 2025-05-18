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

                <!-- Formulário para Consultas Públicas -->
                <form class="formulario" action="{{ route('consultas_publicas.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <fieldset>
                        <h3>Cadastro de Consultas Públicas</h3>
                        <p>Preencha os campos abaixo para registrar uma consulta pública.</p>

                        <div class="row g-3 align-items-center">
                            <!-- Nome Completo -->
                            <div class="col-auto">
                                <label for="nome_completo" class="form-label">Nome Completo</label>
                                <input type="text" class="form-control" id="nome_completo" name="nome_completo" maxlength="255" required>
                            </div>

                            <!-- Data de Nascimento -->
                            <div class="col-auto">
                                <label for="data_nascimento" class="form-label">Data de Nascimento</label>
                                <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" required>
                            </div>

                            <!-- Gênero -->
                            <div class="col-auto">
                                <label for="genero" class="form-label">Gênero</label>
                                <select class="form-select" id="genero" name="genero" required>
                                    <option value="" disabled selected>Selecione o gênero</option>
                                    <option value="masculino">Masculino</option>
                                    <option value="feminino">Feminino</option>
                                    <option value="outro">Outro</option>
                                </select>
                            </div>

                            <!-- Número de BI -->
                            <div class="col-auto">
                                <label for="numero_bi" class="form-label">Número de BI</label>
                                <input type="text" class="form-control" id="numero_bi" name="numero_bi" maxlength="20" required>
                            </div>

                            <!-- E-mail -->
                            <div class="col-auto">
                                <label for="email" class="form-label">E-mail</label>
                                <input type="email" class="form-control" id="email" name="email" maxlength="255" required>
                            </div>

                            <!-- Bairro -->
                            <div class="col-auto">
                                <label for="id_bairro" class="form-label">Bairro</label>
                                <select class="form-select" id="id_bairro" name="id_bairro" required>
                                    <option value="" disabled selected>Selecione o bairro</option>
                                    @foreach ($bairros as $bairro)
                                        <option value="{{ $bairro->id_bairro }}">{{ $bairro->nome_bairro }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Plano Consultado -->
                            <div class="col-auto">
                                <label for="id_plano" class="form-label">Plano Consultado</label>
                                <select class="form-select" id="id_plano" name="id_plano">
                                    <option value="" disabled selected>Selecione o plano (opcional)</option>
                                    @foreach ($planos as $plano)
                                        <option value="{{ $plano->id_plano }}">{{ $plano->nome_plano }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Comentário -->
                            <div class="col-auto">
                                <label for="comentario" class="form-label">Comentário / Contributo</label>
                                <textarea class="form-control" id="comentario" name="comentario" rows="3"></textarea>
                            </div>

                            <!-- Upload de Ficheiro -->
                            <div class="col-auto">
                                <label for="ficheiro_upload" class="form-label">Upload de Ficheiro (opcional)</label>
                                <input type="file" class="form-control" id="ficheiro_upload" name="ficheiro_upload" accept=".pdf, .doc, .docx, .jpg, .png">
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