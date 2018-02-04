<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Item;
use App\Supplier;
use App\Customer;
use App\Category;
use App\Branch;
use App\Sale;
use App\Receipt;
use App\Good;
use App\Tax;
use App\Order;
use App\Markup;
use App\Material;
use App\Product;
use App\Leftover;

use Auth;
use DB;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
    }

    public function showHome(){

        return view('home');

    }

    public function showManageInventory(){

        $goods = Good::whereNotIn('category_id',[1])->get();

        return view('manage_inventory')->with('goods',$goods);

    }

    public function showManageInventoryFinishedProducts(){

        $products = Product::where('category_id',1)->get();

        return view('manage_inventory_finished_products')->with('products',$products);

    }



    public function showAddProcessMaterials(){

        $goods = Good::whereNotIn('category_id',[1])->get();

        $leftovers = Leftover::all();

        return view('add_process_materials')->with('goods',$goods)
        ->with('leftovers',$leftovers);

    }

    public function showManageItems(){

        $items = Item::all();

        return view('manage_items')->with('items',$items);

    }

    public function showManageSuppliers(){

        $suppliers = Supplier::all();

        return view('manage_suppliers')->with('suppliers',$suppliers);

    }

    public function showAddSupplier(){

        return view('add_supplier');

    }

    public function showDashboard(){

        return view('dashboard');

    }

    public function doAddSupplier(Request $request){

        $supplier = new Supplier;

        $supplier->description = $request->input('description');
        $supplier->address = $request->input('address');
        $supplier->contact_number = $request->input('contact_number');
        $supplier->details = $request->input('details');
        $supplier->save();

        return redirect('manage-suppliers');

    }

    public function doLogout(){

        Auth::logout();

        return redirect('login');

    }

    public function doDeleteSupplier($id){

        $supplier = Supplier::find($id);

        $supplier->delete();

        return back();

    }

    public function showEditSupplier($id){

        $supplier = Supplier::find($id);

        return view('edit_supplier')->with('supplier',$supplier);

    }

    public function doEditSupplier(Request $request){

        DB::table('suppliers')->where('id',$request->input('supplier_id'))->update([
            'description'=>$request->input('description'),
            'address'=>$request->input('address'),
            'details'=>$request->input('details'),
            'contact_number'=>$request->input('contact_number'),
            ]);

        return redirect('manage-suppliers');

    }

    public function showAddItem(){

        $categories = Category::get();
        $branches = Branch::get();
        $suppliers = Supplier::all();

        return view('add_item')->with('categories',$categories)
        ->with('branches',$branches)
        ->with('suppliers',$suppliers);

    }

    public function doAddItem(Request $request){

        $item = new Item;

        $item->sku = $request->input('sku');
        $item->name = $request->input('name');
        $item->price = $request->input('price');
        $item->supplier_id = $request->input('supplier_id');
        $item->category_id = $request->input('category_id');
        // $item->branch_id = $request->input('branch_id');
        $item->branch_id = 1;
        $item->size = $request->input('size');
        $item->unit = $request->input('unit');
        $item->description = $request->input('description');

        if($request->file('file')){

            $file_name = time().'.'.$request->file('file')->getClientOriginalExtension();

            $request->file('file')->move('assets/files/UploadedItems',$file_name);

            $item->file = 'assets/files/UploadedItems/'.$file_name;

        }

        $item->save();

        return redirect('manage-items');

    }

    public function showManageCategories(){

        $categories = Category::all();

        return view('manage_categories')->with('categories',$categories);

    }

    public function showAddCategory(){

        return view('add_category');

    }

    public function doAddCategory(Request $request){

        $category = new Category;

        $category->description = $request->input('description');

        $category->save();

        return redirect('manage-categories');

    }

    public function doDeleteCategory($id){

        $category = Category::find($id);

        $category->delete();

        return back();

    }

    public function showManageBranches(){

        $branches = Branch::all();

        return view('manage_branches')->with('branches',$branches);

    }

    public function showEditCategory($id){

        $category = Category::find($id);

        return view('edit_category')->with('category',$category);

    }

    public function doEditCategory(Request $request){

        DB::table('categories')->where('id',$request->input('category_id'))->update([
            'description'=>$request->input('description'),
            ]);

        return redirect('manage-categories');

    }

    public function doEditItem(Request $request){

        if($request->file('file')){

            $file_name = time().' '.$request->file('file')->getClientOriginalExtension();

            $request->file('file')->move('assets/files/UploadedItems',$file_name);

            DB::table('items')->where('id',$request->input('item_id'))->update([
                'sku'=>$request->input('sku'),
                'name'=>$request->input('name'),
                'price'=>$request->input('price'),
                'size'=>$request->input('size'),
                'unit'=>$request->input('unit'),
                'supplier_id'=>$request->input('supplier_id'),
                'branch_id'=>1,
                'category_id'=>$request->input('category_id'),
                'description'=>$request->input('description'),
                'file'=>'assets/files/UploadedItems/'.$file_name,
                ]);


        }else{

            DB::table('items')->where('id',$request->input('item_id'))->update([
                'sku'=>$request->input('sku'),
                'name'=>$request->input('name'),
                'price'=>$request->input('price'),
                'size'=>$request->input('size'),
                'supplier_id'=>$request->input('supplier_id'),
                'branch_id'=>1,
                'category_id'=>$request->input('category_id'),
                'description'=>$request->input('description'),
                ]);

        }

        return redirect('manage-items');

    }

    public function showAddBranch(){

        $branches = Branch::all();

        return view('add_branch');

    }

    public function doAddBranch(Request $request){

        $branch = new Branch;

        $branch->description = $request->input('description');
        $branch->address = $request->input('address');
        $branch->save();

        return redirect('manage-branches');

    }

    public function doDeleteBranch($id){

        $branch = Branch::find($id);

        $branch->delete();

        return redirect('manage-branches');

    }

    public function showEditBranch($id){

        $branch = Branch::find($id);

        return view('edit_branch')->with('branch',$branch);

    }

    public function doEditBranch(Request $request){

        DB::table('branches')->where('id',$request->input('branch_id'))->update([
            'description'=>$request->input('description'),
            'address'=>$request->input('address'),
            ]);

        return redirect('manage-branches');

    }

    public function showManageEmployees(){

        $users = User::all();

        return view('manage_employees')->with('users',$users);

    }

    public function showAddEmployee(){

        $branches = Branch::all();

        return view('add_employee')->with('branches',$branches);

    }

    public function doAddEmployee(Request $request){

        $user = new User;

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->branch_id = $request->input('branch_id');
        $user->role = $request->input('role');
        $user->password = bcrypt($request->input('password'));
        $user->save();

        return redirect('manage-employees');


    }

    public function showEditEmployee($id){

        $user = User::find($id);

        $branches = Branch::all();

        return view('edit_employee')->with('user',$user)
        ->with('branches',$branches);

    }

    public function showChangePasswordEmployee($id){

        $user = User::find($id);

        return view('change_password_employee')->with('user',$user);

    }

    public function doChangePasswordEmployee(Request $request){

        DB::table('users')->where('id',$request->input('user_id'))->update([
            'password'=>bcrypt($request->input('password')),
            ]);

        $request->session()->flash('success','Password updated.');

        return redirect('manage-employees');

    }

    public function doEditEmployee(Request $request){

        DB::table('users')->where('id',$request->input('user_id'))->update([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'role'=>$request->input('role'),
            'branch_id'=>$request->input('branch_id'),
            ]);

        return redirect('manage-employees');

    }

    public function showEditItem($id){

        $item = Item::find($id);

        $suppliers = Supplier::all();
        $branches = Branch::get();
        $categories = Category::get();

        return view('edit_item')->with('item',$item)
        ->with('suppliers',$suppliers)
        ->with('branches',$branches)
        ->with('categories',$categories);

    }

    public function showUsePOS(){

        $products = Product::where('category_id',1)->where('qty','>',0)->get();
        $branches = Branch::all();
        $receipt = Receipt::find(1);

        return view('use_pos')->with('products',$products)
        ->with('branches',$branches)
        ->with('receipt',$receipt);

    }

    public function showReceiptAdjustment(){

        $receipt = Receipt::find(1);

        return view('receipt_adjustment')->with('receipt',$receipt);

    }

    public function doAdjustReceipt(Request $request){

        DB::table('receipts')->where('id',1)->update([
            'description'=>$request->input('description'),
            ]);

        $request->session()->flash('success','Great! Receipt adjusted');

        return back();

    }

    public function doConfirmOrder(Request $request){


        // return dd($request->input('item_id'));

        foreach($request->input('item_id') as $id){
          $item_id[]   = $id;
      }
      // foreach($request->input('price') as $key){
      //     $price[] = $key;
      // }
      foreach($request->input('qty') as $value){
          $qty[] = $value;
      }

      foreach($request->input('color') as $code){
          $color[] = $code;
      }


      // $total = array_sum($request->input('price'));

      $last = sizeof($request->input('item_id'));
      $i = 0;

      echo "<a href=".url('use-pos')."><input type='button' value='Go Back'></a><br>";

      echo "Date of Purchase: ".date('m/d/Y',strtotime($request->input('transaction_date')))."<br>";

      echo "OR #:".$request->input('official_receipt')."<br>";
      echo "Customer Name: ".$request->input('name')."<br>";
      echo "Branch: ".Branch::find($request->input('branch_id'))->description."<br>";

      echo "<table style='width:500px'>";
      echo "<thead>";
      echo "<tr>";
      echo "<td>Item</td>";
      echo "<td>Color</td>";
      echo "<td>Price</td>";
      echo "<td>Qty</td>";
      echo "<td>Subtotal</td>";
      echo "</tr>";
      echo "</thead>";
      echo "<tbody>";

      while($i < $last) {

            // echo Item::find($item_id[$i])->name.' '.$price[$i].' '.$qty[$i].'<br>';

        $item = Item::find($item_id[$i]);

        $sale = new Sale;

        $sale->official_receipt = $request->input('official_receipt');
        $sale->name = $request->input('name');
        $sale->item_id = $item->id;
        $sale->category_id = $item->category_id;
        $sale->discount = 0;
        $sale->supplier_id = $item->supplier_id;
        $sale->branch_id = $request->input('branch_id');
        $sale->price = $item->price;
        // $sale->price = $price[$i];
        $sale->color = $color[$i];
        $sale->qty = $qty[$i];
        $sale->total = $qty[$i] * $item->price;
        // $sale->total = $qty[$i] * $price[$i];
        $sale->status = 'For Delivery';
        $sale->transaction_date = $request->input('transaction_date');
        $sale->save();

        DB::table('products')->where('product_id',$item->product_id)->update([
            'qty'=> $qty[$i] - $item->qty,
            ]);

        DB::table('receipts')->where('id',1)->update([
            'description'=>$request->input('official_receipt')+$request->input('official_receipt'),
            ]);

        echo "<tr>";
        echo "<td>".Item::find($item_id[$i])->name."</td>";
        echo "<td>".$color[$i]."</td>";
        echo "<td>₱ ".number_format($item->price,2)."</td>";
        echo "<td>".$qty[$i]."</td>";
        echo "<td>".number_format($qty[$i]*$item->price,2)."</td>";
        echo "</tr>";

            // echo Item::find($item_id[$i])->name.' ‎₱ '.number_format($price[$i],2).' '.$qty[$i].'<br>';

        $i++;
    }

    echo "<tr>";
    echo "<td>&nbsp;</td>";
    echo "<td>&nbsp;</td>";
    echo "<td>Total</td>";
    echo "<td>₱ ".number_format(0,2)."</td>";
    echo "</tr>";

    echo "</tbody>";
    echo "</table>";

    echo "<br><br><a href=".url('use-pos')."><img src='https://www.barcodesinc.com/generator/image.php?code=POS&style=197&type=C128B&width=400&height=50&xres=1&font=3' alt='Inventory Management System' border='0'></a>";

    $request->session()->flash('success','Great! Item/s purchased');


}

