<?php
public function up()
{
    Schema::create('categorias', function (Blueprint $table) {
        $table->id();
        $table->string('nombre')->unique();
        $table->timestamps();
        $table->softDeletes(); // Agregar soporte para Soft Deletes
    });
}