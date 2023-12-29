<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterGameLinksAddImage extends Migration
{
    public function up(): void
    {
        Schema::table('game_links', function (Blueprint $table) {
            $table->string('image')->after('name')->nullable();
        });
    }

    public function down(): void
    {
        //
    }
}
