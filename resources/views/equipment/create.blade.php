@extends('layouts.app')

{{-- {{dd($types)}} --}}

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="p-4 bg-white shadow-sm">
				{{-- @if (session('status'))
					<div class="alert alert-success" role="alert">
						{{ session('status') }}
					</div>
				@endif --}}

				@if ($errors->any())
					<div class="alert alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif
				
				<div class="d-flex align-items-center justify-content-between">
					<h3>Add Equipment</h3>
				</div>

				<form method="POST" action="{{ route('admin.equipments.store') }}" class="mt-4">
					@csrf

					<div class="form-group row">
						<label class="col-sm-2 col-form-label" for="name">Name</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="name" name="name">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label" for="type">Type</label>
						<div class="col-sm-10">
							<select class="form-control" name="type_id" id="type">
								@foreach ($types as $option)
								<option value="{{ $option->id }}">{{ $option->name }}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label" for="description">Description</label>
						<div class="col-sm-10">
							<textarea class="form-control" id="description" name="description" rows="4"></textarea>
						</div>
					</div>
					<div class="form-group d-flex justify-content-end">
						<a href="{{ route('admin.equipments.index') }}" class="btn btn-secondary">
							Cancel
						</a>
						<button class="btn btn-primary ml-2" type="submit">
							Submit
						</button>
					</div>
				</form>
            </div>
        </div>
    </div>
</div>
@endsection
