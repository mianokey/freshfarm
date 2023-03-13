@if(Auth::check())
    <div class="d-flex justify-content-center mt-3">
    <div class="card" class="" style="width:40%">
       
        @if (session('success'))
    <div style="max-height: 60px" class="col-sm-12">
        <div class="alert  alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
        </div>
    </div>
@endif

        <div class="card-header bg-success  text-center">
            <h5 class="text-white">CREATE NEW  ANIMAL ENTRY</h5>
        </div>
        <form action="{{route('animal.store')}}" method="post" >
            @csrf 
        <div class="p-3">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" required name="name" id="name" placeholder="animal name">
                <label for="name">Animal Name</label>
              </div>
              <div class="form-floating mb-3">
                <input type="number" min='1' class="form-control" name="qty" required id="qty" placeholder="Quantity">
                <label for="qty">Quantity</label>
              </div>
              <div class="form-floating mb-3">
                <input type="text" class="form-control" required name="feeds" id="feeds" placeholder="Enter animal feed">
                <label for="feeds">Animal Feed</label>
              </div>
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="note" name="note" placeholder="Enter farmers note">
                <label for="feeds">Farmers Note</label>
              </div>
              
              <div style="float:right">
                <button type="submit" class="btn btn-success mb-2">Add Animal</button>
            </div>
              
        </div>
        
    
      </div>
    </div>
    </form>
    @endif

