<?php include ('include/connection.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Purchase Order</title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container" style="margin-top: 100px;">
	<div class="row">
		<div class="col-md-10">
			<div class="card" style="box-shadow: 0 0 15px 0 lightgrey;">
				<div class="card-header">
					<h4>New order</h4>
				</div>
				<div class="card-body">
					<form>
						<div class="form-group row">
							<label class="col-sm-3" align="right">Order Date</label>
							<div class="col-sm-6">
								 <input type="text" readonly class="form-control form-control-sm" value="<?php echo date("y-d-m"); ?>">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-3" align="right">Supplier Name</label>
							<div class="col-sm-6">
								 <select class="form-control" name="supplier_name">
										<?php
											$sql = "SELECT * FROM supplier";
												$result = mysqli_query($con,$sql);
												while ($row = mysqli_fetch_array($result)) {
												$supplier = $row['supplier_name'];
												echo '<option value="'.$supplier.'">'.$supplier.'</option>';
											}
										?>
								</select>
							</div>
						</div>
						<div class="card" style="box-shadow: 0 0 15px 0 lightgrey;">
							<div class="card-body">
								<h3>Make a Order list</h3>
								<table style="width: 800px;" align="center">
									<thead>
										<tr>
											<th>#</th>
											<th>Drug</th>
											<th>Unit price</th>
											<th>Quantity</th>
											<th>Total</th>
										</tr>
									</thead>
									<tbody>
										
									</tbody>
								</table>
									<center style="padding: 10px;">
										<button class="btn btn-success" name="add" id="add" style="width: 100px">Add</button>
										<button class="btn btn-danger" name="remove" id="remove" style="width: 100px">Remove</button>
									</center>
							</div>
						</div>

						<p></p>
	                    <div class="form-group row">
	                      <label for="sub_total" class="col-sm-3 col-form-label" align="right">Sub Total</label>
	                      <div class="col-sm-6">
	                        <input type="text" readonly name="sub_total" class="form-control form-control-sm" id="sub_total" required/>
	                      </div>
	                    </div>
	                    </div>
	                    <div class="form-group row">
	                      <label for="paid" class="col-sm-3 col-form-label" align="right">Paid</label>
	                      <div class="col-sm-6">
	                        <input type="text" name="paid" class="form-control form-control-sm" id="paid" required>
	                      </div>
	                    </div>
	                    <div class="form-group row">
	                      <label for="due" class="col-sm-3 col-form-label" align="right">Due</label>
	                      <div class="col-sm-6">
	                        <input type="text" readonly name="due" class="form-control form-control-sm" id="due" required/>
	                      </div>
	                    </div>
	                    <center>
	                      <input type="submit" id="order_form" style="width:150px;" class="btn btn-info" value="Order">
	                      <input type="submit" id="print_invoice" style="width:150px;" class="btn btn-success d-none" value="Print Invoice">
	                    </center>
	                   </form>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>