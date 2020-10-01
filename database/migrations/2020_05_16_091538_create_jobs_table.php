<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('region');
            $table->string('instructions')->nullable();
            $table->text('description')->nullable();

            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->timestamps();

            $table->index('created_at');
            $table->index('company_id');

            $table->boolean('published')->default(false)->index();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
