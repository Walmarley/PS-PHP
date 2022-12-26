<x-layout title="Adicionar User">
    <form method="POST" action="{{  route('user.store') }}" class="mt-2">
        
        @csrf
        <div class="form-group">
            <label for="name">Nome User</label>
            <input type="text" class="form-control" id="name" name="name" value="" required >
        </div>

        <div class="form-group">
            <label for="email"> E-mail </label>
            <input type="email" class="form-control" id="email" name="email" value="" required >
        </div>

        <div class="form-group">
            <label for="password">Senha</label>
            <input type="password" class="form-control" id="password" name="password" value="" required >
        </div>

        <div>
            <button type="submit" class="btn btn-primary mt-2"> Cadastrar </button>
        </div>

        <a href="{{  route('log') }}" class="btn btn-secondary mt-3">
            Voltar
        </a>

    </form>

</x-layout>