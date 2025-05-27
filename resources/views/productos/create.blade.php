<h1>Crear Producto</h1>
<form method="POST" action="{{ route('productos.store') }}">
    @csrf
    <input type="text" name="nombre" placeholder="Nombre">
    <input type="text" name="descripcion" placeholder="Descripción">
    <input type="number" step="0.01" name="precio" placeholder="Precio">
    <input type="number" name="stock" placeholder="Stock">
    <button type="submit">Guardar</button>
</form>
