<x-adminhomemaster>
  @section('admin-content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Show Animals</h1>
  <a href="{{route('animal.admin_create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add Animal</a>

  <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>

</div>
<div class="card-body">
  @if (session('success'))
  <div style="max-height: 60px" class="col-sm-12">
      <div class="alert  alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
      </div>
  </div>
@endif

  <table class="table table-bordered table-sm table-striped">
      <thead>
          <tr>
              <th>ID</th>
              <th>Name</th>
              <th>quantity</th>
              <th>feed</th>
              <th>note</th>
              <th>Edit</th>
              <th>Delete</th>
          </tr>
      </thead>
      <tbody>
          @foreach ($animals as $animal)
          <tr>
              <td>{{ $animal->id }}</td>
              <td>{{ $animal->name }}</td>
              <td>{{ $animal->quantity }}</td>
              <td>{{ $animal->feeds }}</td>
              <td>{{ $animal->note }}</td>
              <td>
                @can('product-edit')
                  <a href="{{route('animal.admin_edit',$animal->id)}}" class="btn btn-primary btn-sm">Edit</a>
                 @endcan
              </td>
              <td>
                @can('product-delete')
                  <a href="{{route('animal.delete',$animal->id)}}"  class="btn btn-danger btn-sm">Delete</a>
                @endcan
              </td>
          </tr>
          @endforeach
      </tbody>
  </table>

</div>

  @endsection
</x-adminhomemaster>