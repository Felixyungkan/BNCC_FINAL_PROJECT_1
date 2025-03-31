<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('fakturs', function (Blueprint $table) {
            $table->string('nomor_invoice')->unique()->after('id');
            $table->decimal('total_harga', 10, 2)->default(0)->after('kode_pos');
        });
    }
    
    public function down()
    {
        Schema::table('fakturs', function (Blueprint $table) {
            $table->dropColumn('nomor_invoice');
            $table->dropColumn('total_harga');
        });
    }
    
    
};
