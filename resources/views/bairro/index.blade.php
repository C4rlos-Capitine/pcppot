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

            <a href="{{ route('bairro.create') }}" class="btn btn-primary">Adicionar Novo Bairro</a>
            <br><br>
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome do Bairro</th>
                        <th>Distrito</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bairros as $bairro)
                    <tr>
                        <td>{{ $bairro->id_bairro }}</td>
                        <td>{{ $bairro->nome_bairro }}</td>
                        <td>{{ $bairro->nome_distrito }}</td>
              
                        
                        <td>
                            <button class="btn btn-primary btn-edit" 
                                    data-id="{{ $bairro->id_bairro }}" 
                                    data-nome="{{ $bairro->nome_bairro }}" 
                                    data-distrito="{{ $bairro->id_distrito }}">
                                Editar
                            </button>
                        </td>
                        
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Nome do Bairro</th>
                        <th>Distrito</th>
                        <th>Ações</th>
                    </tr>
                </tfoot>
            </table>

            </div>
        </div>
        </div>
    </body>
    <!-- Modal para Editar Bairro -->
<div class="modal fade" id="editBairroModal" tabindex="-1" aria-labelledby="editBairroModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editBairroModalLabel">Editar Bairro</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editBairroForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nome_bairro">Nome do Bairro</label>
                        <input type="text" class="form-control" id="nome_bairro" name="nome_bairro" required>
                    </div>
                    <div class="form-group">
                        <label for="id_distrito">Distrito</label>
                        <select class="form-control" id="id_distrito" name="id_distrito" required>
                            @foreach ($distritos as $distrito)
                                <option value="{{ $distrito->id_distrito }}">{{ $distrito->nome_distrito }}</option>
                            @endforeach
                        </select>
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
        const editForm = document.getElementById('editBairroForm');
        const nomeInput = document.getElementById('nome_bairro');
        const distritoSelect = document.getElementById('id_distrito');

        editButtons.forEach(button => {
            button.addEventListener('click', function () {
                const id = this.getAttribute('data-id');
                const nome = this.getAttribute('data-nome');
                const distrito = this.getAttribute('data-distrito');

                // Preencher os campos do modal
                nomeInput.value = nome;
                distritoSelect.value = distrito;

                // Atualizar a ação do formulário
                editForm.action = `/bairro/${id}`;

                // Abrir o modal
                const editModal = new bootstrap.Modal(document.getElementById('editBairroModal'));
                editModal.show();
            });
        });
    });
</script>
</html>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/scripts.js"></script>