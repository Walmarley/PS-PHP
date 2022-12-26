<x-layout title="Agenda de Manutenções">
<ul style="list-style-type:circle">


        <a href="{{ route('addMaintenance', $vehicle_id) }}" class="btn btn-primary btn-sm">
            Marcar nova manutenção
        </a>

    @foreach ($maintenances as $maintenance)
    
        <li class="list-group-item list-group-item-dark">
            Tipo de Manutençao <br><h2> {{ $maintenance->maintenance }} </h2>
        </li>
        <li class="list-group-item list-group-item-secondary"> 
            - Descrição <br><h2> {{ $maintenance->description}} </h2>
        </li>
        <li class="list-group-item list-group-item-secondary">
            - Data marcada <br><h2> {{ $maintenance->scheduling}} </h2>
        </li>
            
            <br>
            <form action="{{ route('editMaintenance', $maintenance->id) }}" method="put" class="ms-2">
                @csrf
                @method('UPDATE')
                    <button class="btn btn-success btn-sm">
                        Editar
                    </button>
            </form> 
            <br>
                
            <form action="{{ route('manutencao.destroy', $maintenance->id) }}" method="post" class="ms-2">
                   
                @csrf
                @method('DELETE')
                    <button class="btn btn-danger btn-sm">
                        Cancelar 
                    </button>
            </form> 
            <br>  <br> 

        @endforeach
        <a href="{{ route('vehicles.index') }}" class="btn btn-primary btn-sm">
            Voltar
        </a>
</ul>
</x-layout> 

