<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('courses', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('category_id');
            $table->string('name');
            $table->text('description');
            $table->integer('rating');
            $table->integer('views');
            $table->integer('hours');
            $table->enum('levels', ['beginner', 'immediat', 'high'])->default('beginner');
            $table->boolean('active');
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::table('courses',function(Blueprint $table){
            $table->foreign('category_id', 'courses_ibfk_1')->references('id')->on('categories')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('coursess');
    }

}
