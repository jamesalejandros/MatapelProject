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
        Schema::create('software_detail_licensings', function (Blueprint $table) {

            $table->id();

            $table->unsignedBigInteger('SoftID');

            $table->string('LicensingID', 50)->nullable();

            $table->string('LicensePool')->nullable();

            $table->string('ProductFamily')->nullable();

            $table->string('Version')->nullable();

            $table->integer('Quantity')->nullable();

            $table->text('Keterangan')->nullable();

            $table->double('LastPrice')->nullable();

            $table->date('LastBuyDate')->nullable();

            $table->timestamps();

            $table->foreign('SoftID')
                ->references('SoftID')
                ->on('software_masters')
                ->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('software_detail_licensings');
    }
};
