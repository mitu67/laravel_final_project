@extends('users.user_layout')


@section('user_content')


            
                 <!-- public er okhan theke table.html copy kore boshalam -->

  <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Sales Of <strong>{{ $user->name }}</strong></h6>
            </div>
            <div class="card-body" >
                 <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                   <!-- db te jotota column segula -->
                  <thead>
                    <tr>
                      <th>Challen no</th>
                      <th>Customer</th>
                      <th>Date</th>
                      <th>Items</th>
                      <th>Total</th>
                      
                      <th class="text-right">Action</th>
                    </tr>
                  </thead>
               
                  <tbody>

                    <?php

                    $totalItem = 0;
                    $grandTotal = 0;

                    ?>
                     <!-- db theke sob data anar jonno -->

                    @foreach ($user->sales as $sale)
                    <tr>
                     

                      <!--<td>{{ $user->group_id }}</td>

                        1. comment kora line er  poriborte nicher line a group r user er relation create kore just title dekhano hoise.
                        2. relation er jonno [user.php te GROUP function]
                        3.relation er jonno [group.php te user function]
                       --> 

                      <td>{{ $sale->challan_no }}</td>
                      <td>{{ $user->name }}</td>
                      <td>{{ $sale->date }}</td>
                      <td>
                        <?php

                        $itemQty = $sale->items()->sum('quantity');
                        $totalItem += $itemQty;
                        echo $itemQty;

                        ?>
                      </td>

                        <td>
                        <?php

                        $total = $sale->items()->sum('total');
                        $grandTotal += $total;
                        echo $total;

                        ?>
                      </td>

                      <td class="text-right">

                         <!-- delete korte hoy id dea ja loop theke pabo 
                          form niscchi karon delete method use kora lagbe tai.

                         -->

                        <form method="POST" action="{{ route('user.sales.destroy' ,['id'=> $user->id , 'invoice_id' => $sale->id ] ) }}">

                          <a class="btn btn-info" href="{{ route('user.sales.invoice_details',['id' => $user->id ,'invoice_id' => $sale->id]) }}"><i class="fa fa-eye"></i> Show </a>


                           <!-- form a obbossoi @csrf dite hobe r post chara onno method hole die dite hobe -->

                           @if($itemQty == 0)

                        @csrf
                      @method('DELETE')

                    <button onclick="return confirm('r u sure?')" type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete
                    </button>
                    @endif
             
                        </form>
                      </td>
                    </tr>
                    @endforeach                                      
                  </tbody>

                     <tfoot>
                   <tr>
                      <th>Challen no</th>
                      <th>Customer</th>
                      <th>Date</th>
                      <th>{{$totalItem}}</th>
                      <th>{{$grandTotal}}</th>
                      <th class="text-right">Action</th>
                    </tr>

                  </tfoot>
                </table>         
              </div>
              </div>

              </div>
     







<!-- Modal for add new sale-->
<!-- j kono page theke open  add new sale-->

<div class="modal fade" id="newSale" tabindex="-1" role="dialog" aria-labelledby="newSaleModalLabel" aria-hidden="true">

  <div class="modal-dialog" role="document">

      {!! Form::open(['route' => ['user.sales.store',$user->id] , 'method' => 'post']) !!}

    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newSaleModalLabel">new Sale Invoice</h5>
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
                 <label for="challan_no" class="col-sm-3 text-right col-form-label"><strong>Challan No:</strong></label>

                <div class="col-sm-9">               
                 <!-- 
                 <input type="name" class="form-control" id="name" placeholder="Name">
                -->

                 {{ Form::text('challan_no' , NULL , ['class' => 'form-control' , 'id' => 'challan_no' , 'placeholder' => 'enter Challan number', 'required']) }}


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



@stop