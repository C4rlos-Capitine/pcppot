<!DOCTYPE html>
<html lang="en">
    @include('head')
    <style>
.row {
  display: flex;
  flex-direction: row; /* ← garante que os filhos fiquem em linha */
  justify-content: flex-start; /* ou center, se quiser centralizar */
  align-items: flex-start;
  gap: 20px;
  margin-top: 20px;
}

    </style>
    <body>
        <div class="d-flex" id="wrapper">
            @include('side')
            <div id="page-content-wrapper">
            @include('nav')
                <!-- Page content-->
            <div class="container-fluid">
            <div class="row">
              <div class="dados">
                <label>Dados</label>
                <ul>
                    <li>Pendentes: {{ $pendenteCount }}</li>
                    <li>Em Análise: {{ $emAnaliseCount }}</li>
                    <li>Rejeitadas: {{ $rejeitadaCount }}</li>
                    <li>Resolvidas: {{ $resolvidaCount }}</li>
                </ul>
                </div>
                <div class="dados">
                    <ul>
                        <li>Sugestão de melhoria: {{ $sugestaoCount }}</li>
                        <li>Reclamação: {{ $reclamacaoCount }}</li>
                        <li>Pedido de eclarecimento: {{ $pedidoEsclarecimentoCount }}</li>
                    </ul>
                </div>
            </div>
       
            <fieldset>
                <label>Contribuições</label>
            
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tipo de Contribuição</th>
                        <th>Assunto</th>
                        <th>Nome Completo</th>
                        <th>E-mail</th>
                        <th>Plano</th>
                        <th>Status</th>
                        <th>Ações</th>
    
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contribuicoes as $contribuicao)
                    <tr>
                        <td>{{ $contribuicao->id_contribuicao }}</td>
                        <td>{{ ucfirst($contribuicao->tipo_contribuicao) }}</td>
                        <td>{{ $contribuicao->assunto }}</td>
                        <td>{{ $contribuicao->nome_completo }}</td>
                        <td>{{ $contribuicao->email }}</td>
                        <td>{{ $contribuicao->plano->nome_plano ?? 'N/A' }}</td>
                        <td>{{ ucfirst($contribuicao->status) }}</td>
                        <td>
                            <a href="{{ route('contribuicoes.show', $contribuicao->id_contribuicao) }}"><i class="bi bi-eye-fill" style="color:green"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Tipo de Contribuição</th>
                        <th>Assunto</th>
                        <th>Nome Completo</th>
                        <th>E-mail</th>
                        <th>Plano</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </tfoot>
            </table>
</fieldset>
            </div>
        </div>
        </div>
    </body>
</html>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>