<?php

use App\Enums\UserRole;
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
        Schema::create('employees', function (Blueprint $table) {

            $table->id('employee_id');

            $table->string('emp_card_no',20)->unique();

            $table->string('name',100);

            $table->enum('position',[
                UserRole::ADMIN->value,
                UserRole::SUPERVISOR->value,
                UserRole::QC_AUDITOR->value,
                UserRole::OPERATOR->value,
            ]);

            $table->string('nic',20)->unique()->nullable();

            $table->string('contact_number',20)->nullable();

            $table->string('username',50)->unique();

            $table->string('password_hash');

            $table->boolean('is_active')->default(true);

            $table->dateTime('created_date')->nullable();

            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
