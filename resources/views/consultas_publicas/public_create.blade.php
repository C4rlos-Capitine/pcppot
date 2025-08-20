<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="fontawsome/css/all.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script type="text/javascript" src="{{asset('jquery-3.7.0.js')}}"></script>
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
        <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
        <link href="{{asset('css/form.css')}}" rel="stylesheet" />
           <link href="{{asset('css/form_screen.css')}}" rel="stylesheet" />
        <script src="{{asset('auth.js')}}"></script>
	<title>PCPPO</title>
	
</head>
<body>
   @include('header_public')
	<main>
		 <div class="container-fluid">

                <!-- Mensagem de Sucesso -->
                @if (session('success'))
                    <div class="alert alert-success">
                         {!! session('success') !!}
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

                <!-- Formulário para Consultas Públicas -->
                <form class="formulario" action="{{ route('consultas_publicas.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <fieldset>
                        <h3>Cadastro de Consultas Públicas para  <strong>{{$plano->nome_plano}}</strong></h3>
                        <p>Preencha os campos abaixo para registrar uma consulta pública.</p>

                        <div class="row g-3 align-items-center">
                            <!-- Nome Completo -->
                            <div class="col-auto">
                                <label for="nome_completo" class="form-label">Nome Completo</label>
                                <input type="text" class="form-control" id="nome_completo" name="nome_completo" maxlength="255" required>
                            </div>

                            <!-- Data de Nascimento -->
                            <div class="col-auto">
                                <label for="data_nascimento" class="form-label">Data de Nascimento</label>
                                <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" required>
                            </div>

                            <!-- Gênero -->
                            <div class="col-auto">
                                <label for="genero" class="form-label">Gênero</label>
                                <select class="form-select" id="genero" name="genero" required>
                                    <option value="" disabled selected>Selecione o gênero</option>
                                    <option value="masculino">Masculino</option>
                                    <option value="feminino">Feminino</option>
                                    <option value="outro">Outro</option>
                                </select>
                            </div>

                            <!-- Número de BI -->
                            <div class="col-auto">
                                <label for="numero_bi" class="form-label">Número de BI</label>
                                <input type="text" class="form-control" id="numero_bi" name="numero_bi" maxlength="20" required>
                            </div>

                            <!-- E-mail -->
                            <div class="col-auto">
                                <label for="email" class="form-label">E-mail</label>
                                <input type="email" class="form-control" id="email" name="email" maxlength="255" required>
                            </div>
                        </div>
                        
                        <div class="row g-3 align-items-center">
                              <div class="col-auto">
                                <label for="email" class="form-label">Distrito abrangido</label>
                                <input type="distrito" class="form-control" id="distrito" value="{{$distrito->nome_distrito}}" name="distrito" maxlength="255" disabled>
                            </div>

                            <!-- Bairro -->
                            <div class="col-auto">
                                <label for="id_bairro" class="form-label">Bairro</label>
                                <select class="form-select" id="id_bairro" name="id_bairro" required>
                                    <option value="" disabled selected>Selecione o bairro</option>
                                    @foreach ($bairros as $bairro)
                                        <option value="{{ $bairro->id_bairro }}">{{ $bairro->nome_bairro }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Plano Consultado -->
                            <input type="hidden" name="id_plano" value="{{ $plano->id_plano }}">

                            <!-- Comentário -->
                            <div class="form-group">
                                <label for="comentario" class="form-label">Comentário / Contributo</label>
                                <textarea class="form-control" id="comentario" name="comentario" rows="3"></textarea>
                            </div>

                            <!-- Upload de Ficheiro -->
                            <div class="col-auto">
                                <label for="ficheiro_upload" class="form-label">Upload de Ficheiro (opcional)</label>
                                <input type="file" class="form-control" id="ficheiro_upload" name="ficheiro_upload" accept=".pdf, .doc, .docx, .jpg, .png">
                            </div>
                        </div>

                        <!-- Botão de envio -->
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </fieldset>
                </form>
            </div>

	</main>
@include('footer')
	<div class="modal fade bd-example-modal-lg" id="modal-edit-senha" tabindex="1" style="z-index:9999" role="dialog" aria-labelledby="myLargeModalLabel" padding="15px" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="list_docentes_title">Área de Autenticação</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form id="login" style="margin:15px" action="{{ route('login.process') }}" method="POST">
				<div id="error-messages" class="bg-red-200 p-3" style="display: none;">
					<ul id="error-list"></ul>
				</div>
				
				<!--@csrf  Token de segurança para formulários em Laravel -->
				<!--@csrf  Token de segurança para formulários em Laravel -->
				@csrf
                <div class="form-group">
                    <label>Email do Utilizador</label>
                    <input required="true" type="text" class="form-control" id="email" name="email" placeholder="Email">
                </div>
    
                <div class="form-group">
                    <label>Senha</label>
                    <input required="true" type="password" class="form-control" id="password" name="password" placeholder="Senha">
                </div>
          
       

            <!--@csrf  Token de segurança para formulários em Laravel -->
           
            </form>
			<div class="form-group">
            <button id="login_button" class="btn btn-primary">Autenticar</button>
          </div>
        </div>
    </div>
</div>

</body>
<script>
	    function show_Form(){
        $('.modal').modal('show');
    }
    window.onscroll = function() {myFunction()};
    
    var navbar = document.querySelector("header");
    var sticky = navbar.offsetTop;
    
    function myFunction() {
      if (window.pageYOffset >= sticky) {
        navbar.classList.add("sticky")
      } else {
        navbar.classList.remove("sticky");
      }
    }
    </script>
	<script>
    $(document).ready(function () {
        $('#login_button').on('click', function () {
            const formData = {
                email: $('#email').val(),
                password: $('#password').val(),
                _token: '{{ csrf_token() }}'
            };

            $.ajax({
                url: '{{ route('login.process') }}',
                type: 'POST',
                data: formData,
                success: function (response) {
                    if (response.success) {
                        window.location.href = response.redirect;
                    }
                },
                error: function (xhr) {
                    const errors = xhr.responseJSON.errors;
                    $('#error-list').empty();
                    for (const key in errors) {
                        $('#error-list').append('<li>' + errors[key][0] + '</li>');
                    }
                    $('#error-messages').show();
                }
            });
        });
    });
</script>
</html>
