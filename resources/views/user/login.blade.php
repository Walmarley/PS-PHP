<x-layout title="Logar">
    <form method="POST" action="{{  route('login') }}" class="mt-2">
        
        @csrf
        <div class="form-group">
            <label for="email"> E-mail </label>
            <input type="email" class="form-control" id="email" name="email" value="" required >
        </div>

        <div class="form-group">
            <label for="password">Senha</label>
            <input type="password" class="form-control" id="password" name="password" value="" required >
        </div>

        <div>
            <button type="submit" class="btn btn-primary mt-2"> Logar </button>
        </div>

        <a href="{{  route('adduser') }}" class="btn btn-secondary mt-3">
            Criar User
        </a>

    </form>

</x-layout>