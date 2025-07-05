<style>

.list-group-item{
        cursor: pointer;
       /* background: #2196F3 !important;*/
       background-color: #4CAF50 !important;
       color: white !important;;
        height: 10px;
    }
    i{
        margin-right: 10px;
    }

    #sidebar-wrapper{
      /*  background: #2196F3 !important;*/
      background-color: #4CAF50 !important;
    }
    .list-group-flush .list-group-item {
        padding: 25px !important;
    }
    .list-group-item-action:hover {
        background-color: #C5E1A5!important;
    }

</style>

<div class="border-end bg-white" id="sidebar-wrapper">
    <div class="sidebar-heading border-bottom bg-light"><img id="icon" style="width:70px" src="{{asset('logo.png')}}"/></div>
    <div class="list-group list-group-flush">
        <a class="list-group-item list-group-item-action list-group-item-light p-3" href="/main"><i class="bi bi-speedometer2"></i>Dashboard</a>
        <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{route('plano.all')}}"><i class="bi bi-list-task"></i>Planos</a>
        <!--<a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Programas</a>{{ route('distrito.store') }}
        <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Projectos</a>-->
        <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{route('documentacao_plano.gesta_doc')}}"><i class="bi bi-file-earmark-text"></i>Documentos</a>
        <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{route('contribuicoes.index')}}"><i class="bi bi-envelope"></i>Contribuições</a>
        <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{route('propostas_comunitarias.index')}}"><i class="fa-solid fa-comments"></i>Propostas Comunitarias</a>
        <div class="list-group-item list-group-item-action list-group-item-light p-3 dropdown pb-1 nav-content" id="load-contrato-view">
            <a href="#" class="list-group-item list-group-item-action list-group-item-light p-3 dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="d-none d-sm-inline mx-1"><i class="bi bi-compass" style="color:white; margin-right:5px"></i>Regiões</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                <div data-value="/distrito" class="nav-content clickable"><a class="list-group-item" href="/distrito">Distritos</a></div>
                <div data-value="/bairro" class="nav-content clickable"><a class="list-group-item" href="/bairro">bairro</a></div>
                
            </ul>
        </div>
    </div>
</div>
<!-- Bootstrap core JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>