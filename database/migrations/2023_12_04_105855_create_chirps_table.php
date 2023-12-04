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
        Schema::create('chirps', function (Blueprint $table) { //Laravel Migration 的 up 方法，用於創建 chirps 表格
            $table->id(); //創建一個自動遞增的整數型別的 id 欄位
            $table->foreignId('user_id')->constrained()->cascadeOnDelete(); 
            //創建一個 user_id 的外鍵欄位，並將其關聯到 users 表格的 id 欄位。cascadeOnDelete() 表示當關聯的用戶被刪除時，對應的 chirps 記錄也會被自動刪除。
            $table->string('message'); //創建一個字串型別的 message 欄位
            $table->timestamps(); //創建 created_at 和 updated_at 兩個時間戳欄位
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chirps');
    }
};
