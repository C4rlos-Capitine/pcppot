<!DOCTYPE html>
<html lang="en">
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 20px;
    }
    h1 {
        text-align: center;
    }
    .container {
        max-width: 600px;
        margin: auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    </style>
   <h1> Relatório de Contribuição</h1>
   <div class="container">
    <p>Prezado {{$proposta_rel->nome_proponente}}, sua contribuição foi submetida com sucesso.</p>
    <p>Código da Proposta: <b>{{$proposta_rel->codigo}}</b></p>
    <p>Data da Proposta: {{$proposta_rel->created_at}}</p
    </div>
</html>