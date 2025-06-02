
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class Dumbell extends Migration
{
  
    public function up(): void
    {
         Schema::create('Dumbell', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->decimal('price', 8, 2);
            $table->integer('weight'); // 👈 added weight (can also make it nullable or give default)
            $table->integer('quantity');
            $table->string('image_url')->nullable(); // 👈 added image URL
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
              Schema::dropIfExists('Dumbell');
    }
};
