<?php
						$url = home_url();
						$global_data_file = $url . '/corona-manual-total.json';
						$nepal_data_file = $url . '/nepal-corona.json';
						if(file_exists($global_data_file) && file_exists($nepal_data_file)){
							$global_data = json_decode(file_get_contents($global_data_file));
							$nepal_districts = json_decode(file_get_contents($nepal_data_file),true);
							$nepal_confirmed = 0;
							$nepal_deaths = 0;
							$nepal_recovered = 0;
							foreach($nepal_districts as $district){
								$nepal_confirmed += $district['total'];
								$nepal_deaths += $district['deaths'];
								$nepal_recovered += $district['recovered'];
							}
							
							$nepal_total_file = $url . 'corona-nepal-total.json';
							if(file_exists($nepal_total_file)){
								$nepal_total = json_decode(file_get_contents($nepal_total_file));
								$nepal_confirmed = $nepal_total->confirmed;
								$nepal_deaths = $nepal_total->deaths;
								$nepal_recovered = $nepal_total->recovered;
							}
					?>
					<div class="col-sm-6">
						<h4>CORONAVIRUS CASES ( COVID-19 )</h4>
					</div>
					<div class="col-md-6 text-right font-sm text-secondary pb-1">
						Source: Johns Hopkins University, WHO and health authorities
					</div>
					<div class="col-sm-6 mb-3 mb-md-5 bg-light py-3">
						<h5><img src="<?php bloginfo('template_directory'); ?>/assets/images/nepal.svg" width="16" alt="<?php the_title(); ?>" /> Nepal</h5>		
						<div class="row">
							<div class="col-sm-4 text-info">
								Total Cases
								<h3><?php echo __convertToNepaliNumber($nepal_confirmed);?></h3>
							</div>
							<div class="col-sm-4 text-success">
								Total Recovered
								<h3><?php echo __convertToNepaliNumber($nepal_recovered);?></h3>
							</div>
							<div class="col-sm-4 text-danger ">
								Total Death
								<h3><?php echo __convertToNepaliNumber($nepal_deaths);?></h3>
							</div>
						</div>
					</div> <!-- col sm 6 ends -->
					<div class="col-sm-6 mb-3 mb-md-5 bg-light py-3">
						<h5><img src="<?php bloginfo('template_directory'); ?>/assets/images/worldwide.svg" width="16" alt="<?php the_title(); ?>" /> WorldWide</h5>	
						<div class="row">
							<div class="col-sm-4 text-info">
								Total Cases
								<h3><?php echo __convertToNepaliNumber($global_data->confirmed);?></h3>
							</div>
							<div class="col-sm-4 text-success">
								Total Recovered
								<h3><?php echo __convertToNepaliNumber($global_data->recovered);?></h3>
							</div>
							<div class="col-sm-4 text-danger">
								Total Death
								<h3><?php echo __convertToNepaliNumber($global_data->deaths);?></h3>
							</div>
						</div>
					</div> <!-- col sm 6 ends -->