<x-layout title="Adicionar Veiculo">
    <form method="POST" action="{{  route('vehicleStore') }}" class="mt-2">
        
        @csrf
        <div class="form-group">
            <label for="name">Marca do Veiculo</label>
            <input type="text" class="form-control" id="mark" name="mark" value="" required >
        </div>

        <div class="form-group">
            <label for="name">Versão do Veiculo</label>
            <input type="text" class="form-control" id="version" name="version" value="" required >
        </div>

        <div class="form-group">
            <label for="name">Modelo do Veiculo</label>
            <input type="text" class="form-control" id="model" name="model" value="" required >
        </div>

        <div class="form-group">
            <label for="name">Modelo do Veiculo</label>
            <input type="text" class="form-control" id="color" name="color" value="" required >
        </div>

        <div class="form-group">
            <label for="name">Placa do Veiculo</label>
            <input type="text" class="form-control" id="plate" name="plate" value="" required >
        </div>

        <div>
            <button type="submit" class="btn btn-primary mt-2"> Cadastrar </button>
        </div>

        {{-- <a href="{{  route('user.log') }}" class="btn btn-secondary mt-3"> --}}
            Voltar
        </a>

    </form>

</x-layout>