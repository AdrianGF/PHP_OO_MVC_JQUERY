			<section id="one_dd" class="wrapper style2">
				<div class="inner">
					<div class="grid-style">

						<div id="containerDDAA">
							<div class="bar">
								<div class="drop1">
									<select id="dd_type">
										<option value="0">Type</option>
									</select>
								</div>
								<div class="drop2">
									<select id="dd_city">
										<option value="0">City</option>
									</select>
								</div>
								<div class="auto">
									<input  type="text" size="50" id="aa_name" name="aa_name" />
									<div id="suggestions"></div>
								</div>
								<div class="button_dd">
										<button class="btn_dd" type="button">Busca</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		

		<!-- One -->
			<section id="one" class="wrapper style2">
				<div class="inner">
					<div class="grid-style">

					<?php
                        if ($rdo->num_rows === 0){
                            echo '<tr>';
                            echo '<td align="center"  colspan="3">EMPTY</td>';
                            echo '</tr>';
                        }else{
                            foreach ($rdo as $row) {
								echo '<div>';
									echo '<div class="box">';
										echo '<div class="image fit">';
											echo '<img src="view/images/bg.jpg" alt="" />';
											echo '<div class="like_bttn">';
												echo '<button class="Like" type="button"><img class="img_like" src="view/images/like02.svg" alt=""/></button>';
											echo '</div>';
										echo '</div>';
										echo '<div class="content">';
											echo '<header class="algin-center">';
											echo '<h2>'. $row['ProName'] . '</h2>';

												echo '<div class="progressPro">';
													echo '<h1>' . $row['ProDonate'] . '/'. $row['ProPrice'] . $row['Curr'] . '</h1>';

													echo '<div class="price-prog">';
														echo '<div class="progress">';
															echo '<div class="progress-bar bg-info" role="progressbar" style="width:' . $row['Percent'] .'%" aria-valuenow='. $row['ProDonate'] .' aria-valuemin="0" aria-valuemax='. $row['ProPrice'] .'>' . $row['Percent'] .'%</div>';
														echo '</div>';
													echo '</div>';
												echo '</div>';

											echo '</header>';
											echo '<p>'. $row['ProDesc'] . '</p>';
											echo '<footer class="algin-center">';
												echo '<a id='. $row['idproject'] .'  class="donate_cart"><i class="fas fa-money-bill-wave"></i> Donate <i class="fas fa-money-bill-wave"></i></a>';
												echo '<p>Created by:  ' . $row['Mail'] . '</p>';
											echo '</footer>';
											
										echo '</div>';
                                	echo '</div>';
                                echo '</div>';
                                
                            }
                        }
					?>


  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

        <div class="modal-header">

          <h5 class="modal-title" id="exampleModalLabel"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>

        </div>

        <div class="modal-body">
          <div id="modal_products"></div>
        </div>
        
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary addmodal" onclick="addToCart()" data-dismiss="modal">Añadir al carrito</button>
        </div>

      </div>
    </div>
  </div>

  <div class="provamodal"></div>

					</div>
				</div>
			</section>

		<!-- Two -->
			<section id="two" class="wrapper style3">
				<div class="inner">
					<header class="align-center">
						<h2 data-tr="API - PROJECTS"></h2>
					</header>
				</div>

			</section>


		<!-- Three -->
			<section id="three" class="wrapper style2">
				<div class="inner">
					<div class="container_api">
						<div class="api_home_menu">
								<div class="api_class">
									<div class="image fit">
										<a id="api1" name="Open ended" value="Open ended" class="api_test"><img src="view/images/api05.png" alt="" /></a>
									</div>
								</div>
								<div class="api_class">
									<div class="image fit">
										<a id="api2" name="Take what you raise" value="Take what you raise" class="api_test"><img src="view/images/api04.png" alt="" /></a>
									</div>
								</div>
								<div class="api_class">
									<div class="image fit">
										<a id="api3" name="All or nothing" value="All or nothing" class="api_test"><img src="view/images/api06.png" alt="" /></a>
									</div>
								</div>
							<!--<input id="api1" name="Open ended" type="button" value="Open ended" class="api_test" />
							<input id="api2" name="Take what you raise" type="button" value="Take what you raise" class="api_test" />
							<input id="api3" name="All or nothing" type="button" value="All or nothing" class="api_test" />	-->
						</div>
					</div>
				</div>
			</div>

			</section>
