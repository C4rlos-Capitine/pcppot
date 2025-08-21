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
    <header>
        <a href="/"><img width="70px" height="70px" style="margin-top: 0; margin-left: 0;" src="{{asset('logo.png')}}"/></a>
        @php 
        $imagePath = public_path('logo.png');
        $imageData = file_exists($imagePath) ? base64_encode(file_get_contents($imagePath)) : null;
        $imageSrc = $imageData ? 'data:image/png;base64,' . $imageData : '';
        @endphp
        <img src="{{ $imageSrc }}" alt="Logo" style="width: 70px; height: 70px; margin-top: 0; margin-left: 0;">
    </header>
   <h1> Relatório de Consulta de Planos</h1>
  <div class="container">
    <p>Prezado {{$consulta->nome_completo}} sua consulta foi submetido com sucesso.</p>
    Data de submissão: {{$consulta->created_at}}
    Email: {{$consulta->email}}</p>
</div>

    <br><br>
</html>
