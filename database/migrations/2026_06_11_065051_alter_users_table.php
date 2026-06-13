<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::table('users', function (Blueprint $table) {
        // Gunakan nullable atau default agar tidak error saat data lama diupdate
        $table->string('role')->default('client'); 
        $table->integer('balance')->default(0); 
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
{
    Schema::table('users', function (Blueprint $table) {
        // Menghapus kolom 'role' dan 'balance' saat rollback
        $table->dropColumn(['role', 'balance']);
    });
}
};
