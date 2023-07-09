<?php
	/**
	* Template Name: Detail Portfolio
	*
	* @package WordPress
	* @subpackage AyushShrestha
	* @since Ayush Shrestha 1.0
	*/

	get_header();
	?>	
		<main id="primary" class="site-main">
			<div class="container-fluid">
                <div class="text-center">
                    <h4>Uptrendly</h4>
                    <div class="py-4"><img src="<?php echo get_template_directory_uri();?>/assets/images/portfolio/thumb/portfolio-uptrendly-thumb.jpg" class="img-fluid" /></div>
                </div>

                <div class="container-md py-5 text-muted">
                    <h5 class="mb-3">Case Study</h6>
                    <p>Uptrendly connect to the right influencers on social media to market their products to a huge number of audience, digitally.</p>
                    <p>Its programmes provide in-depth analyses about the issues of the day and reflect the people’s voice. Its shows explore the multidimensional impacts of important events, by framing them in formats that range from news bulletins, interviews and features to satires, comedies, and social drama. Kantipur TV HD captures the many colors our lives are imbued with.</p>
                    <div class="row my-5">
                        <div class="col-6 my-2">
                            <h5>Year</h5>
                            <span class="badge bg-secondary me-1">2018</span>
                        </div>
                        <div class="col-6 my-2">
                            <h5>Skill & Tools</h5>
                            <span class="badge bg-secondary me-1">HTML</span>
                            <span class="badge bg-secondary me-1">CSS</span>
                            <span class="badge bg-secondary me-1">JS</span>
                            <span class="badge bg-secondary me-1">Visual Studio Code</span>
                            <span class="badge bg-secondary me-1">Adobe XD</span>
                            <span class="badge bg-secondary me-1">GIT</span>
                        </div>
                        <div class="col-12 mt-4">
                            <h5>Execution</h5>
                            <ul>
                                <li>Develop new user-facing features</li>
                                <li>Build reusable code and libraries for future use</li>
                                <li>Ensure the technical feasibility of UI/UX designs</li>
                                <li>Optimize application for maximum speed and scalability</li>
                                <li>Assure that all user input is validated before submitting to back-end</li>
                                <li>Collaborate with other team members and stakeholders</li>
                                <li>Actively Seek New Programming Knowledge</li>
                                <li>Build Products Using HTML/CSS/JS and Other Front-End Technologies</li>
                                <li>Code and Deploy Applications in a Cross-Platform, Cross-Browser Environment</li>
                                <li>Document Project Build and Maintenance</li>
                                <li>Experience Building User Interfaces and Prototypes from Wireframes and Designs</li>
                                <li>Familiar with Development and Debugging Tools for Cross-Browser Issues</li>
                                <li>Follow and Implement Industry Accepted Best Practices and Tools</li>
                                <li>Solid Understanding of Object-Oriented Programming (OOP)</li>
                                <li>Update Current Websites to Meet Modern Web Standards</li>
                                <li>Write and Maintain Web Applications</li>
                            </ul>
                        </div>	
                        <div class="col-12 mt-4">
                            <h5>Challenge & Complications</h5>
                            <ul>
                                <li>Change of deadline time before to after from client</li>
                                <li>Mobile menu needs to similar as an app</li>
                                <li>DataTable and tab using both on responsive</li>
                                <li>Home Page oval shape on responsive</li>
                                <li>Home Page background gradient graphic for responsive</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="p-3 justify-content-between align-items-center d-flex shadow-md bg-white position-sticky bottom-0" >
                    <button type="button" class="btn btn-gray" data-bs-toggle="tooltip" data-bs-placement="right" title="KMG"><i class="ri-arrow-left-s-line"></i></button>
                    <h4>Uptrendly</h4>
                    <button type="button" class="btn btn-gray" data-bs-toggle="tooltip" data-bs-placement="left" title="MyKronoz"><i class="ri-arrow-right-s-line"></i></button>
                </div>
			</div>
		</main><!-- #main -->
	<?php
	get_sidebar();
	get_footer();