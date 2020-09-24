@extends('layout.main')


@section('main_content')

  <!-- user group r new group[(button)+link address] er jonno -->

         <!-- page_header ta style.css a ase -->



<div class="row clearfix page_header">
	<div class="col-md-4">
		<a class="btn btn-primary" href="{{ route('products.index') }}"> <-back</a>
	</div>
</div>
                      <!-- x -->

         <!-- public er okhan theke table.html copy kore boshalam -->

  <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">{{ $product->title }}</h6>
            </div>
            <div class="card-body" >
            	<div class="row clearfix justify-content-md-center">
            		<div class="col-md-8">
            			<table class="table table-striped">
            		<tr>
            			<th class="text-right">Category:</th>
            			<td>{{ $product->category->title }}</td>
            		</tr>
            		<tr>
            			<th class="text-right">Title:</th>
            			<td>{{ $product->title }}</td>
            		</tr>
            		<tr>
            			<th class="text-right">Description:</th>
            			<td>{{ $product->description }}</td>
            		</tr>
            		<tr>
            			<th class="text-right">Cost_price:</th>
            			<td>{{ $product->cost_price }}</td>
            		</tr>
            		<tr>
            			<th class="text-right">Price:</th>
            			<td>{{ $product->price }}</td>
            		</tr>
            	</table>
            			
            		</div>
            	</div>
            	

            </div>
          </div>

@stop