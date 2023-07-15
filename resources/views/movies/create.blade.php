@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add New Movie') }}</div>

                <div class="card-body">
                    <form method="POST" id="myform" action="{{ route('manager.movies.store') }}" enctype="multipart/form-data">
                        @csrf

                        @include('movies.fields')

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add') }}
                                </button>
                                <a  href="{{ route('manager.movies.index')}}" class="btn btn-primary">
                                    {{ __('cancel') }}
                                </a>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>

    <script>
        $("#myform").validate({
            rules: {
                name: {
                    required: true,
                    maxlength: 191,
                    normalizer: function(value) {
                        return $.trim(value);
                    }
                },
                description: {
                    required: true,
                    normalizer: function(value) {
                        return $.trim(value);
                    }
                },
                slug: {
                    pattern: /^[a-z\d-]+$/,
                    required: true,
                },
                url: {
                    // pattern:/^(?:https?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})(?:\S+)?$/,
                    url: true,

                },
                image: {
                    required: true,
                    extension: "jpg|jpeg|png"
                },
                release_date: {
                    required: true,
                    date: true
                }
            },
            submitHandler: function(form) {
                // do other things for a valid form
                form.submit();
            }
        });
    </script>
@endsection
