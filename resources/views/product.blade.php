<x-homemaster>
    @section('content')
    @if(Auth::check())
    <div class="d-flex justify-content-center mt-3">
    <div class="card" class="mt-5 mb-5" style="width:40%">
       
        <div class="card-header text-center">
            <h5>What do you want to add?</h5>
        </div>
        <form action="{{route('category')}}" method="post" >
            @csrf 
        <div class="p-3">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="optionselect" id="fauna" value="crop">
                <label class="form-check-label" for="exampleRadios1">
                  Crop
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="optionselect" id="exampleRadios2" value="animal">
                <label class="form-check-label" for="exampleRadios2">
                  Animal
                </label>
              </div>
        </div>
        <button type="submit" class="btn btn-primary mb-2">Add Option</button>
    </form>
      </div>
    </div>
    @endif


    @endsection
</x-homemaster>