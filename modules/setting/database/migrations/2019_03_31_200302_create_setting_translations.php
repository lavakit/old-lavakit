<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingTranslations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setting_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('setting_id')->unsigned();
            $table->string('locale');
            $table->string('value')->nullable();
            $table->text('description')->nullable();

            $table->unique(['setting_id', 'locale'], 'setting_translations_setting_id_locale_unique');
            $table->index('locale', 'settings_translations_locale_index');
            $table->foreign('setting_id', 'setting_translations_setting_id_foreign')
                ->references('id')->on('settings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('setting_translations');
    }
}
