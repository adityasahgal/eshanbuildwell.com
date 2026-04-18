<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->string('service_badge')->nullable()->after('code');
            $table->text('service_card_points')->nullable()->after('short_description');
            $table->string('service_cta_text')->nullable()->after('service_card_points');
            $table->text('service_cta_link')->nullable()->after('service_cta_text');
            $table->integer('service_page_order')->default(1)->after('top');
            $table->tinyInteger('show_on_services_page')->default(1)->after('service_page_order');
        });
    }

    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn([
                'service_badge',
                'service_card_points',
                'service_cta_text',
                'service_cta_link',
                'service_page_order',
                'show_on_services_page',
            ]);
        });
    }
};