public function showPurchaseOrders(){

    $orders = Order::all();

    return view('purchase_orders')->with('orders',$orders);

}

public function showProcessMaterials(){
        
    $products = Product::all();

    return view('process_materials')->with('products',$products);

}

public function showAddPurchaseOrder(){

    $items = Item::all();

    return view('add_purchase_order')->with('items',$items);

        // dd($goods);

}

public function showReturnGoods($id){

    $order = Order::find($id);

    return view('return_goods')->with('order',$order);

}

public function doAddPurchaseOrder(Request $request){

    $item = Item::find($request->input('item_id'));

    $order = new Order;

    $order->purchasing_id = $request->input('purchasing_id');
    $order->item_id = $item->id;
    $order->branch_id = $item->branch_id;
    $order->category_id = $item->category_id;
    $order->supplier_id = $item->supplier_id;
    $order->price = $item->price;
    $order->qty = $request->input('qty');
    $order->discount = $request->input('discount');
    $order->status = 'Pending';
    $order->total = ($request->input('qty')*$item->price) - (($request->input('discount')/100) * ($request->input('qty')*$item->price));   
    $order->transaction_date = date('Y-m-d');
    $order->save();

    return redirect('modify-purchase-orders/'.$request->input('purchasing_id'));

}

public function doAddProcessMaterial(Request $request){

    // return $request->input('leftover_id');

    if($request->input('leftover_id') != 0){

        $good = Leftover::find($request->input('leftover_id'));


        DB::table('leftovers')->where('id',$good->id)->update([
        'qty'=>$good->qty - $request->input('qty'),
        ]);

    }else{

        $good = Good::find($request->input('good_id'));   

    }
    

    $material = new Material;

    $material->product_id = $request->input('product_id');
    $material->name = $request->input('name');
    $material->purchasing_id = $good->purchasing_id;
    $material->good_id = $good->id;
    $material->item_id = $good->item_id;
    $material->branch_id = $good->branch_id;
    $material->category_id = $good->category_id;
    $material->supplier_id = $good->supplier_id;
    $material->status = 'Pending';

    $material->width = $request->input('width');
    $material->height = $request->input('height');

    if($request->input('width') <= 5 && $request->input('height') <= 5){
        // $material->width = 10 - ($request->input('width') * 2);
        // $material->height = 10 - ($request->input('height') * 2);
    }elseif($request->input('width') <= 10 && $request->input('height') <= 10){
        // $material->width = 20 - ($request->input('width') * 2);
        // $material->height = 20 - ($request->input('height') * 2);
    }
    


    $material->qty = $request->input('qty');
    $material->processed_date = date('Y-m-d');
    $material->save();

    DB::table('goods')->where('id',$good->id)->update([
        'qty'=>$good->qty - $request->input('qty'),
        ]);

    if(Leftover::where('item_id',$material->item_id)->exists()){

        $temp_leftover = Leftover::where('item_id',$material->item_id)->first();

        DB::table('leftovers')->where('item_id',$material->item_id)->update([
            'qty'=>$temp_leftover->qty + 2,
            ]);

    }else{



        $leftover = new Leftover;

        $leftover->purchasing_id = $good->purchasing_id;
        $leftover->item_id = $good->item_id;
        $leftover->supplier_id = $good->supplier_id;
        $leftover->category_id = $good->category_id;
        $leftover->branch_id = $good->branch_id;

        if($request->input('flexible')){

            $leftover->qty = 2;

            if($request->input('width') <= 5 && $request->input('height') <= 5){
                $leftover->size = 10 - ($request->input('width') * 2);

            }elseif($request->input('width') <= 10 && $request->input('height') <= 10){
                $leftover->size = 20 - ($request->input('width') * 2);

            }

        }else{

            $leftover->qty = 1;

            $glass_width = 10 - $request->input('width');
            $glass_height = 10 - $request->input('height');

            if($glass_height <= $glass_width){

                $leftover->size = $glass_height.'x10';

            }else{

                $leftover->size = '10x'.$glass_height;

            }

        }
      

        $leftover->transaction_date = $good->transaction_date;
        $leftover->save();

    }


    return redirect('modify-process-materials/'.$request->input('product_id'));

}

