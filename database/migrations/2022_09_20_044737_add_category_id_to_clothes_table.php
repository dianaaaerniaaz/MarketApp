<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('clothes', function (Blueprint $table) {
            $table->foreignId('category_id')->constrained()->restrictOnDelete();
        });
    }

    public function down()
    {
        Schema::table('clothes', function (Blueprint $table) {
            $table->dropForeign('clothes_category_id_foreign');
            $table->dropColumnn('category_id');
        });
    }
};
