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
            <div class="col-md-10">  
                            <!--x-->

               <!--1.form ta bootstrape theke
                2.form action group page a tai url group er

              <form method="POST" action="{{ url('users') }}">
                -->



                <!-- UPDATE er jonno just ei condition 2 tai enough -->

                @if (isset($product))

                {!! Form::model( $product ,['route' => ['products.update' ,$product->id], 'method' => 'put']) !!}

                @else

                {!! Form::open(['route' => 'products.store' , 'method' => 'post']) !!}

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
                 <label for="title" class="col-sm-2 text-right col-form-label"><strong>Title:<span class="text-danger">*</span></strong></label>

                <div class="col-sm-10">               
                 <!-- 
                 <input type="name" class="form-control" id="name" placeholder="Name">
                -->

                 {{ Form::text('title' , NULL , ['class' => 'form-control' , 'id' => 'title' , 'placeholder' => 'Title']) }}


               </div>
                </div>  


                 <div class="form-group row">
                 <label for="description" class="col-sm-2 text-right col-form-label"><strong>Description:</strong></label>
                <div class="col-sm-10">
                  {{ Form::textarea('description' , NULL , ['class' => 'form-control' , 'id' => 'description' , 'placeholder' => 'Description']) }}
               </div>
                </div> 

                <div class="form-group row">
                 <label for="name" class="col-sm-2 text-right col-form-label"><strong>Category:<span class="text-danger">*</span></strong></label>
                <div class="col-sm-5">
                  {{ Form::select('category_id', $categories, NULL ,  ['class' => 'form-control' , 'id' => 'group' , 'placeholder' => 'Select category'])}}
               </div>
                </div> 


                 <div class="form-group row">
                 <label for="cost_price" class="col-sm-2 text-right col-form-label"><strong>Cost_price:</strong></label>
                <div class="col-sm-5">
                 
                  {{ Form::text('cost_price' , NULL , ['class' => 'form-control' , 'id' => 'cost_price' , 'placeholder' => 'Cost_price']) }}
               </div>
                </div> 


                 <div class="form-group row">
                 <label for="price" class="col-sm-2 text-right col-form-label"><strong>Price:</strong></label>
                <div class="col-sm-5">
                 
                  {{ Form::text('price' , NULL , ['class' => 'form-control' , 'id' => 'price' , 'placeholder' => 'Price']) }}
               </div>
                </div> 

                <div class="form-group row">
                 <label for="name" class="col-sm-2 text-right col-form-label"><strong>Has stock:<span class="text-danger">*</span></strong></label>
                <div class="col-sm-2">
                  {{ Form::select('has_stock', ['1' =>'Yes' , '0' => 'no'] , NULL , ['class' => 'form-control' , 'id' => 'group'])}}
               </div>
                </div>


                 <div class="form-group row">
                 <label for="price" class="col-sm-2 text-right col-form-label"> </label>
                    <div class="mt-3 ">
                   <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Submit</button>

          </div>
          </div> 

          {!! Form::close() !!}


           <!--  </form> .. ETAR PORIBORTE UPORER CLOSE LINE -->
         </div> 
         </div>
            </div>
          </div>

@stop