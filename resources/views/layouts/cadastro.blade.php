<form action="{{ route('/api/evento') }}" method="post">
    @csrf

    <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome') }}">
    </div>

    <div class="form-group">
        <label for="data">Data</label>
        <input type="text" class="form-control" id="data" name="data" value="{{ old('data') }}">
    </div>

    <div class="form-group">
        <label for="local">Local</label>
        <input type="text" class="form-control" id="local" name="local" value="{{ old('local') }}">
    </div>

    <div class="form-group">
        <label for="responsavel">Responsável</label>
        <input type="text" class="form-control" id="responsavel" name="responsavel" value="{{ old('responsavel') }}">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>