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
        Schema::create("teacheruserdatas", function (Blueprint $table) {
            $table->integer("Registration_ID");
            $table->string("avatar");
            $table->string("fName");
            $table->string("lName");
            $table->string("pNumber");
            $table->string("role");
            $table->string("password");
            $table->string("email");
            $table->string("address");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("teacheruserdatas");
    }
};
