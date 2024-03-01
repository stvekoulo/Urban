<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateServicesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn('type_service');
            $table->dropForeign(['agent_id']);
            $table->dropColumn('agent_id');
            $table->dropForeign(['expediteur_id']);
            $table->dropColumn('expediteur_id');

            $table->foreignId('notification_id')->constrained('notifications');

            $table->text('description')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('services', function (Blueprint $table) {
            $table->string('type_service')->after('notification_id');
            $table->foreignId('agent_id')->constrained('users')->after('type_service');
            $table->foreignId('expediteur_id')->constrained('users')->after('agent_id');
            $table->dropForeign(['notification_id']);
            $table->dropColumn('notification_id');
            $table->text('description')->nullable(false)->change();
        });
    }
}
