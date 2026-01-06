<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('departments', function (Blueprint $table) {
        $table->id('application_id'); // it is primary key

        $table->unsignedBigInteger('user_id'); 

        $table->foreign('user_id') // the user_id is defined as foreign key which comes from student table
            ->references('user_id')
            ->on('students')
            ->cascadeOnDelete();

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
