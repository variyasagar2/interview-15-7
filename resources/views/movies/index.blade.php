@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Movies') }}
                </div>
                <form action="">
                <div class="row">
                  
                    <div class="col-md-3">
                        <select name="sort" class="form-control form-select" id="">
                            <option value="name">name</option>
                            <option value="release_date">release date</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select name="sort_order" class="form-control form-select" id="">
                            <option value="asc">asc</option>
                            <option value="desc">desc</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <input  name="filter"  class="form-control" placeholder="search" >
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-info">Search</button>
                        <a href="{{ route('manager.movies.index')}}" class="btn btn-info">clear</a>
                        @if(auth()->user() && auth()->user()->role =='manager')
                            <a href="{{ route('manager.movies.create')}}">Add</a>
                        @endif
                    </div>
                </div>
            </form>
                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Image</th>
                            <th scope="col">Date</th>
                            <th scope="col">Video</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @forelse ($movies as $movie)
                            <tr>
                                <td>{{ $movie->name}}</td>
                                <td>{{ $movie->description}}</td>
                                <td><img src="{{ $movie->image_url}}" alt="" width="200px"></td>
                                <td>{{ $movie->release_date }}</td>
                                <td><iframe width="560" height="315" src="{{ $movie->url}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe></td>
                                <td>
                                        
                                </td>
                              </tr>
                            @empty
                            <tr>
                                <th colspan="5">{{  __('No data found')}}</th>
                              </tr>
                            @endforelse
                        
                          
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>

@endsection
