<?php
public function up()
{
    Schema::create('proveedors', function (Blueprint $table) {
        $table->id();
        $table->string('nombre');
        $table->string('email')->nullable();
        $table->string('telefono')->nullable();
        $table->string('direccion')->nullable();
        $table->timestamps();
    });
}