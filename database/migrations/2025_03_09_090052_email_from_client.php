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
        Schema::table('email_from_clients', function (Blueprint $table) {
            $table->integer('query_ID');
            $table->integer('Registration_ID');
            $table->string('fullName');
            $table->string('email');
            $table->string('message');
            $table->date('querydate');
            $table->string('replyMessage');
            $table->date('resolveDate');
            $table->string('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('client', function (Blueprint $table) {
            $table->dropColumn('email_from_client');
        });
    }
};
