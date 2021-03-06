@extends('layout.main')



@section('main_content')

 <!-- form er upore error msg show korar jonno  -->

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

 <!--  [x ] -->


 <!-- copy total table[groups.blede] r [x ]er agey porjonto rekhe sob delete -->

<h2>{{ $headline }}</h2>

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">{{ $headline }}</h6>
            </div>
            <div class="card-body">
               <!--justify-content-md-center [row majhy ashbe]-->

            <div class="row justify-content-md-center">  
            <div class="col-md-6">  
                            <!--x-->

               <!--1.form ta bootstrape theke
                2.form action group page a tai url group er

              <form method="POST" action="{{ url('users') }}">
                -->



                <!-- UPDATE er jonno just ei condition 2 tai enough -->

                @if (isset($user))

                {!! Form::model( $user ,['route' => ['users.update' ,$user->id], 'method' => 'put']) !!}

                @else

                {!! Form::open(['route' => 'users.store' , 'method' => 'post']) !!}

                @endif

                                         <!-- x -->


                <!--  COLLECTIVE FORM -->
                <!--  

                {!! Form::open(['route' => 'users.store' , 'method' => 'post']) !!}
              -->

                <!-- 

                1.form ta collectiver form theke neoua.
                2.ekhetre @csrf dite hoy na

               -->
               <!-- 

                @csrf
                -->

                <div class="form-group row">
                 <label for="name" class="col-sm-3 col-form-label"><strong>User Group:<span class="text-danger">*</span></strong></label>
                <div class="col-sm-9">
                  {{ Form::select('group_id', $groups, NULL ,  ['class' => 'form-control' , 'id' => 'group' , 'placeholder' => 'Group'])}}
               </div>
                </div> 


                   <div class="form-group row">
                 <label for="name" class="col-sm-3 col-form-label"><strong>Name:</strong></label>

                <div class="col-sm-9">               
                 <!-- 
                 <input type="name" class="form-control" id="name" placeholder="Name">
                -->

                 {{ Form::text('name' , NULL , ['class' => 'form-control' , 'id' => 'name' , 'placeholder' => 'Name']) }}


               </div>
                </div>  

                 <div class="form-group row">
                 <label for="email" class="col-sm-3 col-form-label"><strong>Email:</strong></label>
                <div class="col-sm-9">
                  {{ Form::text('email' , NULL , ['class' => 'form-control' , 'id' => 'email' , 'placeholder' => 'Email']) }}
               </div>
                </div> 

                 <div class="form-group row">
                 <label for="phone" class="col-sm-3 col-form-label"><strong>Phone:</strong></label>
                <div class="col-sm-9">
                 
                  {{ Form::text('phone' , NULL , ['class' => 'form-control' , 'id' => 'phone' , 'placeholder' => 'Phone']) }}
               </div>
                </div> 

                 <div class="form-group row">
                 <label for="address" class="col-sm-3 col-form-label"><strong>Address:</strong></label>
                <div class="col-sm-9">
                 
                  {{ Form::text('address' , NULL , ['class' => 'form-control' , 'id' => 'address' , 'placeholder' => 'Address']) }}
               </div>
                </div> 


                    <div class="mt-3 text-right">
                   <button type="submit" class="btn btn-primary">Submit</button>

          </div>

          {!! Form::close() !!}


           <!--  </form> .. ETAR PORIBORTE UPORER CLOSE LINE -->
         </div> 
         </div>
            </div>
          </div>

@stop