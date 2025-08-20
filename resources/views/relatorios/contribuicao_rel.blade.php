
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
    <p>Prezado {{$contribuicao->nome_completo}}, sua {{$contribuicao->tipo_contribuicao}} foi submetida com sucesso.</p>
    <p>Código da Consulta: <b>{{$contribuicao->codigo}}</b></p>
    Data de submissão: {{$contribuicao->created_at}}
    Email: {{$contribuicao->email}}</p> 
</div>
</html>