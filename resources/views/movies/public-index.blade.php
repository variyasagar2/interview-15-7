@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Movies') }}
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Image</th>
                            <th scope="col">view</th>
                           
                          </tr>
                        </thead>
                        <tbody>
                            @forelse ($movies as $movie)
                            <tr>
                                <td>{{ $movie->name}}</td>
                                <td>{{ $movie->description}}</td>
                                <td><img src="{{ $movie->image_url}}" alt="" width="200px"></td>
                            <td scope="col"><a href="{{ route('movies.details',$movie->slug)}}">view</a></td>
                               
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
