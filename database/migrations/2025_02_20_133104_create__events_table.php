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
        Schema::create('_events', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->text("description");
            $table->string("location");
            $table->string("imageUrl");
            $table->datetime("time");
            $table->enum("category",['Technology','Music & Entertainment','Sports & Fitness','Art & Culture','Food & Drink','Education & Learning','Business']);
            $table->enum("status",['Active','Past'])->default('Active');
            $table->integer("maxparticipants");
            $table->foreignId("user_id")->constrained()->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_events');
    }
};
