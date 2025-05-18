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
                <h1 class="mt-4">Registar Bairro</h1>
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
    
<!-- Formulário para o cadastro de bairros -->
<form action="{{route('bairro.store')}}" method="POST">
                    <!-- Token CSRF (necessário para Laravel) -->
                    @csrf

                    <!-- Campo para o nome do bairro -->
                    <div class="mb-3">
                        <label for="nome_bairro" class="form-label">Nome do Bairro</label>
                        <input type="text" class="form-control" id="nome_bairro" name="nome_bairro" maxlength="100" required>
                    </div>

                    <!-- Campo para selecionar o distrito -->
                    <div class="mb-3">
                        <label for="id_distrito" class="form-label">Distrito</label>
                        <select class="form-select" id="id_distrito" name="id_distrito" required>
                            <option value="" disabled selected>Selecione um distrito</option>
                            <!-- Exemplo de opções (substitua com dados reais) -->
                            @foreach ($distritos as $distrito)
                                <option value="{{ $distrito->id_distrito }}">{{ $distrito->nome_distrito }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Botão de envio -->
                    <button type="submit" class="btn btn-primary">Salvar</button>
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





