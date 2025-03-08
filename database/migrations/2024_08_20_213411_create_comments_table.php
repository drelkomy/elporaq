<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * قم بتشغيل الهجرة.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->nullable();
            $table->text('content');
            $table->foreignId('blog_id')->constrained()->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes(); // لدعم الحذف اللين
            
            // أضف عمود parent_id
            $table->unsignedBigInteger('parent_id')->nullable();
            // إعداد علاقة المفتاح الخارجي
            $table->foreign('parent_id')->references('id')->on('comments')->onDelete('cascade');
        });
    }

    /**
     * تراجع عن الهجرة.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
