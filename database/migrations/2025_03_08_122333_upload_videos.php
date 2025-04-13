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
        Schema::create("uploadvideos", function (Blueprint $table) {
            $table->integer("Video_ID");
            $table->integer("Registration_ID");
            $table->string("thumbnail");
            $table->string("title");
            $table->string("subjectName");
            $table->string("teacherName");
            $table->string("classIn");
            $table->integer("duration");
            $table->string("video");
            $table->integer("views");
            $table->timestamp("")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("uploadvideos");
    }
};
