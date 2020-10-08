
    <div class="row clearfix mt-5">
        
        <div class="col-md-2">
            
       <div class="nav flex-column nav-pills">
       <a class="nav-link @if($tab_menu == 'user_info') active @endif" href="{{ route('users.show' , $user->id) }}">User Info</a>
       <a class="nav-link @if($tab_menu == 'sales') active @endif" href="{{ route('user.sales' , $user->id) }}">Sales</a>
       <a class="nav-link @if($tab_menu == 'purchases') active @endif" href="{{ route('user.purchases' , $user->id) }}">Purchases</a>
       <a class="nav-link @if($tab_menu == 'payments') active @endif" href="{{ route('user.payments' , $user->id) }}">Payments</a>
       <a class="nav-link @if($tab_menu == 'receipts') active @endif" href="{{ route('user.receipts' , $user->id) }}">Receipts</a>
        </div>
    </div>

     <div class="col-md-10">
            
                 <!-- public er okhan theke table.html copy kore boshalam -->

         @yield('user_content')


        </div>
    </div>    



<!-- Modal for add new payment-->
<!-- j kono page theke open  add new payment-->

<div class="modal fade" id="newPayment" tabindex="-1" role="dialog" aria-labelledby="newPaymentModalLabel" aria-hidden="true">

  <div class="modal-dialog" role="document">

      {!! Form::open(['route' => ['user.payments.store',$user->id] , 'method' => 'post']) !!}

    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newPaymentModalLabel">new payments</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       

          <div class="form-group row">
                 <label for="date" class="col-sm-3 text-right col-form-label"><strong>Date:</strong></label>

                <div class="col-sm-9">               
                 <!-- 
                 <input type="name" class="form-control" id="name" placeholder="Name">
                -->

                 {{ Form::date('date' , NULL , ['class' => 'form-control' , 'id' => 'date' , 'placeholder' => 'Date' , 'required']) }}


               </div>

                <div class="form-group row">
                 <label for="amount" class="col-sm-3 text-right col-form-label"><strong>Amount:</strong></label>

                <div class="col-sm-9">               
                 <!-- 
                 <input type="name" class="form-control" id="name" placeholder="Name">
                -->

                 {{ Form::text('amount' , NULL , ['class' => 'form-control' , 'id' => 'amount' , 'placeholder' => 'Amount', 'required']) }}


               </div>

                <div class="form-group row">
                 <label for="note" class="col-sm-3 text-right col-form-label"><strong>Note:</strong></label>

                <div class="col-sm-9">               
                 <!-- 
                 <input type="name" class="form-control" id="name" placeholder="Name">
                -->

                 {{ Form::textarea('note' , NULL , ['class' => 'form-control' , 'id' => 'note' ,'rows'=> '2' ,'placeholder' => 'Note' ,'required']) }}


               </div>

          </div>

         
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit </button>
      </div>
    </div>
                    <!-- MODAL er bahire form close -->
                  
   {!! Form::close() !!}

  </div>

</div>


