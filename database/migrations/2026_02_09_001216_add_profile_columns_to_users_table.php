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
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->after('name');
            $table->string('gender')->nullable()->after('role');
            $table->date('date_of_birth')->nullable()->after('gender');
            $table->string('avatar')->nullable()->after('date_of_birth');
            $table->string('phone')->nullable()->after('avatar');
            $table->string('address')->nullable()->after('phone');
            $table->string('coin')->nullable()->default('0')->after('address');
            $table->integer('school_id')->nullable()->after('coin');
            $table->string('Citizen_card')->nullable()->after('school_id');
            $table->string('education_level')->nullable()->after('Citizen_card');
            $table->string('class_id')->nullable()->after('education_level');
            $table->string('subject')->nullable()->after('class_id');
            $table->integer('salary_id')->nullable()->after('subject');
            $table->string('exp')->nullable()->after('salary_id');
            $table->string('current_role')->nullable()->after('exp');
            $table->string('description')->nullable()->after('current_role');
            $table->string('time_tutor_id')->nullable()->after('description');
            $table->integer('status')->nullable()->after('time_tutor_id');
            $table->integer('DistrictID')->nullable()->after('status');
            $table->string('latitude')->nullable()->after('DistrictID');
            $table->string('longitude')->nullable()->after('latitude');
            $table->string('google_id')->nullable()->after('longitude');
            $table->string('Certificate', 1000)->nullable()->after('google_id');
            $table->string('assign_user')->nullable()->after('Certificate');
            $table->string('Certificate_public')->nullable()->after('assign_user');
            $table->string('code')->nullable()->after('Certificate_public');
            $table->dateTime('time_accept')->nullable()->after('code');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'role', 'gender', 'date_of_birth', 'avatar', 'phone', 'address',
                'coin', 'school_id', 'Citizen_card', 'education_level', 'class_id',
                'subject', 'salary_id', 'exp', 'current_role', 'description',
                'time_tutor_id', 'status', 'DistrictID', 'latitude', 'longitude',
                'google_id', 'Certificate', 'assign_user', 'Certificate_public',
                'code', 'time_accept', 'deleted_at',
            ]);
        });
    }
};
