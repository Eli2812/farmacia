<?php
public function up()
{
    Schema::create('categorias', function (Blueprint $table) {
        $table->id();
        $table->string('nombre');
        $table->timestamps();
    });
}