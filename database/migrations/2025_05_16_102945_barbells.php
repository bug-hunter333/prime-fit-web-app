

<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class Barbells extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('Barbells', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('image_url');
            $table->decimal('price', 10, 2);
            $table->integer('quantity');
            $table->decimal('weight', 8, 2);
            $table->timestamps(); // includes created_at and updated_at
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Barbells');
    }
}