public function doEditPurchaseOrder(Request $request){

    $item = Item::find($request->input('item_id'));

    DB::table('orders')->where('id',$request->input('order_id'))->update([
        'item_id'=>$item->id,
        'branch_id'=>$item->branch_id,
        'category_id'=>$item->category_id,
        'supplier_id'=>$item->supplier_id,
        'price'=>$item->price,
        'qty'=>$request->input('qty'),
        'discount'=>$request->input('discount'),
        'total'=>($request->input('qty')*$item->price) - (($request->input('discount')/100) * ($request->input('qty')*$item->price)),
        ]);

    $request->session()->flash('success','Purchase order updated.');

    return redirect('modify-purchase-orders/'.$request->input('purchasing_id'));

}

public function showModifyPurchaseOrders($id){

    $orders = Order::where('purchasing_id',$id)->get();
    $items = Item::all();

    $purchasing_id = $id;

    return view('modify_purchase_orders')->with('orders',$orders)
    ->with('items',$items)
    ->with('purchasing_id',$purchasing_id);

}

public function showModifyProcessMaterials($id){

    $materials = Material::where('product_id',$id)->get();
    $goods = Good::whereNotIn('category_id',[1])->get();
    $leftovers = Leftover::all();

    $product_id = $id;

    return view('modify_process_materials')->with('materials',$materials)
    ->with('goods',$goods)
    ->with('leftovers',$leftovers)
    ->with('product_id',$product_id);
    
}

