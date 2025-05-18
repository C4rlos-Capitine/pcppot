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
    
                <!-- Formulário para registro de tipos de planos -->
                                <!-- Formulário para registro de planos -->
                <form class="formulario" action="{{ route('plano.store') }}" method="POST" enctype="multipart/form-data">

                    @csrf <!-- Token CSRF obrigatório no Laravel -->
                    <fieldset>
                        <h3>Cadastro de Planos</h3>
                        <p>Preencha os campos abaixo para cadastrar um novo plano.</p>
                        
                    <div class="row g-3 align-items-center">
                        <!-- Campo para o nome do plano -->
                        <div class="col-auto">
                            <label for="id_tipo_plano" class="form-label">Tipo</label>
                            <select class="form-select" id="tipo_plano_programa_projeto" name="tipo_plano_programa_projeto" required>
                                <option value="" disabled selected>Selecione o tipo de plano</option>
                                <option value="plano">Plano</option>
                                <option value="programa">Programa</option>
                                <option value="projeto">Projeto</option>
                            </select>
                        </div>
                        <div class="col-auto">
                            <label for="nome_plano" class="form-label">Nome do Plano</label>
                            <input type="text" class="form-control" id="nome_plano" name="nome_plano" maxlength="100" required>
                        </div>
                        <div class="col-auto">
                            <label for="data_elaboracao" class="form-label">Data de elaboração</label>
                            <input type="date" class="form-control" id="data_elaboracao" name="data_elaboracao" required>
                        </div>

                        <div class="col-auto">
                            <label for="id_tipo_plano" class="form-label">Tipo de Plano</label>
                            <select class="form-select" id="id_tipo_plano" name="id_tipo_plano" required>
                                <option value="" disabled selected>Selecione o tipo de plano</option>
                                <!-- Exemplo de opções (substitua com dados reais) -->
                                @foreach ($tipoPlanos as $tipoPlano)
                                    <option value="{{ $tipoPlano->id_tipo_plano }}">{{ $tipoPlano->nome_tipo_plano }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- Campo para a data de início -->
                        <div class="col-auto">
                            <label for="data_inicio" class="form-label">Data de Início</label>
                            <input type="date" class="form-control" id="data_inicio" name="data_inicio" required>
                        </div>
                    
                    
                        <!-- Campo para a data de fim -->
                        <div class="col-auto">
                            <label for="data_fim" class="form-label">Data de Fim</label>
                            <input type="date" class="form-control" id="data_fim" name="data_fim" required>
                        </div>

                        <!-- Campo para a área abrangida -->
                        
                    </div>
                    <div class="row g-3 align-items-center">
                        <div class="col-auto">
                                <label for="area_abrangida" class="form-label">Área Abrangida (km²)</label>
                                <input type="number" step="0.01" class="form-control" id="area_abrangida" name="area_abrangida" required>
                            </div>
                        <!-- Campo para latitude -->
                        <div class="col-auto">
                            <label for="latitude" class="form-label">Latitude</label>
                            <input type="number" step="0.00000001" class="form-control" id="latitude" name="latitude" required>
                        </div>

                        <!-- Campo para longitude -->
                        <div class="col-auto">
                            <label for="longitude" class="form-label">Longitude</label>
                            <input type="number" step="0.00000001" class="form-control" id="longitude" name="longitude" required>
                        </div>

                        <!-- Campo para densidade de habitantes -->
                        <div class="col-auto">
                            <label for="densidade_habitantes" class="form-label">Densidade de Habitantes por km²</label>
                            <input type="number" step="0.01" class="form-control" id="densidade_habitantes" name="densidade_habitantes" required>
                        </div>
                        <div class="col-auto">
                            <label for="objectivos" class="form-label">objectivos</label>
                            <input type="text"  class="form-control" id="objectivos" name="objectivos" required>
                        </div>
                    </div>
                    <div class="col-auto">
                            <label for="id_tipo_plano" class="form-label">Distrito</label>
                            <select class="form-select" id="id_distrito" name="id_distrito" required>
                                <option value="" disabled selected>Selecione o distrito abrangido</option>
                                <!-- Exemplo de opções (substitua com dados reais) -->
                                @foreach ($distritos as $distrito)
                                    <option value="{{ $distrito->id_distrito }}">{{ $distrito->nome_distrito }}</option>
                                @endforeach
                            </select>
                        </div>
                    <!-- Campo para descrição do plano -->
                    <div class="col-auto">
                        <label for="descricao_plano" class="form-label">Descrição do Plano</label>
                        <textarea class="form-control" id="descricao_plano" name="descricao_plano" maxlength="255" rows="3" required></textarea>
                    </div>
                    <div class="row g-3 align-items-center">
                        <p>Documentos do Plano</p>
                        <div class="col-auto">
                            <label for="documento_plano" class="form-label">Minuta do Plano (PDF, DOC)</label>
                            <input type="file" class="form-control" id="minuta" name="minuta" accept=".pdf, .doc, .docx" required>
                        </div>
                        <div class="col-auto">
                            <label for="documento_plano" class="form-label">Mapas Geoespaciais (SIG, KML, GeoJSON)</label>
                            <input type="file" class="form-control" id="mapa" name="mapa" accept=".pdf, .doc, .docx" required>
                        </div>
                        <div class="col-auto">
                            <label for="documento_plano" class="form-label">Relatório Técnico Preliminar</label>
                            <input type="file" class="form-control" id="relatorio_tecnico" name="relatorio_tecnico" accept=".pdf, .doc, .docx" required>
                        </div>
                        <div class="col-auto">
                            <label for="documento_plano" class="form-label">Estudos de Impacto Ambiental e Social</label>
                            <input type="file" class="form-control" id="impacto_ambiental" name="impacto_ambiental" accept=".pdf, .doc, .docx" required>
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
<!-- Core theme JS-->
<script src="js/scripts.js"></script>