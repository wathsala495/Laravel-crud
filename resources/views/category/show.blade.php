@extends('layouts.fronend')

@section('content')
       <div class="container">
        <div class="row">
            <div class="col-md-12">
               
         
                <div class="card">
                    <div class="card-header">
                        <h4>Show Category 
                           
                        </h4>
                    </div>
                    <div class="card-body">
                       <form action="{{route('category.update',$category->id)}}" method="POST">
                       @csrf
                       @method('PUT')

                        <div class="mb-3">
                            <label >Name</label>
                            <p>{{$category->name}}</p>
                        </div>
                        <div class="mb-3">
                            <label >Description</label>
                            <p>{{ $category->description }}</p>
                            
                        </div>
                        <div class="mb-3">
                            <label>Status</label>
                            {{$category->status==1?'checked':''}}
                            
                        </div>
                        
                       </form>
                    </div>
                </div>
            </div>
        </div>
       </div>
@endsection