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
                <form action="{{ route('documentacao_plano.store') }}" method="POST">
                    @csrf <!-- Token CSRF obrigatório no Laravel -->
                    <fieldset>
                        <h3>Cadastro de Tipos de Documentos</h3>
                        <p>Preencha os campos abaixo para cadastrar um novo tipo de documento.</p>
                    <!-- Campo para o nome do documento -->
                    <div class="col-auto">
                        <label for="nome_documento" class="form-label">Nome do Documento</label>
                        <input type="text" class="form-control" id="nome_documento" name="nome_documento" maxlength="100" required>
                    </div>

                    <!-- Botão de envio -->
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    </fieldset>
                </form>
                <br><br>
                <fieldset>
                <h3>Lista de Tipos de Documentos</h3>
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome do Documento</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($documentos as $documento)
                        <tr>
                            <td>{{ $documento->id_documento }}</td>
                            <td>{{ $documento->nome_documento }}</td>
                            <td>
                                @if(isset($documento->id_documento))
                                    <a href="{{ route('documentacao_plano.edit', $documento->id_documento) }}" class="btn btn-primary">Editar</a>
                                @else
                                    <span class="text-danger">ID não encontrado</span>
                                @endif
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
</fieldset>
                <br><br>

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