 @if ($errors->any())
        <div class="alert alert-warning shadow">
            <h4 class="text-danger">Errores detectados:</h4>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif