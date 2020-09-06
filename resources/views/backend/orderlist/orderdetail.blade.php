<x-backend>



<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Invoice</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Invoice</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content mt-5">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="invoice p-3 mb-3">
              
              <!-- info row -->
              <div class="row invoice-info">
                {{-- <div class="col-sm-4 invoice-col">
                  From
                  <address>
                    <strong>Admin, Inc.</strong><br>
                    795 Folsom Ave, Suite 600<br>
                    San Francisco, CA 94107<br>
                    Phone: (804) 123-5432<br>
                    Email: info@almasaeedstudio.com
                  </address>
                </div> --}}
                <!-- /.col -->
                {{-- <div class="col-sm-4 invoice-col">
                  To
                  <address>
                    <strong>John Doe</strong><br>
                    795 Folsom Ave, Suite 600<br>
                    San Francisco, CA 94107<br>
                    Phone: (555) 539-1037<br>
                    Email: john.doe@example.com
                  </address>
                </div> --}}
                <!-- /.col -->
                <div class="col-sm-8 invoice-col">
                  <label> <strong>Voucher No</strong> - {{$order->voucherno}}</label> <br>
                 
                  {{-- <b>Order ID:</b> 4F3S8J<br>
                   --}}{{-- <b>Payment Due:</b> 2/22/2014<br>
                  <b>Account:</b> 968-34567 --}}
                </div>

                <div class="col-sm-4 text-right">
                    <label>Date: {{$order->orderdate}}</label>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table">
                    <thead class="thead-dark">
                    <tr>
                   	 <th>No</th>
                      <th>Menu</th>
                      <th>Qty</th>
                      <th>Price</th>
                      <th>Subtotal</th>                
                    </tr>
                    </thead>
                    <tbody>
                      @php   
                          $i=1; 

                         $total=0;     

                      @endphp
                    @foreach($orderdetails as $orderdetail)
                    <tr>
                      <td>{{$i++}}</td>
                      <td>{{$orderdetail->menu_name}}</td>
                      <td>{{$orderdetail->qty}}</td>
                      <td>{{$orderdetail->menu_price}} Kyats</td>
                      <td>{{$orderdetail->qty*$orderdetail->price}} Kyats</td>

                      @php

                        $total+=$orderdetail->qty*$orderdetail->price;


                      @endphp
                    </tr>
                   @endforeach
                      <td colspan="4" class="text-right"><b>Total Amount <b></td>
                      <td> <b>{{$total}}</b> Kyats </td>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

          
              <!-- /.row -->

              <!-- this row will not appear when printing -->
       {{--        <div class="row no-print">
                <div class="col-12">
                  <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                  <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                    Payment
                  </button>
                  <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generate PDF
                  </button>
                </div>
              </div> --}}
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>



















</x-backend>