@extends('users.user_layout')


@section('user_content')


            
                 <!-- public er okhan theke table.html copy kore boshalam -->

  <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Purchases Of <strong>{{ $user->name }}</strong></h6>
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
                      <th>Total</th>
                      <th class="text-right">Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                   <tr>
                      <th>Challen no</th>
                      <th>Customer</th>
                      <th>Date</th>
                      <th>Total</th>
                      <th class="text-right">Action</th>
                    </tr>

                  </tfoot>
                  <tbody>
                     <!-- db theke sob data anar jonno -->

                    @foreach ($user->purchases as $purchase)
                    <tr>
                     

                      <!--<td>{{ $user->group_id }}</td>

                        1. comment kora line er  poriborte nicher line a group r user er relation create kore just title dekhano hoise.
                        2. relation er jonno [user.php te GROUP function]
                        3.relation er jonno [group.php te user function]
                       --> 

                      <td>{{ $purchase->challan_no }}</td>
                      <td>{{ $user->name }}</td>
                      <td>{{ $purchase->date }}</td>
                      <td>122</td>

                      <td class="text-right">

                         <!-- delete korte hoy id dea ja loop theke pabo 
                          form niscchi karon delete method use kora lagbe tai.

                         -->

                        <form method="POST" action="{{ route('users.destroy' ,['user'=> $user->id] ) }}">



                          <!-- for show.get method eta -->

                          <a class="btn btn-info" href="{{ route('users.show',['user' => $user->id]) }}"><i class="fa fa-eye"></i> Show </a>


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
     


@stop