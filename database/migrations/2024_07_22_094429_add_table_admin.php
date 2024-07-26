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
        Schema::create('skill', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('title')->nullable();
            $table->enum('status', ['show', 'hide'])->default("show");
            $table->string('icon')->nullable();
            $table->string('size_icon')->nullable();
            $table->string('color')->nullable();
            $table->timestamps();
        });
        Schema::create('user_detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('cv')->nullable();
            $table->string('photo')->nullable();
            $table->string('work_at')->nullable();
            $table->string('profesi')->nullable();
            $table->text('about')->nullable();
            $table->integer('no_hp')->nullable();
            $table->timestamp('tgl_lahir')->nullable();
            $table->timestamps();
        });
        Schema::create('project', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('slug')->nullable();
            $table->string('link')->nullable();
            $table->timestamps();
        });
        Schema::create('link_porto', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string("portal")->nullable();
            $table->string("link")->nullable();
            $table->enum("status", ['show', 'hide'])->default('show');
            $table->timestamps();
        });
        Schema::create('experience', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string("company_name")->nullable();
            $table->string("company_alamat")->nullable();
            $table->string("company_about")->nullable();
            $table->string("company_photo")->nullable();
            $table->string("position")->nullable();
            $table->integer("position_time")->nullable();
            $table->timestamp("position_time_start")->nullable();
            $table->timestamp("position_time_end")->nullable();
            $table->text("description")->nullable();
            $table->timestamps();
        });
        Schema::create('tulisan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string("title")->nullable();
            $table->string("slug")->nullable();
            $table->text("description")->nullable();
            $table->string("description_short")->nullable();
            $table->string("photo")->nullable();
            $table->string("photo_thumb")->nullable();
            $table->timestamps();
        });
        Schema::create('tulisan_comment', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("tulisan_id")->nullable();
            $table->unsignedBigInteger("comment_id")->nullable();
            $table->unsignedBigInteger("user_id")->nullable();
            $table->text("comment");
            $table->timestamps();
        });
        Schema::create('tulisan_like', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("tulisan_id")->nullable();
            $table->unsignedBigInteger("comment_id")->nullable();
            $table->unsignedBigInteger("user_id")->nullable();
            $table->timestamps();
        });
        Schema::create('project_skill', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("skill_id");
            $table->foreign('skill_id')->references('id')->on('skill')->onDelete('cascade');
            $table->unsignedBigInteger("project_id");
            $table->foreign('project_id')->references('id')->on('project')->onDelete('cascade');
            $table->timestamps();
        });
        Schema::create('project_exprerience', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("experience_id");
            $table->foreign('experience_id')->references('id')->on('experience')->onDelete('cascade');
            $table->unsignedBigInteger("project_id");
            $table->foreign('project_id')->references('id')->on('project')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skill');
        Schema::dropIfExists('user_detail');
        Schema::dropIfExists('project_skill');
        Schema::dropIfExists('project');
        Schema::dropIfExists('link_porto');
        Schema::dropIfExists('project_exprerience');
        Schema::dropIfExists('experience');
        Schema::dropIfExists('tulisan');
        Schema::dropIfExists('tulisan_comment');
        Schema::dropIfExists('tulisan_like');
    }
};
