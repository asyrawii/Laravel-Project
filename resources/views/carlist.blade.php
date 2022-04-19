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
              <td>{{ date('D,d F Y',strtotime($cars->created_at))}}</td>
              <td>{{ date('D,d F Y',strtotime($cars->updated_at))}}</td>
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