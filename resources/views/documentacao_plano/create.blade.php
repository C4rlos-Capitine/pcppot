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
                <h1 class="mt-4">Registar Tipo de Documento</h1>
                <form action="{{ route('documentacao_plano.store') }}" method="POST">
                    @csrf <!-- Token CSRF obrigatório no Laravel -->

                    <!-- Campo para o nome do documento -->
                    <div class="mb-3">
                        <label for="nome_documento" class="form-label">Nome do Documento</label>
                        <input type="text" class="form-control" id="nome_documento" name="nome_documento" maxlength="100" required>
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