<x-layout title="Editar Manutenção">
    <form method="POST" action="{{  route('maintenanceupdate', $vehicle_id)}}" class="mt-2">
        @method('PUT')
        @csrf
        
        <div class="form-group">
            <label for="name">Tipo de mantenção</label>
            <input type="text" class="form-control" id="maintenance" name="maintenance" value="" required >
        </div>

        <div class="form-group">
            <label for="name">Descrição do problema</label>
            <input type="text" class="form-control" id="description" name="description" value="" required >
        </div>

        <div class="form-group">
            <label for="name">Data do agendamento</label>
            <input type="date" class="form-control" id="scheduling" name="scheduling" value="" required >
        </div>

        <div>
            <button type="submit" class="btn btn-primary mt-2"> 
                Editar 
            </button>
        </div>

        <a href="{{  route('vehicles.index') }}" class="btn btn-secondary mt-3">
            Voltar
        </a>

    </form>

</x-layout>