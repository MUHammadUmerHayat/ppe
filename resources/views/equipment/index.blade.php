@extends('layouts.app')

{{-- {{ dd($equipments) }} --}}

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="p-4 bg-white shadow-sm">
				@if (session('status'))
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						{{ session('status') }}
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				@endif
				
				<div class="d-flex align-items-center justify-content-between">
					<div class="d-flex">
						<h3 class="mb-0">Equipments</h3>
						<a class="btn btn-primary ml-4" href="{{ route('admin.equipments.create') }}">Add New</a>
					</div>
					<form class="form-inline">
						<div class="form-group">
							<label for="search" class="sr-only">Search</label>
							<input type="search" class="form-control" id="search" name="search" value="{{ request()->search }}" placeholder="Search...">
						</div>
						<button type="submit" class="btn btn-dark ml-2">Search</button>
					</form>
				</div>

				<div class="d-flex align-items-center justify-content-between mt-4">
					<div>Showing {{ _countPerPage($equipments) }} out of {{ $equipments->total() }}</div>
					<div class="d-flex align-items-center">
						<form class="form-inline" method="GET" action="{{ route('admin.equipments.index', [request()->order]) }}">
							<label class="mr-2 sr-only" for="order">Order by</label>
							<select class="custom-select custom-select-sm" id="order" name="order">
								<option disabled selected>Select</option>
								<option {{ request()->order === 'name' ? 'selected' : '' }} value="name">Name</option>
								<option {{ request()->order === 'id' ? 'selected' : '' }} value="id">ID</option>
							</select>
							<button type="submit" class="btn btn-sm btn-secondary ml-2">Order By</button>
						</form>
					</div>
				</div>

				<table class="table table-sm mt-3">
					<thead>
						<tr>
							<th scope="col">ID</th>
							<th scope="col">Name</th>
							<th scope="col">Description</th>
							<th scope="col">Actions</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($equipments as $item)
						<tr>
							<th scope="row">{{ $item->id }}</th>
							<td>{{ $item->name }}</td>
							<td>{{ $item->description }}</td>
							<td>
								<a class="btn btn-sm btn-secondary" href="{{ route('admin.equipments.show', $item->id) }}">
									View
								</a>
								<a class="btn btn-sm btn-success" href="{{ route('admin.equipments.edit', $item->id) }}">
									Edit
								</a>
								<form method="POST" action="{{ route('admin.equipments.trash', $item->id) }}">
									@csrf
									@method('DELETE')
									<button class="btn btn-sm btn-danger">
										Trash
									</button>
								</form>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>

				{{ $equipments->appends(request()->only(['search', 'order']))->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
