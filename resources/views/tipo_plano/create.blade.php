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
                <h1 class="mt-4">Registar Tipo de Plano</h1>
                <!-- Formulário para registro de tipos de planos -->
                <form action="{{ route('tipo_plano.store') }}" method="POST">
                    @csrf <!-- Token CSRF obrigatório no Laravel -->

                    <!-- Campo para o nome do tipo de plano -->
                    <div class="mb-3">
                        <label for="nome_tipo_plano" class="form-label">Nome do Tipo de Plano</label>
                        <input type="text" class="form-control" id="nome_tipo_plano" name="nome_tipo_plano" maxlength="100" required>
                    </div>

                    <!-- Campo para a descrição do tipo de plano -->
                    <div class="mb-3">
                        <label for="descripcion_tipo_plano" class="form-label">Descrição do Tipo de Plano</label>
                        <textarea class="form-control" id="descripcion_tipo_plano" name="descripcion_tipo_plano" maxlength="255" rows="3" required></textarea>
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