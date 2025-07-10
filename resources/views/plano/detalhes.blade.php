<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script type="text/javascript" src="{{asset('jquery-3.7.0.js')}}"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
        <link href="{{asset('css/form.css')}}" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Estilos -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css"/>
        <link href="{{asset('fontawsome/css/all.min.css')}}" rel="stylesheet">
        <link href="{{asset('fontawsome/css/fontawesome.min.css')}}" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
<link href="{{asset('css/form.css')}}" rel="stylesheet" />
        <!-- Scripts -->
        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
        <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
			background-color: white !important;
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
            margin: 2rem auto;
            width: 80%;
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
        /* Style the tab */
    .tab {
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
    }

    /* Style the buttons inside the tab */
    .tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 17px;
    }

    /* Change background color of buttons on hover */
    .tab button:hover {
    background-color: #ddd;
    }

    /* Create an active/current tablink class */
    .tab button.active {
    background-color: #ccc;
    }

    /* Style the tab content */
    .tabcontent {
    display: none;
    padding: 6px 12px;
    border: 1px solid #ccc;
    border-top: none;
    }

	</style>
</head>
<body>
        @include('header_public')
	<main>

        	<div class="section-div"><h4>Detalhes do plano</h4></div>

        <div class="tab">
        <button class="tablinks" onclick="openCity(event, 'London')">Dados do Plano</button>
        <button class="tablinks" onclick="openCity(event, 'Paris')">Documentos</button>
        <button class="tablinks" onclick="openCity(event, 'Tokyo')">Comentários</button>
        </div>

        <div id="London" class="tabcontent">
 <fieldset>
                    <legend></legend>
                <table class="table table-sm">
                    <tbody>
                        <tr>
                            <th>Tipo</th>
                            <td>{{ ucfirst($plano->tipo_plano_programa_projeto) }}</td>
                        </tr>
                        <tr>
                            <th>Nome do Plano</th>
                            <td>{{ $plano->nome_plano }}</td>
                        </tr>
                        <tr>
                            <th>Data de Elaboração</th>
                            <td>{{ $plano->data_elaboracao }}</td>
                        </tr>
                        <tr>
                            <th>Tipo de Plano</th>
                            <td>
                             {{$plano->nome_tipo_plano}}
                            </td>
                        </tr>
                        <tr>
                            <th>Data de Início</th>
                            <td>{{ $plano->data_inicio }}</td>
                        </tr>
                        <tr>
                            <th>Data de Fim</th>
                            <td>{{ $plano->data_fim }}</td>
                        </tr>
                        <tr>
                            <th>Área Abrangida (km²)</th>
                            <td>{{ $plano->area_abrangida }}</td>
                        </tr>
                        <tr>
                            <th>Latitude</th>
                            <td>{{ $plano->latitude }}</td>
                        </tr>
                        <tr>
                            <th>Longitude</th>
                            <td>{{ $plano->longitude }}</td>
                        </tr>
                        <tr>
                            <th>Densidade de Habitantes por km²</th>
                            <td>{{ $plano->densidade_habitantes }}</td>
                        </tr>
                        <tr>
                            <th>Objetivos</th>
                            <td>{{ $plano->objectivos }}</td>
                        </tr>
                        <tr>
                            <th>Distrito</th>
                            <td>
                                {{$plano->nome_distrito}}
                            </td>
                        </tr>
                        <tr>
                            <th>Descrição do Plano</th>
                            <td>{{ $plano->descricao_plano }}</td>
                        </tr>
                        <tr>
                            <th>Número de Consultas feitas</th>
                            <td>{{ $count }}</td>
                        </tr>
                        
                    </tbody>
                </table>
                </fieldset>
        </div>

        <div id="Paris" class="tabcontent">
<fieldset>
                
                <legend>Documentos</legend>
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>Nome do Documento</th>
                        
                            <th>Data de Criação</th>
                            <th>Ação</th>
                        </tr>
                    <tbody>
                        @foreach ($documentos as $documento)
                            <tr>
                                <td>{{ $documento->nome_documento }}</td>
                                
                                <td>{{ $documento->created_at }}</td>
                                <td>
                                <a href="{{ url('/plano/download/' . $documento->id_plano . '/' . $documento->id_documento) }}" class="btn btn-primary">Baixar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </fieldset>
        </div>

        <div id="Tokyo" class="tabcontent">
 <fieldset>
                <h2><i class="bi bi-chat-dots"></i>Consultas públicas</h2>
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Comentário</th>

                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($consultas as $consulta)
                    <tr>
                        <td>{{ $consulta->comentario }}</td>

                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>

                                <th>Comentário</th>
                    </tr>
                </tfoot>
            </table>
            </fieldset>
        </div>
               
                
               

    </main>
     <script>
    function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
    }
    </script>
</body>