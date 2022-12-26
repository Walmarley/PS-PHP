<x-layout title="Veiculos">
<ul style="list-style-type:circle">
    
    
        <a href="{{ route('addvehicle') }}" class="btn btn-primary btn-sm">
            Adicionar Novo Veiculo
        </a>
        
        <a href="{{ route('schedulingUser') }}" class="btn btn-info btn-sm">
            Suas Manutenções dessa Semana
        </a>
           
    @foreach ($vehicles as $vehicle)
    <br><br>
        <li class="list-group-item list-group-item-dark">
            Placa {{ $vehicle->plate }} 
        </li>
        <li class="list-group-item list-group-item-secondary"> 
            Marca {{ $vehicle->mark}}
        </li>
        <li class="list-group-item list-group-item-secondary"> 
            Modelo {{ $vehicle->model}}
        </li>
        <li class="list-group-item list-group-item-secondary"> 
            Versão {{ $vehicle->version}}
        </li>
        <li class="list-group-item list-group-item-secondary"> 
            Cor {{ $vehicle->color}}
        </li>
        
            <span class="d-flex">
                <a href="{{ route('manutencao.index', $vehicle->id) }}" class="btn btn-primary btn-sm">
                    <button class="btn btn-primary btn-sm">
                        Ver Manutenções
                    </button>
                </a>

                <a href="{{ route('editVehicles', $vehicle->id) }}" class="btn btn-primary btn-sm">
                    <button class="btn btn-primary btn-sm">
                        Editar Veiculo
                    </button>
                </a>

                <form action="{{ route('veiculo.destroy', $vehicle->id) }}" method="post" class="ms-2">
                    @csrf
                    @method('DELETE')
                        <button class="btn btn-danger btn-sm">
                            Excluir Veiculo
                        </button>
                </form>               
            </span>   
    
    @endforeach

</ul>
</x-layout> 

