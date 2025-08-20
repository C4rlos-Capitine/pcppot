<!DOCTYPE html>
<html lang="en">
   <h1> Relatório de Consulta de Planos</h1>
   <div>
    <p>Prezado {{$consulta->nome_completo}} sua consulta foi submetido com sucesso.</p>
    Data de submissão: {{$consulta->created_at}}
    Email: {{$consulta->email}}</p>
</div>

    <br><br>
</html>
