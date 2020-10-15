  <!-- Modal for add newPaymentForInvoice-->

<div class="modal fade" id="newPaymentForInvoice" tabindex="-1" role="dialog" aria-labelledby="newPaymentForInvoiceModalLabel" aria-hidden="true">

  <div class="modal-dialog" role="document">

      {!! Form::open(['route' => ['user.purchases.invoices.add_item', [ 'id'  =>$user->id , 'invoice_id' =>$invoice->id ] ] , 'method' => 'post']) !!}

        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="newPaymentForInvoiceModalLabel">new Payment for invoice</h5>
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
