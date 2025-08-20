<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Tabla cliente
        Schema::create('cliente', function (Blueprint $table) {
            $table->id('id_cliente');
            $table->string('nombre', 100);
            $table->string('email', 100);
            $table->string('telefono', 20)->nullable();
            $table->text('direccion')->nullable();
        });

        // Tabla usuario
        Schema::create('usuario', function (Blueprint $table) {
            $table->id('id_usuario');
            $table->string('nombre', 100);
            $table->string('email', 100)->unique();
            $table->string('password', 255);
            $table->enum('rol', ['admin', 'vendedor', 'supervisor']);
        });

        // Tabla producto
        Schema::create('producto', function (Blueprint $table) {
            $table->id('id_producto');
            $table->string('nombre', 100);
            $table->text('descripcion')->nullable();
            $table->decimal('precio_unitario', 10, 2);
            $table->integer('stock')->default(0);
        });

        // Tabla cotizacion
        Schema::create('cotizacion', function (Blueprint $table) {
            $table->id('id_cotizacion');
            $table->date('fecha');
            $table->decimal('total', 10, 2);
            $table->enum('estado', ['pendiente', 'enviada', 'aprobada', 'rechazada'])->default('pendiente');
            $table->unsignedBigInteger('id_cliente');
            $table->unsignedBigInteger('id_usuario');

            $table->foreign('id_cliente')->references('id_cliente')->on('cliente');
            $table->foreign('id_usuario')->references('id_usuario')->on('usuario');
        });

        // Tabla cotizacion_detalle
        Schema::create('cotizacion_detalle', function (Blueprint $table) {
            $table->id('id_detalle');
            $table->integer('cantidad');
            $table->decimal('subtotal', 10, 2);
            $table->unsignedBigInteger('id_cotizacion');
            $table->unsignedBigInteger('id_producto');

            $table->foreign('id_cotizacion')->references('id_cotizacion')->on('cotizacion');
            $table->foreign('id_producto')->references('id_producto')->on('producto');
        });

        // Tabla historial
        Schema::create('historial', function (Blueprint $table) {
            $table->id('id_historial');
            $table->string('accion', 255);
            $table->dateTime('fecha')->useCurrent();
            $table->unsignedBigInteger('id_usuario');
            $table->unsignedBigInteger('id_cotizacion')->nullable();

            $table->foreign('id_usuario')->references('id_usuario')->on('usuario');
            $table->foreign('id_cotizacion')->references('id_cotizacion')->on('cotizacion');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historial');
        Schema::dropIfExists('cotizacion_detalle');
        Schema::dropIfExists('cotizacion');
        Schema::dropIfExists('producto');
        Schema::dropIfExists('usuario');
        Schema::dropIfExists('cliente');
    }
};
