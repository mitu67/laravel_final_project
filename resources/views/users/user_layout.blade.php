@extends('layout.main')



@section('main_content')

  <!-- user group r new group[(button)+link address] er jonno -->

         <!-- page_header ta style.css a ase -->

@yield('user_card')

<div class="row clearfix page_header">
	<div class="col-md-4">
		<a class="btn btn-info" href="{{ route('users.index') }}"> <-back</a>
	</div>
	<div class="col-md-8 text-right">


  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#newSale"><i class="fa fa-plus"></i>
New Sale
</button>

  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#newPurchases"><i class="fa fa-plus"></i>
New Purchase
</button>


   <button type="button" class="btn btn-info" data-toggle="modal" data-target="#newPayment"><i class="fa fa-plus"></i>
New Payment
</button>

  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#newReceipt"><i class="fa fa-plus"></i>
New Receipt
</button>

</div>
</div>



	              <!-- x -->


@include('users.user_layout_content')






@stop