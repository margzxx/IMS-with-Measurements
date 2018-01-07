<?php


Route::get('/','HomeController@showHome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('change-password-employee/{id}','HomeController@showChangePasswordEmployee');
Route::post('change-password-employee','HomeController@doChangePasswordEmployee');

Route::get('manage-inventory','HomeController@showManageInventory');
Route::get('manage-inventory-finished-products','HomeController@showManageInventoryFinishedProducts');
Route::get('add-process-materials','HomeController@showAddProcessMaterials');
Route::post('add-process-material','HomeController@doAddProcessMaterial');
Route::get('modify-process-materials/{id}','HomeController@showModifyProcessMaterials');
Route::get('process-materials','HomeController@showProcessMaterials');
Route::get('remove-process-material/{id}','HomeController@doRemoveProcessMaterial');

Route::get('manage-items','HomeController@showManageItems');
Route::get('manage-suppliers','HomeController@showManageSuppliers');
Route::get('add-supplier','HomeController@showAddSupplier');
Route::post('add-supplier','HomeController@doAddSupplier');
Route::get('delete-supplier/{id}','HomeController@doDeleteSupplier');
Route::get('edit-supplier/{id}','HomeController@showEditSupplier');
Route::post('edit-supplier','HomeController@doEditSupplier');

Route::get('manage-categories','HomeController@showManageCategories');
Route::get('add-category','HomeController@showAddCategory');
Route::post('add-category','HomeController@doAddCategory');
Route::get('delete-category/{id}','HomeController@doDeleteCategory');
Route::get('edit-category/{id}','HomeController@showEditCategory');
Route::post('edit-category','HomeController@doEditCategory');

Route::get('manage-branches','HomeController@showManageBranches');
Route::get('add-branch','HomeController@showAddBranch');
Route::post('add-branch','HomeController@doAddBranch');
Route::get('delete-branch/{id}','HomeController@doDeleteBranch');
Route::get('edit-branch/{id}','HomeController@showEditBranch');
Route::post('edit-branch','HomeController@doEditBranch');

Route::get('add-item','HomeController@showAddItem');
Route::post('add-item','HomeController@doAddItem');

Route::get('manage-employees','HomeController@showManageEmployees');
Route::get('add-employee','HomeController@showAddEmployee');
Route::post('add-employee','HomeController@doAddEmployee');
Route::get('edit-employee/{id}','HomeController@showEditEmployee');
Route::post('edit-employee','HomeController@doEditEmployee');

Route::get('edit-item/{id}','HomeController@showEditItem');
Route::post('edit-item','HomeController@doEditItem');

Route::get('use-pos','HomeController@showUsePOS');
Route::post('confirm-order','HomeController@doConfirmOrder');

Route::get('receipt-adjustment','HomeController@showReceiptAdjustment');
Route::post('adjust-receipt','HomeController@doAdjustReceipt');

Route::get('purchase-orders','HomeController@showPurchaseOrders');
Route::get('add-purchase-order','HomeController@showAddPurchaseOrder');
Route::post('add-purchase-order','HomeController@doAddPurchaseOrder');
Route::get('modify-purchase-orders/{id}','HomeController@showModifyPurchaseOrders');
Route::get('edit-purchase-order/{id}','HomeController@showEditPurchaseOrder');
Route::post('edit-purchase-order','HomeController@doEditPurchaseOrder');
Route::get('remove-purchase-order/{id}','HomeController@doRemovePurchaseOrder');

Route::get('goods-receipts','HomeController@showGoodsReceipts');
Route::get('submit-purchase-order/{id}','HomeController@doSubmitPurchaseOrder');
Route::get('view-goods-receipt/{id}','HomeController@showViewGoodsReceipt');
Route::get('receive-goods/{id}','HomeController@showReceiveGoods');
Route::post('receive-goods','HomeController@doReceiveGoods');
Route::get('receive-all-goods/{id}','HomeController@doReceiveAllGoods');
Route::get('return-goods/{id}','HomeController@showReturnGoods');
Route::post('return-goods','HomeController@doReturnGoods');

Route::get('product-blueprints','HomeController@showProductBlueprints');
Route::get('submit-product-blueprint/{id}','HomeController@doSubmitProductBlueprint');
Route::get('view-product-blueprint/{id}','HomeController@showViewProductBlueprint');
Route::get('finish-product/{id}','HomeController@doFinishProduct');
Route::get('set-product-price/{id}','HomeController@showSetProductPrice');
Route::post('set-product-price','HomeController@doSetProductPrice');
Route::post('add-product-qty','HomeController@doAddProductQty');

Route::get('order-product','HomeController@showOrderProduct');
Route::get('manage-customer-orders','HomeController@showManageCustomerOrders');
Route::get('deliver-customer-order/{id}','HomeController@doDeliverCustomerOrder');

Route::get('manage-leftovers','HomeController@showManageLeftovers');