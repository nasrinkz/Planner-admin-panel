<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->text('event')->nullable();
            $table->string('title',255)->nullable();
            $table->text('date')->nullable();
            $table->foreignId('category_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->enum('typeId',[1,2,3])->comment('1:شمسی,2:قمری,3:میلادی');
            $table->enum('show',[0,1])->comment('0:unshow,1:show');
            $table->enum('status',[0,1])->comment('0:تعطیل,1:غیر تعطیل');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
