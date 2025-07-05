<!-- Page content wrapper-->
<!-- esta div será fechada no ficheiro principal de cada página -->
<!-- Top navigation-->
 <style>
    .navbar{
       background-color: #C5E1A5 !important;
    }
    #sidebarToggle{
        color: #4CAF50;
        cursor: pointer;
    }
 </style>
 <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
    <div class="container-fluid">
    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-arrow-bar-left"  id="sidebarToggle" viewBox="0 0 16 16">
         <path fill-rule="evenodd" d="M12.5 15a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5M10 8a.5.5 0 0 1-.5.5H3.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L3.707 7.5H9.5a.5.5 0 0 1 .5.5"/>
    </svg>
        <!--<button class="btn btn-primary" id="sidebarToggle">Toggle Menu</button>-->
        <!--<button class="btn btn-primary" id="sidebarToggle" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample"><span class="navbar-toggler-icon"></span></button>-->
        <a class="navbar-brand" href="#!">Plataforma de Consulta Pública para Planos de Ordenamento Teritorial</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">

                <li class="nav-item"><form class="btn-danger" action="{{ route('logout') }}" method="POST" style="display:inline;">
    @csrf
    <button type="submit" class="btn-danger" style="">Sair</button>
</form></li>
            </ul>
        </div>
    </div>
</nav>