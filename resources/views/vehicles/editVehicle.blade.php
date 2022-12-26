<x-layout title="Editar Veiculo">
    <form method="POST" action="{{  route('vehicleupdate', $vehicle_id)}}" class="mt-2">
        @method('PUT')
        @csrf
        
        <div class="form-group">
            <label for="name">Marca do veiculo</label>
            <input type="text" class="form-control" id="mark" name="mark" value="" required >
        </div>

        <div class="form-group">
            <label for="name">Versão do Veiculo</label>
            <input type="text" class="form-control" id="version" name="version" value="" required >
        </div>

        <div class="form-group">
            <label for="name">Modelo Do Veiculo</label>
            <input type="date" class="form-control" id="model" name="model" value="" required >
        </div>

        <div class="form-group">
            <label for="name">Cor do Veiculo</label>
            <input type="date" class="form-control" id="color" name="color" value="" required >
        </div>

        <div class="form-group">
            <label for="name">Numero da placa</label>
            <input type="date" class="form-control" id="plate" name="plate" value="" required >
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