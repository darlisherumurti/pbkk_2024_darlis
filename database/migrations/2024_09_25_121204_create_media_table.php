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
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->string('file_name');
            $table->string('file_path');
            $table->string('file_type');
            $table->integer('file_size');
            $table->timestamps();
        });

        // Schema::create('media_metadata', function (Blueprint $table) {
        //     $table->id('metadata_id');
        //     $table->unsignedBigInteger('media_id');
        //     $table->string('meta_key');
        //     $table->string('meta_value');
        //     $table->timestamps();

        //     $table->foreign('media_id')->references('media_id')->on('media')->onDelete('cascade');
        // });


        // Schema::create('media_relations', function (Blueprint $table) {
        //     $table->id('relation_id');
        //     $table->unsignedBigInteger('media_id');
        //     $table->string('entity_type');
        //     $table->unsignedBigInteger('entity_id');
        //     $table->timestamps();

        //     $table->foreign('media_id')->references('media_id')->on('media')->onDelete('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('media_relations');
        // Schema::dropIfExists('media_metadata');
        Schema::dropIfExists('media');
    }
};
