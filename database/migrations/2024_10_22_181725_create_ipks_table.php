<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\ipk;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ipks', function (Blueprint $table) {
            $table->id();
            $table->string('nim');
            $table->double('ipk');
            $table->timestamps();
        });

        ipk::create([
            'nim' => '21102071',
            'ipk' => 2.5
        ]);

        ipk::create([
            'nim' => '21102072',
            'ipk' => 3.1
        ]);

        ipk::create([
            'nim' => '21102073',
            'ipk' => 3.7
        ]);

        ipk::create([
            'nim' => '21102074',
            'ipk' => 2.3
        ]);

        ipk::create([
            'nim' => '21102075',
            'ipk' => 2.8
        ]);

    }


    public function down(): void
    {
        Schema::dropIfExists('ipks');
    }
};