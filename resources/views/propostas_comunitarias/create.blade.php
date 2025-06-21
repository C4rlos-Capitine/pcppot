<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="fontawsome/css/all.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script type="text/javascript" src="jquery-3.7.0.js"></script>
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap-extended.min.css">
<link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/fonts/simple-line-icons/style.min.css">
<link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/colors.min.css">
<link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
   <link href="{{asset('css/form.css')}}" rel="stylesheet" />
        <script src="{{asset('auth.js')}}"></script>

	<title>PCPPO</title>
	<style>
		body {
			justify-content: center;
			margin: 0;
			width: 100%;
			/*height: 100%;*/
			font-family: Arial, sans-serif;
		}

		header {
			margin-right: 20px;
			background-color: #E8F5E9;
		padding-right: 0.7rem;
			text-align: initial;
			width: 100%;
			display: flex;
			flex-direction: row;
		}
		h1{
			font-size: 16px;
			color: #2E7D32;
			margin: 20px;
		}

		header a {
			color: black;
			text-decoration: none;
			margin: 0 15px;
			font-size: 18px;
		}
		main{
			margin-top: 3.0rem;
			justify-content: center;
			height: 100%;
			padding: 30px;
			text-align: center;
		}
		.btn{
			height: fit-content;
			margin-top: 10px;
			margin-left: 50rem;
			background-color: #4CAF50 ;
			margin-left: auto;
		}

		.row {
			display: flex;
			justify-content: center;
			align-items: flex-start;
			gap: 20px;
			margin-top: 20px;
		}

		.card {
			width: 300px;
			display: flex;
			flex-direction: column;
			align-items: center;
			border: 1px solid #ddd;
			border-radius: 10px;
			overflow: hidden;
			background: #fff;
			text-align: center;
			padding: 0;

		}

		.card img {
			width: 100%;
			height: 150px;
			object-fit: cover;
			padding: 0;
		}

		.card p {
			margin: 10px 0;
			padding: 10px;
			font-size: 16px;
			color: #333;
		}
		footer {
			background-color: black;
			color: white;
			text-align: center;
			padding: 20px;
			position: relative;
			bottom: 0;
			width: 100%;
			height: 10rem;
			p{
				color: #4CAF50;
			}
		}
		.info-section{
			/*background-color: #FFF176;*/
			margin: auto;
			width: 90%;
			padding: 2.2rem;
			border-radius: 20px;
			border: 2px solid #E8F5E9;
			p{
				color: #2E7D32;
				text-align: justify;
			}
		}
		.sticky {
            position: fixed;
            top: 0;
            width: 100%;
        }
        .sticky + .content {
        	padding-top: 60px;
        }
        @media (max-width: 720px) {
		  body {
		    
		  }
		  .row{
		  	flex-direction: row;
		  }
		}

		form{
			display: flex;
			flex-direction: column;
		}

		#login_button{
			width: auto;
			margin-left: 10px;
		}
		.img_card{
			width: 100%;
			border-start-end-radius: 20px 20px;
			margin-left: 0;
		}

	</style>
</head>
<body>
       @include('header_public')

	<main>
        
		 <div class="container-fluid">

                <!-- Mensagem de Sucesso -->
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
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

                <!-- Formulário para Propostas Comunitárias -->
                <form class="formulario" action="{{ route('propostas_comunitarias.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <fieldset>
                        <h3>Cadastro de Propostas Comunitárias</h3>
                        <p>Preencha os campos abaixo para registrar uma proposta comunitária.</p>

                        <div class="row g-3 align-items-center">
                            <!-- Nome do Proponente -->
                            <div class="col-auto">
                                <label for="nome_proponente" class="form-label">Nome do Proponente ou Grupo</label>
                                <input type="text" class="form-control" id="nome_proponente" name="nome_proponente" maxlength="255" required>
                            </div>

                            <!-- Contacto -->
                            <div class="col-auto">
                                <label for="contacto" class="form-label">Contacto (E-mail ou Telefone)</label>
                                <input type="text" class="form-control" id="contacto" name="contacto" maxlength="255" required>
                            </div>

                            <!-- Bairro -->
                            <div class="col-auto">
                                <label for="id_bairro" class="form-label">Bairro/</label>
                                <select class="form-select" id="id_bairro" name="id_bairro" required>
                                    <option value="" disabled selected>Selecione o bairro</option>
                                    @foreach ($bairros as $bairro)
                                        <option value="{{ $bairro->id_bairro }}">{{ $bairro->nome_bairro }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Tipo de Intervenção -->
                            <div class="col-auto">
                                <label for="tipo_intervencao" class="form-label">Tipo de Intervenção</label>
                                <select class="form-select" id="tipo_intervencao" name="tipo_intervencao" required>
                                    <option value="" disabled selected>Selecione o tipo</option>
                                    <option value="infraestrutura">Infraestrutura</option>
                                    <option value="espaco_publico">Espaço Público</option>
                                    <option value="equipamento_social">Equipamento Social</option>
                                    <option value="uso_do_solo">Uso do Solo</option>
                                    <option value="outro">Outro</option>
                                </select>
                            </div>

                            <!-- Localização -->
                            <div class="col-auto">
                                <label for="localizacao" class="form-label">Localização</label>
                                <input type="text" class="form-control" id="localizacao" name="localizacao" maxlength="255">
                            </div>

                            <!-- Descrição da Proposta -->
                            <div class="form-group">
                                <label for="descricao_proposta" class="form-label">Descrição da Proposta</label>
                                <textarea class="form-control" id="descricao_proposta" name="descricao_proposta" rows="3" required></textarea>
                            </div>

                            <!-- Upload de Documento de Apoio -->
                            <div class="col-auto">
                                <label for="documento_apoio" class="form-label">Upload de Documento de Apoio (opcional)</label>
                                <input type="file" class="form-control" id="documento_apoio" name="documento_apoio" accept=".pdf, .doc, .docx, .jpg, .png">
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
