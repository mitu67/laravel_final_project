@extends('layout.main')



@section('main_content')

 <!-- copy total table[groups.blede] r [x ]er agey porjonto rekhe sob delete -->

<h2>Create New Group</h2>

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">New Group</h6>
            </div>
            <div class="card-body">
               <!--justify-content-md-center [row majhy ashbe]-->

            <div class="row justify-content-md-center">  
            <div class="col-md-6">  
                            <!--x-->
               <!--1.form ta bootstrape theke
                2.form action group page a tai url group er

               -->

              <form method="POST" action="{{ url('groups') }}">
                @csrf

              <div class="form-group">
             <label for="title">Group Title</label>
            <input type="title" name="title" class="form-control" id="title" placeholder="Enter Group Title">
        <small id="emailHelp" class="form-text text-muted">Title of users Group</small>

          </div>
          
          <button type="submit" class="btn btn-primary">Submit</button>
         </form>
         </div> 
         </div>
            </div>
          </div>

@stop