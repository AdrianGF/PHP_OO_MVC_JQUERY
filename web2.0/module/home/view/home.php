		<!-- One -->
			<section id="one" class="wrapper style2">
				<div class="inner">
					<div class="grid-style">

					<?php
                        if ($rdo->num_rows === 0){
                            echo '<tr>';
                            echo '<td align="center"  colspan="3">NO HAY NINGUN USUARIO</td>';
                            echo '</tr>';
                        }else{
                            foreach ($rdo as $row) {
								echo '<div>';
									echo '<div class="box">';
										echo '<div class="image fit">';
											echo '<img src="view/images/pic02.jpg" alt="" />';
										echo '</div>';
										echo '<div class="content">';
											echo '<header class="algin-center">';
											echo '<h2>'. $row['ProName'] . '</h2>';

												echo '<div class="progressPro">';
													echo '<h1>0/'. $row['ProPrice'] . $row['Curr'] . '</h1>';

													echo '<div class="price-prog">';
														echo '<div class="progress">';
															echo '<div class="progress-bar bg-info" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>';
														echo '</div>';
													echo '</div>';
												echo '</div>';

											echo '</header>';
											echo '<p>'. $row['ProDesc'] . '</p>';
											echo '<footer class="algin-center">';
												echo '<a href="#" class="button alt">Learn More</a>';
												echo '<p>Created by:  ' . $row['Mail'] . '</p>';
											echo '</footer>';
											
										echo '</div>';
                                	echo '</div>';
                                echo '</div>';
                                
                            }
                        }
					?>

					</div>
				</div>
			</section>
<!-- 

<div class="progress">
  <div class="progress-bar bg-warning" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
</div>

						<div>
							<div class="box">
								<div class="image fit">
									<img src="view/images/pic03.jpg" alt="" />
								</div>
								<div class="content">
									<header class="align-center">
										<p>mattis elementum sapien pretium tellus</p>
										<h2>Vestibulum sit amet</h2>
									</header>
									<p> Cras aliquet urna ut sapien tincidunt, quis malesuada elit facilisis. Vestibulum sit amet tortor velit. Nam elementum nibh a libero pharetra elementum. Maecenas feugiat ex purus, quis volutpat lacus placerat malesuada.</p>
									<footer class="align-center">
										<a href="#" class="button alt">Learn More</a>
									</footer>
								</div>
							</div>
						</div> -->

		<!-- Two -->
			<section id="two" class="wrapper style3">
				<div class="inner">
					<header class="align-center">
						<p>Nam vel ante sit amet libero scelerisque facilisis eleifend vitae urna</p>
						<h2>Morbi maximus justo</h2>
					</header>
				</div>
			</section>

		<!-- Three -->
			<section id="three" class="wrapper style2">
				<div class="inner">
					<header class="align-center">
						<p class="special">Nam vel ante sit amet libero scelerisque facilisis eleifend vitae urna</p>
						<h2>Morbi maximus justo</h2>
					</header>
					<div class="gallery">
						<div>
							<div class="image fit">
								<a href="#"><img src="view/images/pic01.jpg" alt="" /></a>
							</div>
						</div>
						<div>
							<div class="image fit">
								<a href="#"><img src="view/images/pic02.jpg" alt="" /></a>
							</div>
						</div>
						<div>
							<div class="image fit">
								<a href="#"><img src="view/images/pic03.jpg" alt="" /></a>
							</div>
						</div>
						<div>
							<div class="image fit">
								<a href="#"><img src="view/images/pic04.jpg" alt="" /></a>
							</div>
						</div>
						<div>
							<div class="image fit">
								<a href="#"><img src="view/images/pic01.jpg" alt="" /></a>
							</div>
						</div>
						<div>
							<div class="image fit">
								<a href="#"><img src="view/images/pic01.jpg" alt="" /></a>
							</div>
						</div>
						<div>
							<div class="image fit">
								<a href="#"><img src="view/images/pic01.jpg" alt="" /></a>
							</div>
						</div>
						<div>
							<div class="image fit">
								<a href="#"><img src="view/images/pic01.jpg" alt="" /></a>
							</div>
						</div>
					</div>
				</div>
			</section>
