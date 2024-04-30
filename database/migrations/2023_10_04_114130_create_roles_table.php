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
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string("user_id");
            $table->string("role_name")->unique();
            $table->string("role_permission");
            $table->string("dashboard")->nullable();
            $table->string("niche")->nullable();
            $table->string("collection")->nullable();
            $table->string("design")->nullable();
            $table->string("role")->nullable();
            $table->string("user")->nullable();
            $table->string("design_manage")->nullable();
            $table->string("admin_design_manage")->nullable();
            $table->string("role_status")->comment('0= In-acitive, 1= Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
