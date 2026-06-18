<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mobile_apps', function (Blueprint $table) {
            $table->id();

            $table->foreignId('institute_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('app_name');
            $table->string('package_name')->unique();

            $table->string('current_version');
            $table->integer('build_number');

            $table->string('latest_version')->nullable();

            $table->text('apk_url')->nullable();

            $table->boolean('force_update')->default(false);

            $table->text('release_notes')->nullable();

            $table->date('last_release_date')->nullable();

            $table->enum('status', [
                'active',
                'inactive'
            ])->default('active');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mobile_apps');
    }
};