public function doRemovePurchaseOrder(Request $request,$id){

    $order = Order::find($id);

    $order->delete();

    $request->session()->flash('success','Item removed.');

    return back();

}

public function doRemoveProcessMaterial(Request $request,$id){

    $material = Material::find($id);

    $material->delete();

    $request->session()->flash('success','Material removed.');

    return back();

}

public function showEditPurchaseOrder($id){

    $order = Order::find($id);
    $items = Item::all();

    return view('edit_purchase_order')->with('order',$order)
    ->with('items',$items);

}

public function showGoodsReceipts(){

    $orders = Order::all();

    return view('goods_receipts')->with('orders',$orders);

}

public function doSubmitPurchaseOrder($id){

    DB::table('orders')->where('purchasing_id',$id)->update([
        'status'=>'For Delivery',
        ]);

    return redirect('view-goods-receipt/'.$id);

}

public function doSubmitProductBlueprint($id){

    DB::table('materials')->where('product_id',$id)->update([
        'status'=>'For Assembly',
        ]);


    return redirect('view-product-blueprint/'.$id);

}

public function showViewGoodsReceipt($id){

    $orders = Order::where('purchasing_id',$id)->get();

    $total = Order::where('purchasing_id',$id)->sum('total');

    $purchasing_id = $id;

    return view('view_goods_receipt')->with('orders',$orders)
    ->with('purchasing_id',$purchasing_id)
    ->with('total',$total);

}

