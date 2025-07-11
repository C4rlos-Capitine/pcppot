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
			background-color: white;
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
			margin-top: 4rem;
			justify-content: center;
			position: relative;
			height: 100%;
			/* padding: 30px; */
			text-align: center;
	
		}
		.main-img{
			position: relative;
			width: 100%;
			height: 22rem;
			background-color: violet;
			padding: 2rem;
			z-index: -999;
			margin-bottom: 2rem;
			background-image: url("{{asset('mapa.png')}}");
			background-size: cover;
			background-position: center;
			background-repeat: no-repeat;
		}
		.main-img h3{
			width: 50%;
			top: 5%;
			position: relative;
			text-align: left;
			margin-left: 15%;
			font-weight: 700;
			color: #0b8e12;
			
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
			width: 200px;
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
			font-size: 14px;
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
			width: 70%;
			padding: 2.2rem;
			border-radius: 20px;
			border: solid 1px #4CAF50;
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
		a{
			text-decoration: none;
			color: #4CAF50;
			font-weight: 600;
		}

	</style>
</head>
<body>
   @include('header_public')
	<main>
		<section class="main-img">
			<h3 style="font-weight: 700; color: #0b8e12;">Bem-vindo à</h3>
			<h3 style="font-weight: 700; color: #0b8e12;">
				Plataforma de Consulta Pública para Planos de Ordenamento Territorial
			</h3>
		</section>
		<section class="info-section">
			<p>A criação de uma Plataforma de Consulta Pública para Planos de Ordenamento Territorial em Moçambique, especificamente no município de Maputo é justificada pelos princípios do Artigo 9 do Regulamento da Lei de Ordenamento do Território, que garante a participação pública em todas as fases dos processos de ordenamento. <br> <br>A plataforma visa facilitar o envolvimento dos cidadãos, proporcionando um meio digital acessível para envio de sugestões, realização de consultas e audiências públicas, além de assegurar a descentralização dessas atividades, promovendo a inclusão de comunidades rurais e periféricas. Além disso, ela cumpre os requisitos legais de transparência e responsabilização ao disponibilizar informações e justificar as decisões tomadas pelas autoridades. Ao digitalizar o processo, a plataforma também moderniza e democratiza o acesso, permitindo que mais cidadãos participem de forma ativa e informada no planeamento urbano do país.</p>
			<p>
	
		</section>
		<div class="row">
			<div class="card">
				<img  class ="img_card"src="people.jpg"  alt="Imagem 1">
				<p><a href="{{url('/contribuicoes/create')}}">Sugestões/Reclamações</a></p>
			</div>
			<div class="card">
				<img class ="img_card" src="people2.jpg" alt="Imagem 2">
				<p>Resultado das auscultações</p>
			</div>
			<div class="card">
				<img class ="img_card" src="people2.jpg" alt="Imagem 2">
				<p><a href="{{url('/propostas_comunitarias/create')}}">Propostas Comunitárias</a></p>
			</div>
				<div class="card">
				<img  class ="img_card"  src="terras2.jpg" alt="Imagem 1">
				<p><a href="{{url('/docs')}}">Consultar Planos/programas/projectos</a></p>
			</div>
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
