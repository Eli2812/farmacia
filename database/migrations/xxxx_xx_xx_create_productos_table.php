<?php
public function up()
{
    Schema::create('productos', function (Blueprint $table) {
        $table->id();
        $table->string('nombre');
        $table->text('descripcion')->nullable();
        $table->decimal('precio', 10, 2);
        $table->unsignedBigInteger('categoria_id');
        $table->timestamps();

        $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');
    });
}