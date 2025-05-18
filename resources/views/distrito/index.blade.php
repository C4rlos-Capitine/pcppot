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

            <a href="{{ route('distrito.create') }}" class="btn btn-primary">Adicionar Novo Distrito</a>
            <br><br>
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome do Distrito</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($distritos as $distrito)
                    <tr>
                        <td>{{ $distrito->id_distrito }}</td>
                        <td>{{ $distrito->nome_distrito }}</td>
                        <td>
                            <button class="btn btn-primary btn-edit" 
                                    data-id="{{ $distrito->id_distrito }}" 
                                    data-nome="{{ $distrito->nome_distrito }}">
                                Editar
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Nome do Distrito</th>
                        <th>Ações</th>
                    </tr>
                </tfoot>
            </table>

            </div>
        </div>
        </div>
    </body>
    <!-- Modal para Editar Distrito -->
<div class="modal fade" id="editDistritoModal" tabindex="-1" aria-labelledby="editDistritoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editDistritoModalLabel">Editar Distrito</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editDistritoForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nome_distrito">Nome do Distrito</label>
                        <input type="text" class="form-control" id="nome_distrito" name="nome_distrito" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const editButtons = document.querySelectorAll('.btn-edit');
        const editForm = document.getElementById('editDistritoForm');
        const nomeInput = document.getElementById('nome_distrito');

        editButtons.forEach(button => {
            button.addEventListener('click', function () {
                const id = this.getAttribute('data-id');
                const nome = this.getAttribute('data-nome');

                // Preencher os campos do modal
                nomeInput.value = nome;

                // Atualizar a ação do formulário
                editForm.action = `/distrito/${id}`;

                // Abrir o modal
                const editModal = new bootstrap.Modal(document.getElementById('editDistritoModal'));
                editModal.show();
            });
        });
    });
</script>
</html>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/scripts.js"></script>