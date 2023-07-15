{{-- 1.	Movie name (Required)
2.	Movie description (Required)
3.	Movie YouTube URL (Required)
4.	Movie Image (Laravel File Upload) 
a.	User can add/edit/remove image using jQuery and ajax 
5.	Movie Release date (date picker) (Required)
6.	Movie slug (unique name) (Required) --}}



<div class="row mb-3">
    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Movie name') }}</label>

    <div class="col-md-6">
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
            value="{{ old('name') }}" required autocomplete="name" autofocus>

        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Movie description') }}</label>

    <div class="col-md-6">
        <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description"
            value="{{ old('description') }}" required autocomplete="description" >

        @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="row mb-3">
    <label for="slug" class="col-md-4 col-form-label text-md-end">{{ __('Movie slug') }}</label>

    <div class="col-md-6">
        <input id="slug" type="text" class="form-control @error('slug') is-invalid @enderror" name="slug"
            value="{{ old('slug') }}" required autocomplete="slug" autofocus>

        @error('slug')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="url" class="col-md-4 col-form-label text-md-end">{{ __('Movie url (youtube link)') }}</label>

    <div class="col-md-6">
        <input id="url" type="url" class="form-control @error('url') is-invalid @enderror" name="url"
            value="{{ old('url') }}" required autocomplete="url" >

        @error('url')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="image" class="col-md-4 col-form-label text-md-end">{{ __('Movie image') }}</label>

    <div class="col-md-6">
        <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image"
            value="{{ old('image') }}" required autocomplete="image" >

        @error('image')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    
    <label for="release_date" class="col-md-4 col-form-label text-md-end">{{ __('Movie release date') }}</label>

    <div class="col-md-6">
        <input id="release_date" type="date" class="form-control @error('release_date') is-invalid @enderror" name="release_date"
            value="{{ old('release_date') }}" required autocomplete="release_date" >

        @error('release_date')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

