<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script type="text/javascript" src="{{asset('jquery-3.7.0.js')}}"></script>
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

        nav{
            background-color: white !important
        }
        ..navbar-light{
            background-color: white !important;
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
			margin-top: 3.0rem;
			justify-content: center;
			height: 100%;
			padding: 30px;
			text-align: center;
            background-color:rgb(237, 243, 239);
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
		}

		.card img {
			width: 100%;
			height: 150px;
			object-fit: cover;
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
			position: fixed;
			bottom: 0;
			width: 100%;
			height: 10rem;
		}
		.info-section{
			background-color: #FFF8E1;
			margin: auto;
			width: 80%;
			padding: 2.2rem;
		}
		.sticky {
            position: fixed;
            top: 0;
            width: 100%;
        }
        .sticky + .content {
        	padding-top: 60px;
        }

        .post-section {
            margin: 0.5rem auto;
            width: 90%;
        }
        .post {
            background-color: #ECEFF1;
            border-radius: 0.5rem;
            padding: 1rem;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .img-post img {
            width: 50px;
            height: 50px;
        }
        .inf-post {
            flex-grow: 1;
            margin-left: 1rem;
        }
        .inf-post h2 {
            font-size: 1.2rem;
            margin: 0;
        }
        .inf-post label {
            font-size: 0.9rem;
            color: #555;
        }
        .content {
            display: none;
            margin-top: 1rem;
            padding: 1rem;
            background-color: #f1f1f1;
            border-radius: 0.5rem;
        }
        @media (max-width: 500px) {
		  body {
		    
		  }
	        .post{
	        	border-radius: 0.2rem 0.2rem;
	        	padding: 1.4rem;
	        	margin: 1.4rem;
	        	width: 90%;

	        	background-color: #ECEFF1;
	        	display: flex;
			    flex-direction: column;
	        }
    	}
		#quit-link{
			height: fit-content;
			margin-top: 10px;
			margin-left: auto;
			background-color: #4CAF50 ;
		}

		.download-doc{
			width: fit-content;	
			margin-top: 0 ;
			background-color: #4CAF50 ;
			margin-left: auto;
		}
		.section-div{
			width: 100%;
			height: fit-content;
			background-color: #66BB6A;
			h4{
				color: white;
			}
		}

		/* Style for the button */


		/* Style for the collapsible content */
		.content {
		    padding: 0 18px;
		    display: none; /* Hidden by default */
		    overflow: hidden;
		    background-color: #f1f1f1;
		}
        .imagem{
            cursor: pointer;
        }
	</style>
</head>
<body>
        @include('header_public')
	<main>

		<div class="section-div"><h4>Projectos/Planos/Programas para Auscultação</h4></div>

		<section class="post-section">
        @foreach ($planos as $plano)
            <div class="card mb-3" style="width: 22rem; display: inline-block; margin: 10px; vertical-align: top;">
                <div class="card-body">
                    <h5 class="card-title">{{ $plano->nome_plano }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted"></h6>
                    <p class="card-text">
                        <strong>Data de Início:</strong> {{ $plano->data_inicio }}<br>
                        <strong>Data de Fim:</strong> {{ $plano->data_fim }}<br>
                        <strong><i class="bi bi-chat-dots"></i>Consultas {{ $plano->consultas_publicas_count }}</strong></br>
                        <a class="btn btn-primary" id="{{ $plano->id_plano }}" href="{{ route('plano.details', $plano->id_plano) }}">Detalhes</a>
                    </p>
                    <a href="{{ url('/plano/download_doc/' . $plano->id_plano) }}" class="card-link">Baixar o documento</a>
                    <a href="{{ route('consultas_publicas.public_create', ['id_plano' => $plano->id_plano]) }}" class="card-link">Consultar plano</a>

                </div>
            </div>
        @endforeach

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
            @csrf
            <div id="error-messages" class="bg-red-200 p-3" style="display: none;">
                <ul id="error-list"></ul>
            </div>
                <div class="form-group">
                    <label>Nome de Utilizador</label>
                    <input required="true" type="email" class="form-control" id="email" name="email" placeholder="email">
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
        $('#modal-edit-senha').modal('show');
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


        // Adiciona funcionalidade de colapsar
        document.querySelectorAll('.collapsible').forEach(button => {
            button.addEventListener('click', function () {
                const content = document.getElementById('content-' + this.id);
                if (content.style.display === 'block') {
                    content.style.display = 'none';
                } else {
                    content.style.display = 'block';
                }
            });
        });

        // Função para carregar documentos via AJAX
// Função para carregar documentos via AJAX e exibi-los no modal
function carregarDocumentos(idPlano) {
    // URL da rota para buscar os documentos
    const url = `/docs/plano/${idPlano}`;

    // Fazer a requisição AJAX
    fetch(url)
        .then(response => response.json())
        .then(data => {
            // Selecionar o modal e o conteúdo do modal
            const modalContent = document.querySelector('.modal-content');

            // Limpar o conteúdo atual do modal
            modalContent.innerHTML = '';

            // Verificar se há documentos
            if (data.length > 0) {
                // Criar um título para o modal
                const title = document.createElement('h5');
                title.classList.add('modal-title', 'p-3');
                title.textContent = 'Documentos Disponíveis';
                modalContent.appendChild(title);

                // Criar uma lista de links para os documentos
                const ul = document.createElement('ul');
                ul.classList.add('list-group', 'list-group-flush');
                data.forEach(doc => {
                    const li = document.createElement('li');
                    li.classList.add('list-group-item');
                    const link = document.createElement('a');
                    link.href = '/docs/download/'+doc.id_documento; // Caminho do documento
                    link.textContent = doc.nome_documento; // Nome do documento
                    link.target = '_blank'; // Abrir em uma nova aba
                    li.appendChild(link);
                    ul.appendChild(li);
                });
                modalContent.appendChild(ul);
            } else {
                // Exibir mensagem caso não haja documentos
                modalContent.innerHTML = '<p class="p-3">Não há documentos disponíveis para este plano.</p>';
            }

            // Exibir o modal
            const modal = new bootstrap.Modal(document.querySelector('.bd-example-modal-sm'));
            modal.show();
        })
        .catch(error => {
            console.error('Erro ao carregar documentos:', error);
        });
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
