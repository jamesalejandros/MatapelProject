<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('software_masters', function (Blueprint $table) {

            $table->id('SoftID');

            $table->string('LicensingID', 50)->nullable();

            $table->unsignedBigInteger('OrganizationID');

            $table->foreign('OrganizationID')
                ->references('OrganizationID')
                ->on('organizations')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->date('EndDate')->nullable();

            $table->string('Status', 10)->nullable();

            $table->text('ParentProgram')->nullable();

            $table->text('Vendor')->nullable();

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('software_masters');
    }
};
