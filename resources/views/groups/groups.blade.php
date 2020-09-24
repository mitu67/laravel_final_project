@extends('layout.main')


@section('main_content')

  <!-- user group r new group[(button)+link address] er jonno -->
         <!-- page_header ta style.css a ase -->

<div class="row clearfix page_header">
	<div class="col-md-6">
		<h2>User Groups</h2>
	</div>
	<div class="col-md-6 text-right">
	<a class="btn btn-info" href="{{ url('groups/create') }}"><i class="fa fa-plus"></i> new group</a>
	</div>
</div>
                      <!-- x -->

         <!-- public er okhan theke table.html copy kore boshalam -->

  <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                	 <!-- db te jotota column segula -->
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Title</th>
                      <th class="text-right">Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>Title</th>
                      <th class="text-right">Action</th>
                    </tr>

                  </tfoot>
                  <tbody>
                  	 <!-- db theke sob data anar jonno -->

                  	@foreach ($groups as $group)
                    <tr>
                      <td>{{ $group->id }}</td>
                      <td>{{ $group->title }}</td>
                      <td class="text-right">

                      	 <!-- delete korte hoy id dea ja loop theke pabo 
                      	 	form niscchi karon delete method use kora lagbe tai.

                      	 -->

                      	<form method="POST" action="{{ url('groups/' . $group->id) }}">
                      		 <!-- fo a obbossoi @csrf dite hobe r post chara onno method holedie dite hobe -->
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