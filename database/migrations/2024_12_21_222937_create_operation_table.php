<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illmuinate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('operations', function (Blueprint $table) {
            $table->id();
            $table->string('description', length: 100);
            $table->decimal('amount', total: 10, places: 2);
            $table->date('delivery_at')->comment('Date de livraison du produit ou du service');
            $table->foreignId('account_id');
            $table->timestamps(precision: 6);

            $table->foreign('account_id')
                ->references('id')->on('account')
                ->onUpdate('cascade')->onDelete('cascade');
        });

        DB::statement(
            <<<SQL
            CREATE VIEW account_reports AS
            SELECT ALL
                a.id, a.name, a.is_active,
                COUNT(o.id) AS operation_count,
                MIN(o.delivery_at) AS operation_first_at,
                MAX(o.delivery_at) AS operation_last_at,
                COALESCE(SUM(o.amount), 0) AS operation_balance
            FROM accounts AS a
            LEFT OUTER JOIN operations AS o ON a.id = o.account_id
            GROUP BY 1, 2, 3
            SQL
        );

        DB::statement(
            <<<SQL
            CREATE VIEW operation_reports AS
            WITH dataset AS (
                -- CTE pour calcul du cumul global avant filtrage
                SELECT ALL
                    operation.*,
                    SUM(amount) OVER (
                        PARTITION BY account_id
                        ORDER BY delivery_at ASC, id ASC
                    ) AS amount_running_sum
                FROM operations
            )
            SELECT ALL *
            FROM dataset
            SQL
        );
    }

    public function down(): void
    {
        DB::statement('DROP VIEW IF EXISTS operation_reports');
        DB::statement('DROP VIEW IF EXISTS account_reports');
        Schema::dropIfExists('operations');
    }
};
