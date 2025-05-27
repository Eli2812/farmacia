<h1>Editar Producto</h1>
<form method="POST" action="{{ route('productos.update', $producto) }}">
    @csrf @method('PUT')
    <input type="text" name="nombre" value="{{ $producto->nombre }}">
    <input type="text" name="descripcion" value="{{ $producto->descripcion }}">
    <input type="number" step="0.01" name="precio" value="{{ $producto->precio }}">
    <input type="number" name="stock" value="{{ $producto->stock }}">
    <button type="submit">Actualizar</button>
</form>
