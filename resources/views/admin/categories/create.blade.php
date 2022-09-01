@extends('admin.master')
@section('content')



<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0 text-gray-800">Create New Category</h1>
    <a class="btn btn-dark" href="{{ route('admin.categories.index') }}">All Categories</a>
</div>
<form action="{{ route('admin.categories.store') }}" method="post" enctype="multipart/form-data">
@csrf
<div class="mb-3">
    <label for="Name">Name:</label>
    <input type="text" name="name" id="name" class="form-control" >
</div>


{{-- <div class="mb-3">
    <input type="file" name="image" id="image">
</div> --}}

<div class="input-group">
    <span class="input-group-btn">
      <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
        <i class="fa fa-picture-o"></i> Choose
      </a>
    </span>
    <input id="thumbnail" class="form-control" type="text" name="image">
  </div>
  <div id="holder" style="margin-top:15px;max-height:100px;"></div>

  <div class="mb-3">
    <label>Parent</label>
    <select name="parent_id" class="form-control">
        <option value="" disabled selected>--Select--</option>
        @foreach ($categories as $item)
            <option value="{{ $item->id }}">{{ $item->name }}</option>
        @endforeach
    </select>
</div>


<button class="btn btn-success px-5">Save</button>

</form>

@endsection