public function showViewProductBlueprint($id){

    $materials = Material::where('product_id',$id)->get();

    $product_id = $id;

    return view('view_product_blueprint')->with('materials',$materials)
    ->with('product_id',$product_id);

}

public function doFinishProduct(Request $request,$id){

    $material = Material::find($id);

    $product = new Product;
    $product->product_id = $material->product_id;
    $product->purchasing_id = $material->purchasing_id;
    $product->good_id = $material->good_id;
    $product->item_id = $material->item_id;
    $product->category_id = 1;
    $product->supplier_id = $material->supplier_id;
    $product->branch_id = $material->branch_id;
    $product->name = $material->name;
    $product->qty = 1;
    $product->processed_date = date('Y-m-d');
    $product->save();

    DB::table('materials')->where('product_id',$material->product_id)->update([
        'status'=>'Assembled',
        ]);

    $request->session()->flash('success','Product complete.');

    return redirect('manage-inventory-finished-products');

}

public function doAddProductQty(Request $request){

    // return $request->input('width');
    
    $materials = Material::where('product_id',$request->input('product_id'))->get();

    foreach($materials as $item){

        $good = Good::find($item->item_id);

        DB::table('goods')->where('item_id',$item->item_id)->update([
            'qty'=>$good->qty - ($item->qty * $request->input('qty')),
            ]);

        if(Leftover::where('item_id',$item->item_id)->exists()){

        $temp_leftover = Leftover::where('item_id',$item->item_id)->first();

        DB::table('leftovers')->where('item_id',$item->item_id)->update([
            'qty'=>$temp_leftover->qty + 2,
            ]);

        }else{

            $leftover = new Leftover;

            $leftover->purchasing_id = $good->purchasing_id;
            $leftover->item_id = $good->item_id;
            $leftover->supplier_id = $good->supplier_id;
            $leftover->category_id = $good->category_id;
            $leftover->branch_id = $good->branch_id;
            $leftover->qty = 2;

            if($request->input('width') <= 5 && $request->input('height') <= 5){
                $leftover->size = 10 - ($request->input('width') * 2);
            }elseif($request->input('width') <= 10 && $request->input('height') <= 10){
                $leftover->size = 20 - ($request->input('width') * 2);
            }

            $leftover->transaction_date = date('Y-m-d');
            $leftover->save();

        }

    }

    $product = Product::where('product_id',$request->input('product_id'))->first();

    DB::table('products')->where('product_id',$request->input('product_id'))->update([
        'qty'=>$product->qty + $request->input('qty'),
        ]);

    $request->session()->flash('success','Product quantity added.');

    return redirect('manage-inventory-finished-products');

}

