@extends('users.invoice_layout')


@section('user_content')



  <!-- DataTales Example -->
              <div class="card shadow mb-4">
               <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary"> Purchases Invoice Details</h6>
                </div>
                    <div class="card-body" >
                        <div class="row clearfix justify-content-md-center">


                            <div class="col-md-6">
                                <div><strong>Customer: </strong>{{ $user->name }}</div>
                                <div><strong>Email:</strong> {{ $user->email }}</div>
                                <div><strong>Phone:</strong> {{ $user->phone }}</div>
                            </div>
                            <div class="col-md-3"></div>
                             <div class="col-md-3">
                                 <div><strong>Date: </strong>{{ $invoice->date }}</div>
                                 <div><strong>Challan no: </strong>{{ $invoice->challan_no }}</div>

                             </div>

                        </div>

                <div class="Invoice_items">
                    <table class="table ">
                        <thead>
                            <th>SL</th>
                            <th>Product</th>
                            <th>Qty</th>
                            <th>Price</th>
                            <th>Total</th>
                            <th>Action</th>
                        </thead>

                        <tbody>

                            @foreach($invoice->items as $key => $item)
                            
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $item->product->title }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->total }}</td>
                                <td>
                                     <form method="POST" action="{{ route('user.purchases.invoices.delete_item' ,['id'=> $user->id , 'invoice_id' => $invoice->id , 'item_id' => $item->id ] ) }}">

                                  @csrf
                                  @method('DELETE')

                               <button onclick="return confirm('r u sure?')" type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
             
                                   </form>                                    
                                </td>

                            </tr>
                            @endforeach
                        </tbody>

                         <tr>
                            <th></th>

                            <th>
                                <button class="btn btn-info" data-toggle="modal" data-target="#newProduct">
                                    <i class="fa fa-plus"></i>Add product
                            </button>
                        </th>
                            <th colspan="2" class="text-right">Total</th>
                            <th>{{ $totalPayable = $invoice->items()->sum('total') }}</th>
                            <th></th>
                        </tr>


                         <tr>
                            <th></th>

                            <th>
                                <button class="btn btn-info" data-toggle="modal" data-target="#newReceiptForInvoice">
                                    <i class="fa fa-plus"></i>Add Payment/Receivemoney
                            </button>
                        </th>
                            <th colspan="2" class="text-right">Paid:</th>
                            <th>{{ $totalPaid = $invoice->payments()->sum('amount') }}</th>
                            <th></th>
                        </tr>


                         <tr>
                            <th colspan="4" class="text-right">Due:</th>
                            <th>{{ $totalPayable - $totalPaid }}</th>
                            <th></th>
                        </tr>


                    </table>

                </div>
            </div>
          </div>




<!-- Modal for add new product-->

<div class="modal fade" id="newProduct" tabindex="-1" role="dialog" aria-labelledby="newProductModalLabel" aria-hidden="true">

  <div class="modal-dialog" role="document">

      {!! Form::open(['route' => ['user.purchases.invoices.add_item', [ 'id'  =>$user->id , 'invoice_id' =>$invoice->id ] ] , 'method' => 'post']) !!}

    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newProductModalLabel">new Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


           <div class="form-group row">
            <label for="product" class="col-sm-3 col-form-label text-right"><strong>Product:<span class="text-danger">*</span></strong></label>
            <div class="col-sm-9">
             {{ Form::select('product_id', $products, NULL ,  ['class' => 'form-control' , 'id' => 'product' , 'placeholder' => 'select product' , 'required', 'text-right'])}}
             </div>
              </div> 



                <div class="form-group row">
                 <label for="quantity" class="col-sm-3 text-right col-form-label"><strong>Quantity:<span class="text-danger">*</span></strong></label>

                <div class="col-sm-9">               
                 <!-- 
                 <input type="name" class="form-control" id="name" placeholder="Name">
                -->

                 {{ Form::text('quantity' , NULL , ['class' => 'form-control' , 'id' => 'quantity' , 'placeholder' => 'Quantity', 'required']) }}

               </div>


                 <div class="form-group row">
                 <label for="price" class="col-sm-3 text-right col-form-label"><strong>Price:<span class="text-danger">*</span></strong></label>

                <div class="col-sm-9">               
                 <!-- 
                 <input type="name" class="form-control" id="name" placeholder="Name">
                -->

                 {{ Form::text('price' , NULL , ['class' => 'form-control' , 'id' => 'price' , 'placeholder' => 'Price', 'required']) }}


               </div>


                <div class="form-group row">
                 <label for="total" class="col-sm-3 text-right col-form-label"><strong>Total:</strong></label>

                <div class="col-sm-9">               
                 <!-- 
                 <input type="name" class="form-control" id="name" placeholder="Name">
                -->

                 {{ Form::textarea('total' , NULL , ['class' => 'form-control' , 'id' => 'total' ,'rows'=> '2' ,'placeholder' => 'Total' ,'required']) }}


               </div>

          </div>
         
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit </button>
      </div>
    </div>

                  
   {!! Form::close() !!}

  </div>

</div>  



  
<!-- Modal for add newReceiptForInvoice-->

<div class="modal fade" id="newReceiptForInvoice" tabindex="-1" role="dialog" aria-labelledby="newReceiptForInvoiceModalLabel" aria-hidden="true">

  <div class="modal-dialog" role="document">

      {!! Form::open(['route' => ['user.purchases.invoices.add_item', [ 'id'  =>$user->id , 'invoice_id' =>$invoice->id ] ] , 'method' => 'post']) !!}

        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="newReceiptForInvoiceModalLabel">new Product</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
            </button>
          </div>

      <div class="modal-body">


           <div class="form-group row">
            <label for="product" class="col-sm-3 col-form-label text-right"><strong>Product:<span class="text-danger">*</span></strong></label>
            <div class="col-sm-9">
             {{ Form::select('product_id', $products, NULL ,  ['class' => 'form-control' , 'id' => 'product' , 'placeholder' => 'select product' , 'required', 'text-right'])}}
             </div>
              </div> 



                <div class="form-group row">
                 <label for="quantity" class="col-sm-3 text-right col-form-label"><strong>Quantity:<span class="text-danger">*</span></strong></label>

                <div class="col-sm-9">               
                 <!-- 
                 <input type="name" class="form-control" id="name" placeholder="Name">
                -->

                 {{ Form::text('quantity' , NULL , ['class' => 'form-control' , 'id' => 'quantity' , 'placeholder' => 'Quantity', 'required']) }}

               </div>


                 <div class="form-group row">
                 <label for="price" class="col-sm-3 text-right col-form-label"><strong>Price:<span class="text-danger">*</span></strong></label>

                <div class="col-sm-9">               
                 <!-- 
                 <input type="name" class="form-control" id="name" placeholder="Name">
                -->

                 {{ Form::text('price' , NULL , ['class' => 'form-control' , 'id' => 'price' , 'placeholder' => 'Price', 'required']) }}


               </div>


                    <div class="form-group row">
                     <label for="total" class="col-sm-3 text-right col-form-label"><strong>Total:</strong></label>

                    <div class="col-sm-9">               
                     <!-- 
                     <input type="name" class="form-control" id="name" placeholder="Name">
                    -->

                     {{ Form::textarea('total' , NULL , ['class' => 'form-control' , 'id' => 'total' ,'rows'=> '2' ,'placeholder' => 'Total' ,'required']) }}


                   </div>

              </div>
             
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit </button>
          </div>
        </div>

                  
   {!! Form::close() !!}

  </div>

</div> 



@stop


