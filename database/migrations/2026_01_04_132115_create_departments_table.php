<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->after('id');

            $table->foreign('user_id')
                ->references('user_id')
                ->on('students')
                ->onDelete('cascade');

            $table->id('application_id');
            $table->string('application_department');
            $table->string('supported_task');
            $table->string('task_status');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('departments');
    }
};
