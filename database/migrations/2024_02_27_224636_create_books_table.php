<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id()->autoIncrement();

            $table->bigInteger("user_id")->unsigned()->index();
            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");
            
            $table->bigInteger("author_id")->unsigned()->index();
            $table->foreign("author_id")->references("id")->on("authors")->onDelete("cascade");

            $table->bigInteger("article_id")->unsigned()->index();
            $table->foreign("article_id")->references("id")->on("articles")->onDelete("cascade");

            $table->string("name",150)->nullable(false);
            $table->mediumInteger("publicationYear",false,true)->nullable(false);
            $table->string("description",2000)->nullable(false);
            $table->string("cover",500)->default(null);
            $table->dateTime("added");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
