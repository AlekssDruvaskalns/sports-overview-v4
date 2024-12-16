<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
     public function up()
     {
         Schema::table('events', function (Blueprint $table) {
             $table->foreignId('organization_id')->nullable()->constrained('organizations')->onDelete('set null');
         });
     
         Schema::table('posts', function (Blueprint $table) {
             $table->foreignId('organization_id')->nullable()->constrained('organizations')->onDelete('set null');
         });
     }
     
     public function down()
     {
         Schema::table('events', function (Blueprint $table) {
             $table->dropForeign(['organization_id']);
             $table->dropColumn('organization_id');
         });
     
         Schema::table('posts', function (Blueprint $table) {
             $table->dropForeign(['organization_id']);
             $table->dropColumn('organization_id');
         });
     }
};
