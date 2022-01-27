@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        Create Category
                    </div>
                    <div class="card-body">
                        <form action="{{route('category.store')}}" method="post">
                            @csrf
                            <div class="row align-items-end">
                                <div class="col-6 col-lg-3">
                                    <label for="categoryinput" class="form-label"> Category</label>
                                    <input type="text" id="categoryinput" class="form-control @error('title') is-invalid   @enderror" name="title" value="{{old('title')}}">
                                </div>
                                <div class="col-5 col-lg-3">
                                    <button class="btn btn-primary">Add Category</button>
                                </div>
                            </div>
                            @error('title')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