public function showReceiveGoods($id){

    $order = Order::find($id);

    return view('receive_goods')->with('order',$order);

}

public function doReceiveGoods(Request $request){

    DB::table('orders')->where('purchasing_id',$request->input('order_id'))->update([
        'status'=>'For Delivery',
        ]);

    $order = Order::where('id',$request->input('order_id'))->first();

    if(Good::where('item_id',$request->input('item_id'))->exists()){

        $good = Good::where('item_id',$request->input('item_id'))->first();

        DB::table('goods')->where('item_id',$order->item_id)->update([
            'qty'=>$good->qty + $request->input('delivered_qty'),
            ]);

        DB::table('orders')->where('id',$order->id)->update([
            'delivered_qty'=>$order->delivered_qty + $request->input('delivered_qty'),
            ]);

    }else{

        $good = new Good;

        $good->purchasing_id = $order->purchasing_id;
        $good->item_id = $order->item_id;
        $good->category_id = $order->category_id;
        $good->supplier_id = $order->supplier_id;
        $good->branch_id = $order->branch_id;
        $good->qty = $request->input('delivered_qty');
        $good->price = $order->price;
        $good->discount = $order->discount;
        $good->total = ($order->qty*$order->price) - (($order->discount/100) * ($order->qty*$order->price));
        $good->transaction_date = date('Y-m-d');
        $good->save();

        DB::table('orders')->where('id',$order->id)->update([
            'delivered_qty'=>$order->delivered_qty + $request->input('delivered_qty'),
            'status'=>'Received',
            ]);

    }
    

    $request->session()->flash('success','Good/s received.');

    return redirect('manage-inventory');

}

