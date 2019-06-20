@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="p-4 bg-white shadow-sm">
				@if (session('status'))
					<div class="alert alert-success" role="alert">
						{{ session('status') }}
					</div>
				@endif
				
				<div class="d-flex align-items-center justify-content-between">
					<h3>Add Equipment</h3>
				</div>

				<form class="mt-4">
					<div class="form-group row">
						<label class="col-sm-2 col-form-label" for="name">Name</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="name" placeholder="">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label" for="description">Description</label>
						<div class="col-sm-10">
							<textarea class="form-control" id="description" name="description" rows="4"></textarea>
						</div>
					</div>
					<div class="form-group d-flex justify-content-end">
						<a href="{{ route('admin.equipments') }}" class="btn btn-secondary">
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
