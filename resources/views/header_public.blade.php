	<style>
		
		header {
			margin-right: 20px;
			background-color: white !important;
		padding-right: 0.7rem;
			text-align: initial;
			width: 100%;
			display: flex;
			flex-direction: row;
		}
                nav{
            background-color: white !important
        }
        .navbar-light{
            background-color: white !important;
        }
				.section-div{
			width: 100%;
			height: fit-content;
			background-color: #66BB6A;
			h4{
				color: white;
			}
			h3{
			color: white;	
			}
		}
	</style>
	
	
	<header>
		<a href="/"><img width="70px" height="70px" style="margin-top: 0; margin-left: 0;" src="{{asset('logo.png')}}"/></a>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
		<li class="nav-item active">
			<a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="{{url('/docs')}}">Consultar planos</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="{{url('/contribuicoes/create')}}">Contribuições</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="{{url('/propostas_comunitarias/create')}}">Propostas Comunitárias</a>
		</li>
		</ul>
		<form class="form-inline my-2 my-lg-0">
		<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
		<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
		</form>
	</div>
	</nav>
		<h1 >Plataforma de Consulta Pública para Planos de Ordenamento Teritorial</h1>
		<button id="quit-link" width="fit-content" href="" class="btn btn-primary" onclick="show_Form()">Entrar<i class="fa-solid fa-right-to-bracket"></i></button>
	</header>