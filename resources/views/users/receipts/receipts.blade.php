@extends('users.user_layout')


@section('user_content')


@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

            
                 <!-- public er okhan theke table.html copy kore boshalam -->

  <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Receipts Of <strong>{{ $user->name }}</strong></h6>
            </div>
            <div class="card-body" >
                 <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                   <!-- db te jotota column segula -->
                  <thead>
                    <tr>
                      <th>Admin</th>
                      <th>Total</th>
                      <th>Date</th>
                     
                      <th>Note</th>
                      <th class="text-right">Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                   <tr>
                    <th>Admin</th>
                      <th>{{$user->receipts->sum('amount')}}</th>
                      <th colspan="3"></th>
                      
                 
                    </tr>

                  </tfoot>
                  <tbody>
                     <!-- db theke sob data anar jonno -->

                    @foreach ($user->receipts as $receipt)
                    <tr>
                     

                      <!--<td>{{ $user->group_id }}</td>

                        1. comment kora line er  poriborte nicher line a group r user er relation create kore just title dekhano hoise.
                        2. relation er jonno [user.php te GROUP function]
                        3.relation er jonno [group.php te user function]
                       --> 
                    
                                     <!--

                        1 .
                      <td>{{ ($receipt->admin) ? $receipt->admin->name : "" }}</td>
                      2.   nicher line
                      -->
                          
                      <td>{{ optional($receipt->admin)->name }}</td>
                      <td>{{ $receipt->amount }}</td>
                      <td>{{ $receipt->date }}</td>
                      <td>{{ $receipt->note }}</td>
                     

                      <td class="text-right">

                         <!-- delete korte hoy id dea ja loop theke pabo 
                          form niscchi karon delete method use kora lagbe tai.

                         -->

                        <form method="POST" action="{{ route('user.receipts.destroy' ,['id'=> $user->id ,'receipt_id' => $receipt->id] ) }}">


                           <!-- form a obbossoi @csrf dite hobe r post chara onno method hole die dite hobe -->

                        @csrf
                      @method('DELETE')

                    <button onclick="return confirm('r u sure?')" type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
             
                        </form>
                      </td>
                    </tr>
                    @endforeach    

                  </tbody>
                </table>  

              </div>
             </div>

          </div>
     


<!-- Modal for add new receipt-->
<!-- only receipt a dhuke  add new receipt korte hobe..user_layout a dile a dely all page theke open hobe-->

<div class="modal fade" id="newReceipt" tabindex="-1" role="dialog" aria-labelledby="newReceiptModalLabel" aria-hidden="true">

  <div class="modal-dialog" role="document">

      {!! Form::open(['route' => ['user.receipts.store',$user->id] , 'method' => 'post']) !!}

    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newReceiptModalLabel">new Receipt</h5>
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

@stop