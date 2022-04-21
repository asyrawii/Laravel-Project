<div class="container">
<h2>List of cars</h2>
<div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">ID</th>
              <th scope="col">Plate Number</th>
              <th scope="col">Card Number</th>
              <th scope="col">Clocked in</th>
              <th scope="col">Clocked out</th>
            </tr>
          </thead>
          <tbody>
          @foreach($car as $cars)
            <tr>
              <td>{{ $loop->iteration}}</td>
              <td>{{ $cars->id}}</td>
              <td>{{ $cars->plate_number}}</td>
              <td>{{ $cars->card_number}}</td>
              <td>{{ date('d-M-Y H:m:s',strtotime($cars->created_at))}}</td>
              <td>{{ date('d-M-Y H:m:s',strtotime($cars->updated_at))}}</td>
              <td>
                    <a href="/home"><img src="/bootstrap/images/edit.svg" class="bi me-2" width="32" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></img></a>
                    <a href="/home"><img src="/bootstrap/images/delete.svg" class="bi me-2" width="32" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></img></a>
                </td>
            </tr>
            @endforeach
          </tbody>
        </table>

      </div>
</div>

<div class="text-center">
<main class="form-signin">
  <form  action="timeIn" method="post">
  @csrf
    <h1 class="h3 mb-3 fw-normal">Register</h1>
    <div class="form-floating">
      <input type="text" class="form-control" id="exampleInputName1" placeholder="card_number" name="card_number">
      <label for="exampleInputName1">Card Number</label>
    </div>
    <div class="form-floating">
      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="plate_number" name="plate_number">
      <label for="exampleInputEmail1">Plate Number</label>
    </div>

    <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
    <button class="w-100 btn btn-lg btn-secondary my-2" type="button" onclick="javascript:history.back()">Cancel</button>
    <!-- <a href="{{ URL::previous() }}" class="btn btn-warning"> <i class="fas fa-arrow-left"></i> Go Back</a> -->
  </form>
</main>
</div>
<div>
  <form action="carlist" method="post" class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
  @csrf
    <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search" value="{{request()->input('search')}}" name="search">
    <button type="submit" class="btn btn-outline-light me-2">Search</button>
  </form>
</div>