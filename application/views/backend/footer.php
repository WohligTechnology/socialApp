</div>
            <nav id="mainnav-container">
				<div id="mainnav">


					<!--Menu-->
					<!--================================-->
					<div id="mainnav-menu-wrap">
						<div class="nano">
							<div class="nano-content">
							<?php   $menus = $this->menu_model->viewmenus(); 	  ?>
								<ul id="mainnav-menu" class="list-group">
						<?php  
				foreach($menus as $row)
				{  
					$pieces = explode("/", $row->url);
					$page2="";
					if(empty($pieces) || !isset($pieces[1]))
					{
						$page2="";
					}
					else
						$page2=$pieces[1];
					$submenus = $this->menu_model->getsubmenus($row->id);
					?>
                                <li class="<?php if($page==$page2 || $page == strtolower($row->name)) { echo 'active'; } //echo $page2;
					if(count($submenus > 0)) 
					{ 
						$pages =  $this->menu_model->getpages($row->id);
						//echo $page2; 
						//print_r($pages);
						echo ' sub-menu'; 
						if(in_array($page, $pages,TRUE))
							echo ' active';
					}
					?> ">
						<a class="" href="<?php 
						if($row->url == "")
							echo "javascript:;";
						else if($row->linktype == 1) echo site_url($row->url);
						else if($row->linktype == 2) echo base_url($row->url);
						else if($row->linktype == 3) echo ($row->url);						
						?>" <?php if($row->linktype == 3) echo "target='_blank'"; ?>>
							<?php  
							if($row->icon != "")
							{  ?>
								<i class="<?php echo $row->icon; ?>"></i>
					<?php	}
							?>
							<span><?php echo $row->name;  ?></span>
							<span class="arrow"></span>
						</a>
						<?php
						if(count($submenus) > 0)
						{  ?>
							<ul class="sub">
								<?php
								foreach($submenus as $row2)
								{ 
									$pieces2 = explode("/", $row2->url);
					
									if(empty($pieces2) || !isset($pieces2[1]))
									{
										$page3="";
									}
									else
										$page3=$pieces2[1];
								?>
									<li class="<?php if($page==$page3 || $page == strtolower($row2->name)) { echo 'active'; } ?>">
										<a href="<?php 
											if($row2->url == "")
												echo "javascript:;";
											else if($row2->linktype == 1) echo site_url($row2->url);
											else if($row2->linktype == 2) echo base_url($row2->url);
											else if($row2->linktype == 3) echo ($row2->url);		
										?>">
											<?php  
											if($row2->icon != "")
											{  ?>
												<i class="<?php echo $row2->icon; ?>" <?php if($row2->linktype == 3) echo "target='_blank'"; ?>></i>
									<?php	}
											?>
											<?php echo $row2->name;  ?>
										</a>
									</li>
						<?php	}
								?>
							</ul>
				<?php	}
						?>
					</li>
		  <?php }
				?>
									
									
								</ul>


								<!--Widget-->
								<!--================================-->
								
								<!--================================-->
								<!--End widget-->

							</div>
						</div>
					</div>
					<!--================================-->
					<!--End menu-->

				</div>
			</nav>
			<!--===================================================-->
			<!--END MAIN NAVIGATION-->
			
			
		</div>

	


		<!-- SCROLL TOP BUTTON -->
		<!--===================================================-->
		<button id="scroll-top" class="btn"><i class="fa fa-chevron-up"></i></button>
		<!--===================================================-->



	</div>
	<!--===================================================-->
	<!-- END OF CONTAINER -->


	
	<!--JAVASCRIPT-->
	<!--=================================================-->

	<!--BootstrapJS [ RECOMMENDED ]-->
<!--	<script src="js/bootstrap.min.js"></script>-->
<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>" type="text/javascript"></script>


	
	<!--Nifty Admin [ RECOMMENDED ]-->
<!--	<script src="js/nifty.min.js"></script>-->
	<script src="<?php echo base_url('assets/js/nifty.min.js'); ?>"></script>





	<!--Bootstrap Select [ OPTIONAL ]-->
<!--	<script src="plugins/bootstrap-select/bootstrap-select.min.js"></script>-->
	<script src="<?php echo base_url('assets/plugins/bootstrap-select/bootstrap-select.min.js'); ?>"></script>




</body></html>