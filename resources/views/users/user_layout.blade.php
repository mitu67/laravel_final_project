@extends('layout.main')


@section('main_content')

  <!-- user group r new group[(button)+link address] er jonno -->

         <!-- page_header ta style.css a ase -->



<div class="row clearfix page_header">
	<div class="col-md-4">
		<a class="btn btn-info" href="{{ route('users.index') }}"> <-back</a>
	</div>
	<div class="col-md-8 text-right">
	<a class="btn btn-info" href="{{ url('users/create') }}"><i class="fa fa-plus"></i> new Sale</a>


  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#newPurchase"><i class="fa fa-plus"></i>
New Purchase
</button>


   <button type="button" class="btn btn-info" data-toggle="modal" data-target="#newPayment"><i class="fa fa-plus"></i>
New Payment
</button>

	<a class="btn btn-info" href="{{ url('users/create') }}"><i class="fa fa-plus"></i> new Receipt</a>
	</div>
</div>
                      <!-- x -->


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

@stop