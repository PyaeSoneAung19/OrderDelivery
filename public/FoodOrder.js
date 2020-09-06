$(document).ready(function(){

	cartNoti();
	showTable();

	$('.addtocartBtn').on('click',function(){
		// alert('hi');
		var id=$(this).data('id');
		var name=$(this).data('name');
		var codeno=$(this).data('codeno');
		var photo=$(this).data('photo');
		var price=$(this).data('price');
		var qty=1;

		var mylist={id:id,codeno:codeno,name:name,photo:photo,
			price:price,qty:qty};


		// console.log(mylist);
		var cart=localStorage.getItem('cart');
		var cartArray;

		if(cart==null){
			cartArray=Array();
		}
		else{
			cartArray=JSON.parse(cart);
		}

		var status=false;

		$.each(cartArray,function(i,v){
			if(id==v.id){
				v.qty++;
				status=true;
			}


		})
		if(!status){
			cartArray.push(mylist);
		}

		var cartData=JSON.stringify(cartArray);
		localStorage.setItem("cart",cartData);

		cartNoti();
		showTable();

	})


	function cartNoti(){
		var cart=localStorage.getItem('cart');


		if(cart){

			var cartArray=JSON.parse(cart);
			var total=0;
			var noti=0;

			$.each(cartArray,function(i,v){

				var price=v.price;
				
				var qty=v.qty;

				var subtotal=price*qty;

				noti+=qty++;
				total+=subtotal ++;


			})
			$('.shoppingcartNoti').html(noti);
			$('.shoppingcartTotal').html(total);
			$('#shoppingcartTotal1').html(total);
		}
		else{

			$('.shoppingcartNoti').html(0);
			// $('.shoppingcartTotal').html(0+' KS ');
		}
	}


	function showTable(){
		var cart=localStorage.getItem('cart');


		if(cart){

			$('.shoppingcart_div').show();
			$('.noneshoppingcart_div').hide();

			var cartArray=JSON.parse(cart);
			var shoppingcartData='';

			if(cartArray.length>0){

				var total=0;

				$.each(cartArray,function(i,v){

					var id=v.id;
					var name=v.name;
					var codeno=v.codeno;
					var price=v.price;
					var photo = v.photo;
					// var photos=JSON.parse(v.photo);
     //      			var photo=photos[0];
					var qty=v.qty;

					var subtotal=price*qty;

					shoppingcartData+=`
					<tr>
					<th class="pl-0 border-0" scope="row">
					<div class="media align-items-center"><a class="reset-anchor d-block animsition-link"><img src="${photo}" width="70"/></a>
					<div class="media-body ml-3"><strong class="h6"><a class="reset-anchor animsition-link">${name}</a></strong></div>
					</div>
					</th>
					<td class="align-middle border-0">
					<p class="mb-0 small"> ${price} Ks </p>
					</td>
					<td class="align-middle border-0">
					<div class="border d-flex align-items-center justify-content-between px-3"><span class="small text-uppercase text-gray headings-font-family">Quantity</span>
					<div class="quantity">
					<button class="dec-btn p-0 plus_btn" data-id=${i}><i class="fas fa-caret-left"></i></button>
					<input class="form-control form-control-sm border-0 shadow-0 p-0" type="text" value="${qty}"/>
					<button class="inc-btn p-0 minus_btn" data-id=${i}><i class="fas fa-caret-right"></i></button>
					</div>
					</div>
					</td>
					<td class="align-middle border-0">
					<p class="mb-0 small">${subtotal}</p>
					</td>
					<td class="align-middle border-0"><a class="reset-anchor remove" style="cursor:pointer;" data-id=${i}><i class="fas fa-trash-alt small text-muted"></i></a></td>
					</tr>
					`;



				})

				$('#shoppingcart_table').html(shoppingcartData);

			}
			else{

				$('.shoppingcart_div').hide();
				$('.noneshoppingcart_div').show();

			}

		}
		else{
			shoppingcartData+=` <h3> There is no items and Choose </h3>`;
			$('.CartTable').hide();
			$('#shoppingcart_table').html(shoppingcartData);
		}
	


	}


	$('#shoppingcart_table').on('click','.remove',function(){
		var id=$(this).data('id');
		var cart=localStorage.getItem('cart');
		var cartArray=JSON.parse(cart);

		$.each(cartArray,function(i,v){
			
			if(i==id){
			cartArray.splice(id,1);
			}

		})

			//console.log(cartArray);
		var cartData=JSON.stringify(cartArray);
		localStorage.setItem('cart',cartData);

		showTable();
		cartNoti();


	})

	$('#shoppingcart_table').on('click','.plus_btn',function(){
		//alert("ok");
		var id=$(this).data('id');
		console.log(id);
		var cart=localStorage.getItem('cart');
		var cartArray=JSON.parse(cart);

		$.each(cartArray,function(i,v){
			
			if(i==id){
				v.qty++;
			}

		})

			//console.log(cartArray);
		var cartData=JSON.stringify(cartArray);
		localStorage.setItem('cart',cartData);

		showTable();
		cartNoti();
	})

	$('#shoppingcart_table').on('click','.minus_btn',function(){
		var id=$(this).data('id');
		//console.log(id);
		var cart=localStorage.getItem('cart');
		var cartArray=JSON.parse(cart);

		$.each(cartArray,function(i,v){
			
			if(i==id){
				v.qty--;
				if(v.qty==0){
					cartArray.splice(id,1);
				}
			}

		})

			//console.log(cartArray);
		var cartData=JSON.stringify(cartArray);
		localStorage.setItem('cart',cartData);

		showTable();
		cartNoti();
	})


	$('.checkoutBtn').click(function (){

		var Total = $('#shoppingcartTotal1').text();
		console.log(Total);
		if(Total > 5000)
		{

			var cart=localStorage.getItem('cart');
			var address=$('#address').val();
			var townshipid=$('#township').val();


			$.ajaxSetup({headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').
			attr('content')
			}
			});

			$.post('/order',{data:cart,address:address,townshipid:townshipid},function(response){
				localStorage.clear();
				location.href="ordersuccess";
			})

		}

		else{
			$('.checkoutBtn').hide();
			$('.orderagian').html('Your Order Amount is less than 5000 Kyats. <br/> <strong>Please, Order more </strong>');
		}

	})

	$('#restaurant_id').change(function(){
		var id = $('#restaurant_id option:selected').val();
		// console.log(id);
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
			}
		});

		$.post('/menucategory', {id:id}, function(response){
			var data = response;
			var catdata = '';
			$.each(data, function(i,v){
				var cid = v.category_id;
				var name = v.cname;
				// console.log(cid, name);
				catdata += `
					<option value="${cid}"> ${name} </option>
				`;
			})

			$('#choosecategory').html(catdata);
		})
	})

	$('#ItemSearch').change(function(){

		var sItem = $('#ItemSearch').val();
		console.log(sItem);

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
			}
		});

		$.post('/searchItem', {sItem:sItem}, function(response){
			var data=response;
			var catdata = '';
			// console.log(data);

			$.each(data, function(i,v){
				var name = v.name;
				var photo = v.logo;
				var routeURL="/"+"restaurantdetail/:id";

				routeURL=routeURL.replace(':id',v.id);
				console.log(routeURL);
				$('.ResMenu').hide();
				$('.AllMenu').hide();
		        $('.SearchMenu').show();

		        catdata += `

				    <section class="py-5 mb-5 bg-light col-12">
			          <div class="container">
			            <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
			              <div class="col-lg-6">
			                <h1 class="h2 text-uppercase mb-0"> Search <small>${sItem}</small> </h1>
			              </div>
			              <div class="col-lg-6 text-lg-right">
			                <nav aria-label="breadcrumb">
			                  <ol class="breadcrumb justify-content-lg-end mb-0 px-0">
			                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
			                    <li class="breadcrumb-item active" aria-current="page"> Search </li>
			                  </ol>
			                </nav>
			              </div>
			            </div>
			          </div>
			        </section>

		        	<div class="col-md-3 mb-4 mb-md-0">
				      <a class="category-item mb-4" href="${routeURL}">

				        <img class="img-fluid" src="/${photo}" alt="" style="width: 100%; height: 250px;">
				        <strong class="category-item-title">${name}</strong>
				      </a>
				    </div>
		        `;

			})

			$('.SearchMenu').html(catdata);


		})
	})

	$('.btnCategory').click(function(){

		var id = $(this).data('id');
		var rid = $(this).data('name');
		// console.log(id, rid);

		$.ajaxSetup({
			headers: {

				'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')

			}
		});

		$.post('/searchPost', {id:id, rid:rid}, function(response){


			var data=response;
			// console.log(data);
			var catdata = '';
			if(data.length<1){
				
				$('#AllMenu').hide();
		        $('#CategoryMenu').show();
				catdata += `<div class="col-lg-12">
				 There is no items. </div>`;
				$('#CategoryMenu').html(catdata);

			}

			else{

				$.each(data, function(i,v){

					$('.AllMenu').hide();
			        $('.CategoryMenu').show();
					var name = v.name;
					var price = v.price;
					var photos=JSON.parse(v.photo);
          			var photo=photos[2];
          			
          			var routeURL1= "/"+"idetail/:id";

          			var id = v.id;
          			var codeno = v.codeno;


					routeURL1=routeURL1.replace(':id',v.id);



					catdata += `
						<div class="col-lg-4 col-sm-6">
							<div class="product text-center">
			                  <div class="mb-3 position-relative">
			                    <div class="badge text-white badge-"></div><a class="d-block" href="detail.html">
			                    	<img class="img-fluid w-100" src="/${photo}" style="height:250px;"></a>
			                    <div class="product-overlay">
			                      <ul class="mb-0 list-inline">
			                        <li class="list-inline-item m-0 p-0">
			                          <a class="btn btn-sm btn-outline-dark" href="#">
			                            <i class="far fa-heart"></i>
			                          </a>
			                        </li>
			                        <li class="list-inline-item m-0 p-0">
			                          <a class="btn btn-sm btn-dark addtocartBtn" style="color:white;" 
			                          data-id="${id}" data-name="${name}" data-price="${price}" 
			                          data-photo="${photo}" data-codeno="${codeno}">Add to cart</a>
			                        </li>
			                        <li class="list-inline-item mr-0">
			                          <a class="btn btn-sm btn-outline-dark" href="${routeURL1}">
			                            <i class="fas fa-expand"></i>
			                          </a>
			                        </li>
			                      </ul>
			                    </div>
			                  </div>
			                  <h6> <a class="reset-anchor" href="detail.html"> ${name}</a></h6>
			                  <p class="small text-muted"> ${price} Kyats </p>
			                </div>
		                </div>
					`;

					$('.CategoryMenu').html(catdata);
				})
			}
		
		})

	})

	$('#detailhistory').hide();
	$('.detailback').hide();

	$('.detailback').click(function(){
		$('#orderhistory').show();
		$('#detailhistory').hide();
		$(this).hide();
	})

	$('.detailBtn').click(function(){
		$('#orderhistory').hide();
		$('#detailhistory').show();
		$('.detailback').show();

		var id = $(this).data('id');
		// console.log(id);

		$.ajaxSetup({
			headers: {

				'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')

			}
		});

		$.post('/detailhistory', {id:id}, function(response){

			var data=response;
			var catdata = '';
			
			var a = 1;
			$.each(data, function(i,v){
				
				var menu = v.menu_name;
				var qty = v.qty;
				var price = v.price;
				var subtotal = v.subtotal;
				catdata += `
				<tr>
	                <th scope="row"> ${a++} </th>
	                <td> ${menu}</td>
	                <td> ${price}</td>
	                <td> ${qty}</td>
	                <td> ${subtotal}</td>
                </tr>
				`;
				$('#menudetail').html(catdata);
			})
		})

	})

	$('#OrderCheck').click(function(){

		var sdate = $('#startdate').val();
		var edate = $('#enddate').val();
		console.log(sdate, edate);

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
			}
		});

		$.post('/ordercheck', {sdate:sdate, edate:edate}, function(response){
			var data=response;
			console.log(data);
			
			var catdata = '';
			$('#dataTable').hide();
			$('#OrderTable').show();
			if(data.length<1){


				
				
				catdata += `<td class="align-middle border-0" colspan="6">
					<h5 class="mb-0 text-center">
					There is no order.
					</h5>
					</td>`
				$('#Data').html(catdata);
			}
			else{

				$.each(data, function(i,v){
				var a =1;
				var orderdate = v.orderdate;
				var voucherno = v.voucherno;
				var deli_charges = v.deli_charges;
				var total = v.total;

				catdata += `<tr>
					<td class="align-middle border-0">
						
							${a++}
						
					</td>
					<td class="align-middle border-0">
						
							${orderdate}
						
					</td>
					<td class="align-middle border-0">
						
							${voucherno}
						
					</td>
					<td class="align-middle border-0">
						
							${deli_charges} Kyats
						
					</td>
					<td class="align-middle border-0">
						
							${total}
						
					</td>
				</tr>
					`;
				$('#Data').html(catdata);
			})
			}
		})

	});
	$('#OrderTable').hide();

	$('.CategoryMenu').on('click', '.addtocartBtn', function(){
		var id=$(this).data('id');
		var name=$(this).data('name');
		var codeno=$(this).data('codeno');
		var photo=$(this).data('photo');
		var price=$(this).data('price');
		var qty=1;

		var mylist={id:id,codeno:codeno,name:name,photo:photo,
			price:price,qty:qty};


		// console.log(mylist);
		var cart=localStorage.getItem('cart');
		var cartArray;

		if(cart==null){
			cartArray=Array();
		}
		else{
			cartArray=JSON.parse(cart);
		}

		var status=false;

		$.each(cartArray,function(i,v){
			if(id==v.id){
				v.qty++;
				status=true;
			}


		})
		if(!status){
			cartArray.push(mylist);
		}

		var cartData=JSON.stringify(cartArray);
		localStorage.setItem("cart",cartData);

		cartNoti();
		showTable();
	})

})