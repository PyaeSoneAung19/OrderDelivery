<x-frontend>

  <section class="pt-5">
    <header class="text-left AllMenu">
      <h2 class="h5 text-uppercase mb-4 text-black">Your Order History </h2>
    </header>
    <p class="small text-muted small text-uppercase mb-1">Name : <strong>{{ AUth::user()->name }} </strong></p>
    <p class="small text-muted small text-uppercase mb-1">Phone : <strong>{{ AUth::user()->phone }} </strong></p>
    <p class="small text-muted small mb-1">E-MAIL : <strong>{{ AUth::user()->email }} </strong></p>
    
    <br>
    <div class="container">
      <div class="row">
        <table class="table table-striped" id="orderhistory">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Order Date</th>
              <th scope="col">Voucher No</th>
              <th scope="col">Total Amount</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @php $i=1; @endphp
            @foreach($users as $user)
              <tr>
                <th scope="row">{{$i++}}</th>
                <td>{{$user->orderdate}}</td>
                <td>{{$user->voucherno}}</td>
                <td>{{$user->total}}</td>
                <td> 
                  
                    <i class="fas fa-info-circle detailBtn" style="font-size: 25px; color:black; cursor: pointer;" data-id="{{$user->id}}"></i>
                  
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        <table class="table table-striped" id="detailhistory">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Menu</th>
              <th scope="col">Price</th>
              <th scope="col">Quantity</th>
              <th scope="col">Sub Total</th>
            </tr>
          </thead>
          <tbody id="menudetail">
            
          </tbody>

        </table>
        <a class="btn btn-secondary detailback mb-3 text-white"> Back </a>
      </div>
    </div>
  </section>
</x-frontend>