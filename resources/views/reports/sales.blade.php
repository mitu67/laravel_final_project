@extends('layout.main')


@section('main_content')

  <!-- user group r new group[(button)+link address] er jonno -->

         <!-- page_header ta style.css a ase -->



    <div class="row clearfix page_header">
    	<div class="col-md-4">
  		<h2>Sales Report</h2>
  	</div>

	<div class="col-md-8 text-right">

    	 {!! Form::open(['route' => 'reports.sales' , 'method' => 'get']) !!}

        <div class="form-row align-items-center">
          <div class="col-auto">
            <label class="sr-only" for="inlineFormInput">Start date</label>

             {{ Form::date('start_date' , $start_date , ['class' => 'form-control' , 'id' => 'date' , 'placeholder' => 'Start Date']) }}

          </div>
          <div class="col-auto">
            <label class="sr-only" for="inlineFormInputGroup">End_date</label>
            <div class="input-group mb-2">
              
               {{ Form::date('end_date' , $end_date , ['class' => 'form-control' , 'id' => 'date' , 'placeholder' => 'End Date' ]) }}

            </div>
          </div>
          <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-2">Submit</button>
          </div>
        </div>
     {!! Form::close() !!}
	</div>
</div>
                      <!-- x -->

         <!-- public er okhan theke table.html copy kore boshalam -->

  <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Sales Report From {{ $start_date }} To {{ $end_date }}</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-borderless table-striped"  cellspacing="0">

                	 <!-- db te jotota column segula -->
                  <thead>
                      
                      <tr>
                        <th>Date</th>
                       <th>Products</th>
                      <th>Quantity</th>
                      <th>Unit Price</th>
                      <th>Total</th>

                    </tr>
                   
                  </thead>

                 
                  <tbody>

                    <!--


                    <?php 
                    $totalItem =0;
                    $grandTotal =0;

                    ?>

                    --> 
                  	 <!-- db theke sob data anar jonno -->

                  	@foreach ($sales as $sale)

                    <tr>
                      <!-- property non object bolle OPTIONAL use korbo.

                      <td>{{ optional($sale->invoice)->date }}</td>

                      -->
                      <td>{{ $sale->date }}</td>
                      <td>{{ $sale->title }}</td>
                      <td>{{ $sale->quantity }}</td>
                      <td>{{ $sale->price }}</td>
                      <td>{{ $sale->total }}</td>

                    </tr>

                    @endforeach

            
                                       
                  </tbody>

                   <tfoot>
                    <tr>
                      <th>Date</th>
                       <th>Product</th>
                      <th>TotalQuantity:{{ $sales->sum('quantity') }}</th>
                      <th>Unit Price:{{ $sales->sum('price') }}</th>
                      <th>Total: {{ $sales->sum('total') }}</th>

                         <!--

                          upore php use korle evabei korte hobe

                      <th>{{$totalItem}}</th>
                      <th>{{$grandTotal}}</th>

                      --> 


                    </tr>

                  </tfoot>
                </table>
              </div>
            </div>
          </div>

@stop