public function doReturnGoods(Request $request){



    DB::table('orders')->where('purchasing_id',$request->input('order_id'))->update([
        'status'=>'For Delivery',
        ]);

    $order = Order::where('id',$request->input('order_id'))->first();

    if(Good::where('item_id',$request->input('item_id'))->exists()){

        $good = Good::where('item_id',$request->input('item_id'))->first();

        DB::table('goods')->where('item_id',$order->item_id)->update([
            'qty'=>$good->qty - $request->input('delivered_qty'),
            ]);

        DB::table('orders')->where('id',$order->id)->update([
            'delivered_qty'=>$order->delivered_qty - $request->input('delivered_qty'),
            ]);


    }else{

        $good = new Good;

        $good->purchasing_id = $order->purchasing_id;
        $good->item_id = $order->item_id;
        $good->category_id = $order->category_id;
        $good->supplier_id = $order->supplier_id;
        $good->branch_id = $order->branch_id;
        $good->qty = $request->input('delivered_qty');
        $good->price = $order->price;
        $good->discount = $order->discount;
        $good->total = ($order->qty*$order->price) - (($order->discount/100) * ($order->qty*$order->price));
        $good->transaction_date = date('Y-m-d');
        $good->save();

        DB::table('orders')->where('id',$order->id)->update([
            'delivered_qty'=>$order->delivered_qty - $request->input('delivered_qty'),
            'status'=>'Received',
            ]);

    }
    

    $request->session()->flash('success','Good/s received.');

    return redirect('manage-inventory');

}

public function doReceiveAllGoods(Request $request,$id){

    $orders = Order::where('purchasing_id',$id)->get();

    foreach($orders as $item){

        $good = new Good;

        $good->purchasing_id = $item->purchasing_id;
        $good->item_id = $item->item_id;
        $good->category_id = $item->category_id;
        $good->supplier_id = $item->supplier_id;
        $good->branch_id = $item->branch_id;
        $good->qty = $item->qty;
        $good->price = $item->price;
        $good->discount = $item->discount;
        $good->total = ($item->qty*$item->price) - (($item->discount/100) * ($item->qty*$item->price));
        $good->transaction_date = date('Y-m-d');
        $good->save();

        DB::table('orders')->where('id',$item->id)->update([
            'status'=>'Received',
            'delivered_qty'=>$item->qty,
            ]);

    }

    $request->session()->flash('success','Goods transferred to inventory');

    return redirect('manage-inventory');

}

    public function showProductBlueprints(){

        $materials = Material::where('status','=','For Assembly')->get();

        return view('product_blueprints')->with('materials',$materials);

    }

    public function showSetProductPrice($id){

        $product = Product::find($id);

        return view('set_product_price')->with('product',$product);

    }

    public function doSetProductPrice(Request $request){

        $product = DB::table('products')->where('id',$request->input('product_id'))->update([
            'price'=>$request->input('price'),
            ]);

        $request->session()->flash('success','Price updated.');

        return redirect('manage-inventory-finished-products');

    }

    public function showManageCustomerOrders(){

        $sales = Sale::all();

        return view('manage_customer_orders')->with('sales',$sales);

    }

    public function doDeliverCustomerOrder(Request $request,$id){

        DB::table('sales')->where('id',$id)->update([
            'status'=>'Delivered',
            ]);

        $request->session()->flash('success','Item delivered.');

        return back();

    }

    public function showManageLeftovers(){

        $leftovers = Leftover::all();

        return view('manage_inventory_leftovers')->with('leftovers',$leftovers);

    }
    public function doDeleteItem($id){

        $item = Item::find($id);

        $item->delete();

        return back();



    }
    
}


    