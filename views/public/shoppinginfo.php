<?php
  require_once '../../core/helpers/model_page.php';
  echo model_page::header();
 ?>
 <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">

        <table id="cart" class="table table-hover table-condensed">
          				<thead>
      						<tr>
      							<th style="width:50%">Producto</th>
      							<th style="width:10%">Precio</th>
      							<th style="width:8%">Cantidad</th>
      							<th style="width:22%" class="text-center">Subtotal</th>
      							<th style="width:10%"></th>
      						</tr>
      					</thead>
      					<tbody>
      						<tr>
      							<td data-th="Product">
      								<div class="row">
      									<div class="col-sm-2 hidden-xs"><img src="../../resources/img/noimage.png" alt="..." class="img-responsive"/></div>
      									<div class="col-sm-10">
      										<h4 class="nomargin">Product0 1</h4>
      										<p>Descripción del producto que se está comprando</p>
      									</div>
      								</div>
      							</td>
      							<td data-th="Price">$1.99</td>
      							<td data-th="Quantity">
      								<input type="number" class="form-control text-center" value="1">
      							</td>
      							<td data-th="Subtotal" class="text-center">1.99</td>
      							<td class="actions" data-th="">
      								<button class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button>
      								<button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
      							</td>
      						</tr>
      					</tbody>
      					<tfoot>
      						<tr class="visible-xs">
      							<td class="text-center"><strong>Total 1.99</strong></td>
      						</tr>
      						<tr>
      							<td><a href="#" class="btn btn-warning"><i class="fa fa-angle-left"></i> Seguir comprando</a></td>
      							<td colspan="2" class="hidden-xs"></td>
      							<td class="hidden-xs text-center"><strong>Total $1.99</strong></td>
      							<td><a href="#" class="btn btn-success btn-block">Has revisión <i class="fa fa-angle-right"></i></a></td>
      						</tr>
      					</tfoot>
      				</table>
              <table id="cart" class="table table-hover table-condensed">
                        <thead>
                        <tr>
                          <th style="width:50%">Producto</th>
                          <th style="width:10%">Precio</th>
                          <th style="width:8%">Cantidad</th>
                          <th style="width:22%" class="text-center">Subtotal</th>
                          <th style="width:10%"></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td data-th="Product">
                            <div class="row">
                              <div class="col-sm-2 hidden-xs"><img src="../../resources/img/noimage.png" alt="..." class="img-responsive"/></div>
                              <div class="col-sm-10">
                                <h4 class="nomargin">Product0 1</h4>
                                <p>Descripción del producto que se está comprando</p>
                              </div>
                            </div>
                          </td>
                          <td data-th="Price">$1.99</td>
                          <td data-th="Quantity">
                            <input type="number" class="form-control text-center" value="1">
                          </td>
                          <td data-th="Subtotal" class="text-center">1.99</td>
                          <td class="actions" data-th="">
                            <button class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button>
                            <button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
                          </td>
                        </tr>
                      </tbody>
                      <tfoot>
                        <tr class="visible-xs">
                          <td class="text-center"><strong>Total 1.99</strong></td>
                        </tr>
                        <tr>
                          <td><a href="#" class="btn btn-warning"><i class="fa fa-angle-left"></i> Seguir comprando</a></td>
                          <td colspan="2" class="hidden-xs"></td>
                          <td class="hidden-xs text-center"><strong>Total $1.99</strong></td>
                          <td><a href="#" class="btn btn-success btn-block">Has revisión <i class="fa fa-angle-right"></i></a></td>
                        </tr>
                      </tfoot>
                    </table><table id="cart" class="table table-hover table-condensed">
                      				<thead>
                  						<tr>
                  							<th style="width:50%">Producto</th>
                  							<th style="width:10%">Precio</th>
                  							<th style="width:8%">Cantidad</th>
                  							<th style="width:22%" class="text-center">Subtotal</th>
                  							<th style="width:10%"></th>
                  						</tr>
                  					</thead>
                  					<tbody>
                  						<tr>
                  							<td data-th="Product">
                  								<div class="row">
                  									<div class="col-sm-2 hidden-xs"><img src="../../resources/img/noimage.png" alt="..." class="img-responsive"/></div>
                  									<div class="col-sm-10">
                  										<h4 class="nomargin">Product0 1</h4>
                  										<p>Descripción del producto que se está comprando</p>
                  									</div>
                  								</div>
                  							</td>
                  							<td data-th="Price">$1.99</td>
                  							<td data-th="Quantity">
                  								<input type="number" class="form-control text-center" value="1">
                  							</td>
                  							<td data-th="Subtotal" class="text-center">1.99</td>
                  							<td class="actions" data-th="">
                  								<button class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button>
                  								<button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
                  							</td>
                  						</tr>
                  					</tbody>
                  					<tfoot>
                  						<tr class="visible-xs">
                  							<td class="text-center"><strong>Total 1.99</strong></td>
                  						</tr>
                  						<tr>
                  							<td><a href="#" class="btn btn-warning"><i class="fa fa-angle-left"></i> Seguir comprando</a></td>
                  							<td colspan="2" class="hidden-xs"></td>
                  							<td class="hidden-xs text-center"><strong>Total $1.99</strong></td>
                  							<td><a href="#" class="btn btn-success btn-block">Has revisión <i class="fa fa-angle-right"></i></a></td>
                  						</tr>
                  					</tfoot>
                  				</table>
                          <table id="cart" class="table table-hover table-condensed">
                                    <thead>
                                    <tr>
                                      <th style="width:50%">Producto</th>
                                      <th style="width:10%">Precio</th>
                                      <th style="width:8%">Cantidad</th>
                                      <th style="width:22%" class="text-center">Subtotal</th>
                                      <th style="width:10%"></th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td data-th="Product">
                                        <div class="row">
                                          <div class="col-sm-2 hidden-xs"><img src="../../resources/img/noimage.png" alt="..." class="img-responsive"/></div>
                                          <div class="col-sm-10">
                                            <h4 class="nomargin">Product0 1</h4>
                                            <p>Descripción del producto que se está comprando</p>
                                          </div>
                                        </div>
                                      </td>
                                      <td data-th="Price">$1.99</td>
                                      <td data-th="Quantity">
                                        <input type="number" class="form-control text-center" value="1">
                                      </td>
                                      <td data-th="Subtotal" class="text-center">1.99</td>
                                      <td class="actions" data-th="">
                                        <button class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button>
                                        <button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
                                      </td>
                                    </tr>
                                  </tbody>
                                  <tfoot>
                                    <tr class="visible-xs">
                                      <td class="text-center"><strong>Total 1.99</strong></td>
                                    </tr>
                                    <tr>
                                      <td><a href="#" class="btn btn-warning"><i class="fa fa-angle-left"></i> Seguir comprando</a></td>
                                      <td colspan="2" class="hidden-xs"></td>
                                      <td class="hidden-xs text-center"><strong>Total $1.99</strong></td>
                                      <td><a href="#" class="btn btn-success btn-block">Has revisión <i class="fa fa-angle-right"></i></a></td>
                                    </tr>
                                  </tfoot>
                                </table>
                                <table id="cart" class="table table-hover table-condensed">
                                          <thead>
                                          <tr>
                                            <th style="width:50%">Producto</th>
                                            <th style="width:10%">Precio</th>
                                            <th style="width:8%">Cantidad</th>
                                            <th style="width:22%" class="text-center">Subtotal</th>
                                            <th style="width:10%"></th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <tr>
                                            <td data-th="Product">
                                              <div class="row">
                                                <div class="col-sm-2 hidden-xs"><img src="../../resources/img/noimage.png" alt="..." class="img-responsive"/></div>
                                                <div class="col-sm-10">
                                                  <h4 class="nomargin">Product0 1</h4>
                                                  <p>Descripción del producto que se está comprando</p>
                                                </div>
                                              </div>
                                            </td>
                                            <td data-th="Price">$1.99</td>
                                            <td data-th="Quantity">
                                              <input type="number" class="form-control text-center" value="1">
                                            </td>
                                            <td data-th="Subtotal" class="text-center">1.99</td>
                                            <td class="actions" data-th="">
                                              <button class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button>
                                              <button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
                                            </td>
                                          </tr>
                                        </tbody>
                                        <tfoot>
                                          <tr class="visible-xs">
                                            <td class="text-center"><strong>Total 1.99</strong></td>
                                          </tr>
                                          <tr>
                                            <td><a href="#" class="btn btn-warning"><i class="fa fa-angle-left"></i> Seguir comprando</a></td>
                                            <td colspan="2" class="hidden-xs"></td>
                                            <td class="hidden-xs text-center"><strong>Total $1.99</strong></td>
                                            <td><a href="#" class="btn btn-success btn-block">Has revisión <i class="fa fa-angle-right"></i></a></td>
                                          </tr>
                                        </tfoot>
                                      </table>



</div>
<?php
  echo model_page::footer();
 ?>
