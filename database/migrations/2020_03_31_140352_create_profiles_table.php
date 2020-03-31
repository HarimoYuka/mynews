<?php

//14-4.応用】 create_profiles_table というMigrationの雛形ファイルを作成し、
//profilesというテーブル名で名前(name)、性別(gender)、趣味(hobby)、
//自己紹介(introduction)を保存できるように修正して、 
//migrateしてテーブルを作成しましょう。

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('gender');
            $table->string('hoby');
            $table->string('introduce');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
