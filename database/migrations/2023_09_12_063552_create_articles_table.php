<?php

use App\Models\ArticleType;
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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string("name", 50);
            $table->text("text");
            $table->string("image", 50);
            $table->foreignIdFor(ArticleType::class); // article_type_id 
            $table->foreign("article_type_id")->references("id")->on("article_types");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
