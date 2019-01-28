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
												echo '<button type="button"><img class="img_like" src="view/images/like02.svg" alt=""/></button>';
											echo '</div>';
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

		<!-- Two -->
			<section id="two" class="wrapper style3">
				<div class="inner">
					<header class="align-center">
						<h2 data-tr="Algunos de los proyectos:"></h2>
					</header>
				</div>
			</section>

		<!-- Three -->
			<section id="three" class="wrapper style2">
				<div class="inner">
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
