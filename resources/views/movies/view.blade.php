@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $movie->name}}
                </div>
               
                <div class="card-body">
                    <table class="table">
                        
                            <tr>
                                <td>{{ $movie->name}}</td>
                                <td>{{ $movie->description}}</td>
                                <td><img src="{{ $movie->image_url}}" alt="" width="200px"></td>
                                <td>{{ $movie->release_date }}</td>
                                <td><iframe width="560" height="315" src="{{ $movie->url}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe></td>
                                <td>
                                        
                                </td>
                              </tr>
                           
                        
                          
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>

@endsection
