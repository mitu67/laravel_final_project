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

                     <td>{{ optional($payment->admin)->name }}</td>
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



     
@stop