<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Core extends Migration
{

    public function up()
    {
        
        Schema::create('items',function(Blueprint $table){

            $table->increments('id');
            $table->string('sku');
            $table->string('name');
            $table->longtext('description');
            $table->integer('category_id');
            $table->integer('supplier_id');
            $table->integer('branch_id');
            $table->string('price');
            $table->string('size');
            $table->string('unit');
            $table->text('file')->nullable();
            $table->timestamps();

        });

        Schema::create('goods',function(Blueprint $table){

            $table->increments('id');
            $table->string('purchasing_id');
            $table->integer('item_id');
            $table->integer('category_id');
            $table->integer('supplier_id');
            $table->integer('branch_id');
            $table->string('price');
            $table->integer('qty');
            $table->string('discount');
            $table->string('total');
            $table->date('transaction_date');
            $table->timestamps();

        });

        Schema::create('leftovers',function(Blueprint $table){

            $table->increments('id');
            $table->string('purchasing_id');
            $table->integer('item_id');
            $table->integer('category_id');
            $table->integer('supplier_id');
            $table->integer('branch_id');
            $table->integer('qty');
            $table->string('size');
            $table->date('transaction_date');
            $table->timestamps();

        });

        Schema::create('materials',function(Blueprint $table){

            $table->increments('id');
            $table->string('product_id');
            $table->string('purchasing_id');
            $table->integer('good_id');
            $table->integer('item_id');
            $table->integer('category_id');
            $table->integer('supplier_id');
            $table->integer('branch_id');
            $table->string('name');
            $table->integer('qty');
            $table->string('width');
            $table->string('height');
            $table->string('status');
            $table->date('processed_date');
            $table->timestamps();

        });

        Schema::create('products',function(Blueprint $table){

            $table->increments('id');
            $table->string('product_id');
            $table->string('purchasing_id');
            $table->integer('good_id');
            $table->integer('item_id');
            $table->integer('category_id');
            $table->integer('supplier_id');
            $table->integer('branch_id');
            $table->string('name');
            $table->string('price')->nullable();
            $table->integer('qty');
            $table->text('file');
            $table->date('processed_date');
            $table->timestamps();

        });

        Schema::create('orders',function(Blueprint $table){

            $table->increments('id');
            $table->string('purchasing_id');
            $table->integer('item_id');
            $table->integer('category_id');
            $table->integer('supplier_id');
            $table->integer('branch_id');
            $table->string('price');
            $table->integer('delivered_qty')->nullable();
            $table->integer('qty');
            $table->string('discount');
            $table->string('total');
            $table->string('status');
            $table->date('transaction_date');
            $table->timestamps();

        });

        Schema::create('returns',function(Blueprint $table){

            $table->increments('id');
            $table->string('purchasing_id');
            $table->integer('item_id');
            $table->integer('category_id');
            $table->integer('supplier_id');
            $table->integer('branch_id');
            $table->string('price');
            $table->integer('qty');
            $table->string('discount');
            $table->string('total');
            $table->date('transaction_date');
            $table->timestamps();

        });

        Schema::create('markups',function(Blueprint $table){

            $table->increments('id');
            $table->string('description');
            $table->timestamps();

        });

        Schema::create('taxes',function(Blueprint $table){

            $table->increments('id');
            $table->string('description');
            $table->timestamps();

        });

        Schema::create('suppliers',function(Blueprint $table){

            $table->increments('id');
            $table->string('description');
            $table->string('address');
            $table->string('contact_number');
            $table->string('details');
            $table->timestamps();

        });

        Schema::create('branches',function(Blueprint $table){

            $table->increments('id');
            $table->string('description');
            $table->string('address');
            $table->timestamps();

        });

        Schema::create('categories',function(Blueprint $table){

            $table->increments('id');
            $table->string('description');
            $table->timestamps();

        });

        Schema::create('sales',function(Blueprint $table){

            $table->increments('id');
            $table->string('official_receipt');
            $table->string('name');
            $table->integer('item_id');
            $table->integer('category_id');
            $table->integer('supplier_id');
            $table->integer('branch_id');
            $table->string('price');
            $table->integer('qty');
            $table->string('total');
            $table->string('status');
            $table->date('transaction_date');
            $table->timestamps();

        });


        Schema::create('receipts',function(Blueprint $table){

            $table->increments('id');
            $table->string('description');
            $table->timestamps();

        });

    }

    public function down()
    {
        Schema::drop('items');
        Schema::drop('categories');
        Schema::drop('suppliers');
        Schema::drop('branches');
        Schema::drop('sales');
        Schema::drop('receipts');
        Schema::drop('orders');
        Schema::drop('goods');
        Schema::drop('materials');
        Schema::drop('products');
        Schema::drop('returns');
        Schema::drop('markups');
        Schema::drop('taxes');
        Schema::drop('leftovers');
    }
}
