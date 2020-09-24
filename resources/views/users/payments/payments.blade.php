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
              <h6 class="m-0 font-weight-bold text-primary">Payments Of <strong>{{ $user->name }}</strong></h6>
            </div>
            <div class="card-body" >
                 <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                   <!-- db te jotota column segula -->
                  <thead>
                    <tr>
                      <th>Customer</th>
                      <th>Total</th>
                      <th>Date</th>
                     
                      <th>Note</th>
                      <th class="text-right">Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                   <tr>
                      <th class="text-right">Total:</th>
                      <th>{{ $user->payments()->sum('amount') }}</th>
                     
                      
                      <th colspan="3"></th>
                   
                    </tr>

                  </tfoot>
                  <tbody>
                     <!-- db theke sob data anar jonno -->

                    @foreach ($user->payments as $payment)
                    <tr>
                     

                      <!--<td>{{ $user->group_id }}</td>

                        1. comment kora line er  poriborte nicher line a group r user er relation create kore just title dekhano hoise.
                        2. relation er jonno [user.php te GROUP function]
                        3.relation er jonno [group.php te user function]
                       --> 

                      <td>{{ $user->name }}</td>
                      <td>{{ $payment->amount }}</td>
                      <td>{{ $payment->date }}</td>
                      <td>{{ $payment->note }}</td>
                     

                      <td class="text-right">

                         <!-- delete korte hoy id dea ja loop theke pabo 
                          form niscchi karon delete method use kora lagbe tai.

                         -->

                        <form method="POST" action="{{ route('user.payments.destroy' ,['id'=> $user->id , 'payment_id' => $payment->id] ) }}">

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


              <!-- Button trigger modal -->

              <!-- PURCHASE a click korle j MODAL ashby seta -->






<!-- Modal -->

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

                 {{ Form::textarea('note' , NULL , ['class' => 'form-control' , 'id' => 'note' ,'rows'=> '2' ,'placeholder' => 'Note']) }}


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