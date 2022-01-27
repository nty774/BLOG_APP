@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        Create Category
                        <div class="d-flex justiry-content-center">
                            <a href="{{ route('category.create') }}" class="btn btn-outline-primary ">Create Category</a>
                            <form class="d-flex ps-3">
                                <input class="form-control me-2" type="search" placeholder="Search Something" aria-label="Search" name="search">
                                <button class="btn btn-outline-primary" type="submit">
                                    <i class="fas fa-search fa-fw"></i>
                                </button>
                            </form>
                        </div>

                    </div>
                    @isset(request()->search)
                        <p class="alert alert-primary">
                            <a href="{{ route('category.index') }}" class="btn btn-outline-primary">
                                <i class="fether-list"></i>
                                 All Post
                           </a>

                            <span class="h5">Search By : "{{ request()->search }}"</span>
                        </p>
                    @endisset

                    @if(session('status'))
                        <p class="alert alert-success">
                            {{ session('status') }}
                        </p>
                    @endif
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>title</th>
                                    <th>owner</th>
                                    <th>Control</th>
                                    <th>Create_at</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->title }}</td>
                                    <td>{{ $category->user->name}}</td>
                                    <td>
                                        <a href="{{ route('category.edit',$category->id) }}" class="btn btn-outline-primary"><i class="fas fa-pencil-alt fa-fw"></i></a>
                                        <form action="{{ route('category.destroy',$category->id) }}" method="post" class="d-inline-block">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-outline-primary"><i class="fas fa-trash-alt fa-fw"></i></button>
                                        </form>
                                    </td>
                                    <td>

                                        <i class="fas fa-calendar-week"></i>
                                        {{ $category->created_at->format('Y-m-d') }} |
                                        <i class="fas fa-clock "></i> {{ $category->created_at->diffForHumans() }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td class="text-center" colspan="4">There is no Category</td>
                                </tr>

                                @endforelse

                            </tbody>
                        </table>

                        <div class="d-flex justify-content-between">
                            {{ $categories->links() }}
                            <p class="font-weight-bold mb-0 h4"> <small>Category Total : {{ $categories->total() }}</small> </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
