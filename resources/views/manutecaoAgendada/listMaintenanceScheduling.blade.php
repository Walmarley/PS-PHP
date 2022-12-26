<x-layout title="Agendamento da Semana">
    <ul style="list-style-type:circle">
        
            <a href="{{ route('vehicles.index') }}" class="btn btn-primary btn-sm">
                Voltar
            </a> 
    
        @foreach ($maintenanceScheduleds as $maintenanceScheduled)
            
                <ul class="list-group">
                  
                    <li class="list-group-item justify-content-between align-items-center list-group-item-secondary">
                       Placa - {{ $maintenanceScheduled->plate }}  
                    </li>

                    <li class="list-group-item justify-content-between align-items-center list-group-item-light">
                        Agendamento - {{ $maintenanceScheduled->scheduling }} 
                    </li>

                    <li class="list-group-item justify-content-between align-items-center list-group-item-light">
                        Descrição do problema - {{ $maintenanceScheduled->description }} 
                    </li>

                    <li class="list-group-item justify-content-between align-items-center list-group-item-light">
                        Tipo de Manutenção - {{ $maintenanceScheduled->maintenance }} 
                    </li>

                    <li class="list-group-item justify-content-between align-items-center list-group-item-light">
                        Modelo Do carro - {{ $maintenanceScheduled->model }} 
                    </li>

                    <li class="list-group-item justify-content-between align-items-center list-group-item-light">
                        Marca - {{ $maintenanceScheduled->mark }} 
                    </li>
                    <br>
                </ul>
             
        @endforeach
    
    </ul>
    </x-layout> 
    
    