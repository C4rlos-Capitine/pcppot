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
             
                <h3>Visualização do Plano</h3>
                <p>Veja abaixo os detalhes do plano.</p>
                <fieldset>
                    <legend>Dados do Plano</legend>
                <table class="table table-sm">
                    <tbody>
                        <tr>
                            <th>Tipo</th>
                            <td>{{ ucfirst($plano->tipo_plano_programa_projeto) }}</td>
                        </tr>
                        <tr>
                            <th>Nome do Plano</th>
                            <td>{{ $plano->nome_plano }}</td>
                        </tr>
                        <tr>
                            <th>Data de Elaboração</th>
                            <td>{{ $plano->data_elaboracao }}</td>
                        </tr>
                        <tr>
                            <th>Tipo de Plano</th>
                            <td>
                             {{$plano->nome_tipo_plano}}
                            </td>
                        </tr>
                        <tr>
                            <th>Data de Início</th>
                            <td>{{ $plano->data_inicio }}</td>
                        </tr>
                        <tr>
                            <th>Data de Fim</th>
                            <td>{{ $plano->data_fim }}</td>
                        </tr>
                        <tr>
                            <th>Área Abrangida (km²)</th>
                            <td>{{ $plano->area_abrangida }}</td>
                        </tr>
                        <tr>
                            <th>Latitude</th>
                            <td>{{ $plano->latitude }}</td>
                        </tr>
                        <tr>
                            <th>Longitude</th>
                            <td>{{ $plano->longitude }}</td>
                        </tr>
                        <tr>
                            <th>Densidade de Habitantes por km²</th>
                            <td>{{ $plano->densidade_habitantes }}</td>
                        </tr>
                        <tr>
                            <th>Objetivos</th>
                            <td>{{ $plano->objectivos }}</td>
                        </tr>
                        <tr>
                            <th>Distrito</th>
                            <td>
                                {{$plano->nome_distrito}}
                            </td>
                        </tr>
                        <tr>
                            <th>Descrição do Plano</th>
                            <td>{{ $plano->descricao_plano }}</td>
                        </tr>
                        <tr>
                            <th>Número de Consultas feitas</th>
                            <td>{{ $count }}</td>
                        </tr>
                        
                    </tbody>
                </table>
                </fieldset>
                <fieldset>
                
                <legend>Documentos</legend>
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>Nome do Documento</th>
                        
                            <th>Data de Criação</th>
                            <th>Ação</th>
                        </tr>
                    <tbody>
                        @foreach ($documentos as $documento)
                            <tr>
                                <td>{{ $documento->nome_documento }}</td>
                                
                                <td>{{ $documento->created_at }}</td>
                                <td>
                                <a href="{{ url('/plano/download/' . $documento->id_plano . '/' . $documento->id_documento) }}" class="btn btn-primary">Baixar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </fieldset>
                <fieldset>
                <h2><i class="bi bi-chat-dots"></i>Consultas públicas</h2>
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome Completo</th>
                        <th>Data de Nascimento</th>
                        <th>Gênero</th>
                        <th>Bairro</th>
                        <th>Plano Consultado</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($consultas as $consulta)
                    <tr>
                        <td>{{ $consulta->id_consulta }}</td>
                        <td>{{ $consulta->nome_completo }}</td>
                        <td>{{ $consulta->data_nascimento }}</td>
                        <td>{{ ucfirst($consulta->genero) }}</td>
                        <td>{{ $consulta->nome_bairro }}</td>
                        <td>{{ $consulta->nome_plano ?? 'N/A' }}</td>
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
                    
                    </tr>
                </tfoot>
            </table>
           <a href="{{ route('plano.all') }}" class="btn btn-secondary">Voltar</a>
            </fieldset>
            </div>
        </div>

        </div>
    </body>
</html>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('js/scripts.js') }}"></script>