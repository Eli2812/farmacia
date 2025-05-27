<h1>Lista de Productos</h1>
<a href="{{ route('productos.create') }}">Crear Producto</a>
<ul>
    @foreach($productos as $producto)
        <li>
            {{ $producto->nombre }} - ${{ $producto->precio }}
            <a href="{{ route('productos.edit', $producto) }}">Editar</a>
            <form action="{{ route('productos.destroy', $producto) }}" method="POST" style="display:inline;">
                @csrf @method('DELETE')
                <button type="submit">Eliminar</button>
            </form>
        </li>
    @endforeach
</ul>
