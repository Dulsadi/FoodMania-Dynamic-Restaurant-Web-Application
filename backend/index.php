<?php
	/*
	 * Backend
	 */

	// Pre requeisits
	include('db_connection.php');
	include('functions.php');

	// Check if user is logged in
	session_start();
	if (isset($_SESSION['user'])) {
		// Access user details
		$currentUser = $_SESSION['user'];
	
		// Access specific user details
		$userId = $currentUser['Id'];
		$userName = $currentUser['Name'];
		$userRole = $currentUser['Role'];
		$userImage = $currentUser['Image'];
	
	} else {
		// Redirect to login page if user is not logged in
		header("Location: login_register.php");
		exit();
	}

	// Directory path
	$site = getSiteUrl();

	// Fetch tables
	$sql1 = "SELECT * FROM menu";
	$sql2 = "SELECT * FROM chefs";
	$sql3 = "SELECT * FROM events";
	$sql4 = "SELECT * FROM specials";
	$sql5 = "SELECT * FROM testimonials";
	$sql6 = "SELECT * FROM contact";
	$sql7 = "SELECT * FROM home";
	$sql8 = "SELECT * FROM whyus";
	$sql9 = "SELECT * FROM gallery";
	$sql10 = "SELECT * FROM emails";
	$sql11 = "SELECT * FROM bookings";
	$sql12 = "SELECT * FROM subscribers";

	$result1 = $conn->query($sql1);
	$result2 = $conn->query($sql2);
	$result3 = $conn->query($sql3);
	$result4 = $conn->query($sql4);
	$result5 = $conn->query($sql5);
	$result6 = $conn->query($sql6);
	$result7 = $conn->query($sql7);
	$result8 = $conn->query($sql8);
	$result9 = $conn->query($sql9);
	$result10 = $conn->query($sql10);
	$result11 = $conn->query($sql11);
	$result12 = $conn->query($sql12);

	$menuItems = $result1->fetch_all(MYSQLI_ASSOC);
	$chefItems = $result2->fetch_all(MYSQLI_ASSOC);
	$eventItems = $result3->fetch_all(MYSQLI_ASSOC);
	$spItems = $result4->fetch_all(MYSQLI_ASSOC);
	$tesItems = $result5->fetch_all(MYSQLI_ASSOC);
	$conItems = $result6->fetch_all(MYSQLI_ASSOC);
	$mainItems = $result7->fetch_all(MYSQLI_ASSOC);
	$whyItems = $result8->fetch_all(MYSQLI_ASSOC);
	$imgItems = $result9->fetch_all(MYSQLI_ASSOC);
	$mailItems = $result10->fetch_all(MYSQLI_ASSOC);
	$bookItems = $result11->fetch_all(MYSQLI_ASSOC);
	$subItems = $result12->fetch_all(MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>FoodMania Backend</title>

    <?php include('header.php'); ?>

<body>

	<!-- NAVIGATION -->
	<div class="navbar">
		<div class="row">
			<div class="column column-30 col-site-title"><a href="#" class="site-title float-left">FOODMANIA</a></div>
			<div class="column column-40 col-search"><a href="#" class="search-btn fa fa-search"></a>
				<input id="searchInput" type="text" name="search" value="" placeholder="Search..." />
			</div>
			<div class="column column-30">
				<div class="user-section"><a href="#">
					<img src="<?php echo $userImage; ?>" alt="profile photo" class="circle float-left profile-photo" width="50" height="auto">
					<div class="username">
						<h4><?php echo $userName; ?></h4>
						<p><?php echo $userRole; ?></p>
					</div>
				</a></div>
			</div>
		</div>
	</div>

	<div class="row">

		<!-- SIDEBAR -->
		<div id="sidebar" class="column">
			<?php if ($userRole != "Staff Member") { // No access to 'Staff Members'?> 
				<h5>Restaurant</h5>
				<ul>
					<li><a href="#main"><em class="fa fa-home"></em> Main</a></li>
					<li><a href="#gallery"><i class="fa fa-image"></i> Gallery</a></li>
					<li><a href="#testimonials"><em class="fa fa-comments"></em> Testimonials</a></li>
					<li><a href="#menu"><em class="fa fa-calendar"></em> Menu</a></li>
					<li><a href="#events"><i class="fa fa-beer"></i> Events</a></li>
					<li><a href="#specials"><em class="fa fa-star"></em> Specials</a></li>
					<li><a href="#chefs"><em class="fa fa-cutlery"></em> Chefs</a></li>
					<li><a href="#whyus"><em class="fa fa-question-circle"></em> WhyUs</a></li>
				</ul>
			<?php } ?>
			<?php if ($userRole != "Designer") { // No access to 'Designers'?>
				<h5>Customers</h5>
				<ul>
					<li><a href="#books"><em class="fa fa-book"></em> Bookings</a></li>
					<li><a href="#emails"><em class="fa fa-envelope"></em> Emails</a></li>
					<li><a href="#subs"><em class="fa fa-users"></em> Subscribers</a></li>
				</ul>
			<?php } ?>
		</div>

		<section id="main-content" class="column column-offset-20">
			
			<?php if ($userRole != "Staff Member") { // No access to 'Staff Members'?> 

				<!-- MAIN Section -->
				<a class="anchor" name="main"></a>
				<div class="row grid-responsive home">
					<div class="column">
						<div class="card">
							<div class="card-title">
								<h3>Main</h3>
							</div>
							<div class="card-block">
								<div class="main-items">
									<?php
									// Fetching the main items from the database
									if (!empty($mainItems)) {
										$mainItem = $mainItems[0];
									?>

										<!-- Main Backgrounds Images -->
										<div class="card-title">
											<h3>Backgrounds</h3>
										</div>
										<div class="gallery card-block">
											<div class="gallery-items">
												<div class="gallery-card" id="imageUrlInput1">
													<label>Hero:</label>
													<img src="<?php echo $site . "/" . $mainItem['Hero_Background']; ?>" alt="Gallery Image">
													<input type="file" id="fileInput1" style="display: none;" accept="image/*" data-field-name="Hero_Background" data-item-id="<?php echo $mainItem['Id']; ?>">
													<div class="gallery-actions">
														<button class="button-outline" id="uploadImage1">
															<i class="fa fa-cloud-upload fa-lg"></i>
														</button>
													</div>
												</div>
												<div class="gallery-card" id="imageUrlInput2">
													<label>About:</label>
													<img src="<?php echo $site . "/" . $mainItem['About_Background']; ?>" alt="Gallery Image">
													<input type="file" id="fileInput2" style="display: none;" accept="image/*" data-field-name="About_Background" data-item-id="<?php echo $mainItem['Id']; ?>">
													<div class="gallery-actions">
														<button class="button-outline" id="uploadImage2">
															<i class="fa fa-cloud-upload fa-lg"></i>
														</button>
													</div>
												</div>
												<div class="gallery-card" id="imageUrlInput3">
													<label>Events:</label>
													<img src="<?php echo $site . "/" . $mainItem['Events_Background']; ?>" alt="Gallery Image">
													<input type="file" id="fileInput3" style="display: none;" accept="image/*" data-field-name="Events_Background" data-item-id="<?php echo $mainItem['Id']; ?>">
													<div class="gallery-actions">
														<button class="button-outline" id="uploadImage3">
															<i class="fa fa-cloud-upload fa-lg"></i>
														</button>
													</div>
												</div>
											</div>
										</div>

										<!-- Main Descriptions For HERO & ABOUT Sections -->
										<div class="card-title">
											<h3>Descriptions</h3>
										</div>
										<div class="card-block">

											<!-- Accordion for Hero Section -->
											<div class="accordion">
												<button class="accordion-btn">Hero Section</button>
												<div class="accordion-content">
													<form class="main-form">
														<!-- Input for Hero Video -->
														<label>Hero Video (Link):</label>
														<input type="text" name="heroVideo" value="<?php echo $mainItem['Hero_Video']; ?>" placeholder="Video URL">

														<!-- Textarea for Hero Description -->
														<label>Hero Description:</label>
														<textarea name="heroDesc" placeholder="Hero Description"><?php echo $mainItem['Hero_Desc']; ?></textarea>

														<!-- Update Button -->
														<div>
															<button type="button" class="updateBtn button-outline" data-item-id="<?php echo $mainItem['Id']; ?>"><i class='fa fa-edit fa-lg'></i></button>
														</div>
													</form>
												</div>
											</div>

											<!-- Accordion for About Section -->
											<div class="accordion">
												<button class="accordion-btn">About Section</button>
												<div class="accordion-content">
												<form class="main-form">
														<!-- Textarea for About Top Description -->
														<label>Top Description:</label>
														<textarea name="aboutTopDesc" placeholder="About Top Desc"><?php echo $mainItem['About_Top_Desc']; ?></textarea>

														<!-- Textarea for About Points -->
														<label>Points:</label>
														<textarea name="aboutPoints" placeholder="About Points"><?php echo $mainItem['About_Points']; ?></textarea>

														<!-- Image Upload for About Image -->
														<label>Zoom Image:</label>
														<div class="gallery-card" id="imageUrlInput4">
															<img src="<?php echo $site . "/" . $mainItem['About_Image']; ?>" alt="About Image">
															<input type="file" id="fileInput4" style="display: none;" accept="image/*" data-field-name="About_Image" data-item-id="<?php echo $mainItem['Id']; ?>">
															<div class="gallery-actions">
																<button type="button" class="button-outline" id="uploadImage4">
																	<i class="fa fa-cloud-upload fa-lg"></i>
																</button>
															</div>
														</div>

														<!-- Textarea for About Bottom Description -->
														<label>Bottom Description:</label>
														<textarea name="aboutBottomDesc" placeholder="About Bottom Desc"><?php echo $mainItem['About_Bottom_Desc']; ?></textarea>

														<!-- Update Button -->
														<div>
															<button type="button" class="updateBtn button-outline" data-item-id="<?php echo $mainItem['Id']; ?>"><i class='fa fa-edit fa-lg'></i></button>
														</div>
													</form>
												</div>
											</div>

											<?php
											// Fetching the main items from the database
											if (!empty($conItems)) {
												$conItem = $conItems[0];
											?>

											<div class="set grid-responsive contact">
												<!-- Accordion for Contacts Section -->
												<div class="accordion">
													<button class="accordion-btn">Contact Section</button>
													<div class="accordion-content">
														<form class="main-form">

															<!-- Textarea for Address -->
															<label>Address:</label>
															<textarea name="contactAddress" placeholder="Contact Address"><?php echo $conItem['Address']; ?></textarea>

															<!-- Input for Email -->
															<label>Email:</label>
															<input type="email" name="contactEmail" value="<?php echo $conItem['Email']; ?>" placeholder="Contact Email">

															<!-- Input for Phone -->
															<label>Phone:</label>
															<input type="tel" name="contactPhone" value="<?php echo $conItem['Phone']; ?>" placeholder="Contact Phone">

															<!-- Input for Map Location -->
															<label>Map Location:</label>
															<input type="text" name="contactMapLocation" value="<?php echo $conItem['Map_Location']; ?>" placeholder="Map Location">

															<!-- Textarea for Open Hours -->
															<label>Open Hours:</label>
															<textarea name="contactOpenHours" placeholder="Contact Open Hours"><?php echo $conItem['Open_Hours']; ?></textarea>

															<!-- Inputs for Social Media Links -->
															<label>Social Media Links:</label>
															<input type="text" name="contactTwitter" value="<?php echo $conItem['Twitter']; ?>" placeholder="Twitter">
															<input type="text" name="contactFacebook" value="<?php echo $conItem['Facebook']; ?>" placeholder="Facebook">
															<input type="text" name="contactInstagram" value="<?php echo $conItem['Instagram']; ?>" placeholder="Instagram">
															<input type="text" name="contactTiktok" value="<?php echo $conItem['Tiktok']; ?>" placeholder="Tiktok">
															<input type="text" name="contactLinkedIn" value="<?php echo $conItem['LinkedIn']; ?>" placeholder="LinkedIn">

															<!-- Update Button -->
															<div>
																<button type="button" class="updateBtn button-outline" data-item-id="<?php echo $conItem['Id']; ?>"><i class='fa fa-edit fa-lg'></i></button>
															</div>

														</form>
													</div>
												</div>
											</div>

											<?php
											}
											?>

										</div>
									<?php
									}
									?>
								</div>
							</div>
						</div>
					</div>
				</div>


				<!-- GALLERY Section -->
				<a class="anchor" name="gallery"></a>
				<div class="row grid-responsive gallery">
					<div class="column">
						<div class="card">
							<div class="card-title">
								<h3>Gallery</h3>
							</div>
							<div class="card-block">
								<div class="gallery-items">
									<?php
									if (!empty($imgItems)) {
										$itmCount = 1;
										foreach ($imgItems as $Item) {
									?>
											<div class="gallery-card" id="imageUrlInput5<?php echo $itmCount?>">
												<img src="<?php echo $site . "/" . $Item['Image']; ?>" alt="Gallery Image">
												<input type="file" id="fileInput5<?php echo $itmCount?>" style="display: none;" accept="image/*" data-item-id="<?php echo $Item['Id']; ?>">
												<div class="gallery-actions">
													<button class="button-outline" id="uploadImage5<?php echo $itmCount?>">
														<i class="fa fa-cloud-upload fa-lg"></i>
													</button>
													<button class="deleteBtn button-outline" data-item-id="<?php echo $Item['Id']; ?>">
														<i class='fa fa-trash fa-lg'></i>
													</button>
												</div>
											</div>
									<?php
											$itmCount++;
										}
									}
									?>
									<!-- New gallery item form -->
									<div class="gallery-card new-gallery-item" id="imageUrlInput0000">
										<img src="" alt="New Gallery Image" style="display: none;">
										<input type="file" id="fileInput0000" style="display: none;" accept="image/*" data-item-id="new-gallery-item">
										<button class="button" id="uploadImage0000">
											Add <i class="fa fa-plus fa-lg"></i>
										</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>


				<!-- TESTIMONIALS Section -->
				<a class="anchor" name="testimonials"></a>
				<div class="row grid-responsive testimonials">
					<div class="column">
						<div class="card">
							<div class="card-title">
								<h3>Testimonials</h3>
							</div>
							<div class="card-block">
								<div class="testimonial-items">
									<?php
									if (!empty($tesItems)) {
										foreach ($tesItems as $Item) {
									?>
											<div class="testimonial">
												<div class="testimonial-details">
													<div class="testimonial-image">
														<img src="<?php echo $site . "/" . $Item['Image']; ?>" alt="Testimonial Image">
													</div>
													<div class="testimonial-info">
														<input type='text' name='name' placeholder="Name" value='<?php echo $Item['Name']; ?>'>
														<input type='text' name='occupation' placeholder="Occupation" value='<?php echo $Item['Occupation']; ?>'>
														<textarea name='quote' placeholder="Quote"><?php echo $Item['Quote']; ?></textarea>
													</div>
												</div>
												<div class="testimonial-actions">
													<button class='updateBtn button-outline' data-item-id='<?php echo $Item['Id']; ?>'>
														<i class='fa fa-edit fa-lg'></i>
													</button>
													<button class='deleteBtn button-outline' data-item-id='<?php echo $Item['Id']; ?>'>
														<i class='fa fa-trash fa-lg'></i>
													</button>
												</div>
											</div>
									<?php
										}
									}
									?>
									<!-- New testimonial form for adding a new testimonial -->
									<div class="testimonial new-testimonial">
										<div class="testimonial-details">
											<div class="testimonial-image" id="imageUrlInput6">
												<img src="<?php echo $site . "/img/icons/placeholder-image-dark.jpg"; ?>" alt="Testimonial Image" id="uploadImage6">
												<input type="file" id="fileInput6" style="display: none;" accept="image/*">
											</div>
											<div class="testimonial-info">
												<input type="text" name="name" placeholder="Name">
												<input type="text" name="occupation" placeholder="Occupation">
												<textarea name="quote" placeholder="Quote"></textarea>
											</div>
										</div>
										<div class="testimonial-actions">
											<button id="addItem">Add <i class="fa fa-plus fa-lg"></i></button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>


				<!-- MENU Section -->
				<a class="anchor" name="menu"></a>
				<div class="row grid-responsive menu">
					<div class="column">
						<div class="card">
							<div class="card-title">
								<h3>Menu Items</h3>
							</div>
							<div class="card-block">
								<table id="menuTable">
									<thead>
										<tr>
											<th>Item</th>
											<th>Type</th>
											<th>Ingredients</th>
											<th>Price</th>
											<th>Image</th>
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
										<?php if (!empty($menuItems)) {
											$max = count($menuItems);
											$count = 1;
											foreach ($menuItems as $Item) { ?>
												<tr <?= ($count == $max) ? "id='lastMenuItemRow'" : "" ?>>
													<td><input type='text' name='name' value='<?= $Item['Name'] ?>'></td>
													<td>
														<select name='type'>
															<?php
															$uniqueTypes = array();
															foreach ($menuItems as $innerItem) {
																$type = $innerItem['Type'];
																if (!in_array($type, $uniqueTypes)) {
																	$uniqueTypes[] = $type;
																	$selected = ($type === $Item['Type']) ? "selected" : ""; // Check if it's the default type
																	echo "<option value='$type' $selected>$type</option>";
																}
															}
															?>
														</select>
													</td>
													<td><textarea name='ingredients'><?= $Item['Ingredients'] ?></textarea></td>
													<td><input type='number' name='price' step='0.01' value='<?= $Item['Price'] ?>'></td>
													<td class="row-image">
														<img src="<?php echo $site . "/" . $Item['Image']; ?>" alt="Testimonial Image">
													</td>
													<td>
														<button class='updateBtn button-outline' data-item-id='<?= $Item['Id'] ?>'>
															<i class='fa fa-edit fa-lg'></i>
														</button>
														<button class='deleteBtn button-outline' data-item-id='<?= $Item['Id'] ?>'>
															<i class='fa fa-trash fa-lg'></i>
														</button>
													</td>
												</tr>
												<?php $count++;
											}
										} ?>
										<!-- New row for adding a new menu item -->
										<tr id="newMenuItemRow">
											<td><input type="text" name="name" placeholder="Name"></td>
											<td><input type="text" name="type" placeholder="Type"></td>
											<td><textarea name="ingredients" placeholder="Ingredients"></textarea></td>
											<td><input type="number" step="0.01" name="price" placeholder="Price"></td>
											<td class="row-image" id="imageUrlInput7">
												<img src="<?php echo $site . "/img/icons/placeholder-image-dark.jpg"; ?>" alt="Testimonial Image" id="uploadImage7">
												<input type="file" id="fileInput7" style="display: none;" accept="image/*">
											</td>
											<td><button id="addItem">Add <i class="fa fa-plus fa-lg"></i></button></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>


				<!-- EVENTS Section -->
				<a class="anchor" name="events"></a>
				<div class="row grid-responsive events">
					<div class="column">
						<div class="card">
							<div class="card-title">
								<h3>Events</h3>
							</div>
							<div class="card-block">
								<div class="events">
									<?php
									if (!empty($eventItems)) {
										$itmCount = 1;
										foreach ($eventItems as $Item) {
									?>
											<div class="accordion">
												<button class="accordion-btn"><?php echo $Item['Name']; ?></button>
												<div class="accordion-content">
													<form class="event-form">
														<label>Name:</label>
														<input type="text" name="name" value="<?php echo $Item['Name']; ?>" placeholder="Name">

														<label>Image:</label>
														<div class="gallery-card" id="imageUrlInput8<?php echo $itmCount?>">
															<img src="<?php echo $site . "/" . $Item['Image']; ?>" alt="About Image">
															<input type="file" id="fileInput8<?php echo $itmCount?>" style="display: none;" accept="image/*" data-item-id="<?php echo $Item['Id']; ?>">
															<div class="gallery-actions">
																<button type="button" class="button-outline" id="uploadImage8<?php echo $itmCount?>">
																	<i class="fa fa-cloud-upload fa-lg"></i>
																</button>
															</div>
														</div>

														<label>Price:</label>
														<input type="number" step="0.01" name="price" value="<?php echo $Item['Price']; ?>" placeholder="Price">

														<label>Top Description:</label>
														<textarea name="top_desc" placeholder="Top Description"><?php echo $Item['Top_Desc']; ?></textarea>

														<label>Points:</label>
														<textarea name="points" placeholder="Points"><?php echo $Item['Points']; ?></textarea>

														<label>Bottom Description:</label>
														<textarea name="bottom_desc" placeholder="Bottom Description"><?php echo $Item['Bottom_Desc']; ?></textarea>
														
														<div>
															<button type="button" class="updateBtn button-outline" data-item-id="<?php echo $Item['Id']; ?>"><i class='fa fa-edit fa-lg'></i></button>
															<button type="button" class="deleteBtn button-outline" data-item-id="<?php echo $Item['Id']; ?>"><i class='fa fa-trash fa-lg'></i></button>
														</div>
													</form>
												</div>
											</div>
									<?php
											$itmCount++;
										}
									}
									?>
									<!-- New accordion panel for adding a new event item -->
									<div class="accordion new-event">
										<button class="accordion-btn">Add New Event</button>
										<div class="accordion-content">
											<form class="event-form">
												<label>Name:</label>
												<input type="text" name="name" placeholder="Name">

												<label>Image:</label>
												<div class="gallery-card" id="imageUrlInput9">
													<img src="<?php echo $site . "/img/icons/placeholder-image-dark.jpg"; ?>" alt="About Image">
													<input type="file" id="fileInput9" style="display: none;" accept="image/*">
													<div class="gallery-actions">
														<button type="button" class="button-outline" id="uploadImage9">
															<i class="fa fa-cloud-upload fa-lg"></i>
														</button>
													</div>
												</div>

												<label>Price:</label>
												<input type="number" step="0.01" name="price" placeholder="Price">

												<label>Top Description:</label>
												<textarea name="top_desc" placeholder="Top Description"></textarea>

												<label>Points:</label>
												<textarea name="points" placeholder="Points"></textarea>

												<label>Bottom Description:</label>
												<textarea name="bottom_desc" placeholder="Bottom Description"></textarea>

												<div>
													<button type="button" id="addItem">Add <i class="fa fa-plus fa-lg"></i></button>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>


				<!-- SPECIALS Section -->
				<a class="anchor" name="specials"></a>
				<div class="row grid-responsive specials">
					<div class="column">
						<div class="card">
							<div class="card-title">
								<h3>Special Items</h3>
							</div>
							<div class="card-block">
								<table id="specialsTable">
									<thead>
										<tr>
											<th>Name</th>
											<th>Title</th>
											<th>Hint</th>
											<th>Description</th>
											<th>Image</th>
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
										<?php if (!empty($spItems)) {
											foreach ($spItems as $Item) { ?>
												<tr <?= ($count == $max) ? "id='lastSpecialItemRow'" : "" ?>>
													<td><input type='text' name='name' value='<?= $Item['Name'] ?>'></td>
													<td><input type='text' name='title' value='<?= $Item['Title'] ?>'></td>
													<td><textarea name='hint'><?= $Item['Hint'] ?></textarea></td>
													<td><textarea name='description'><?= $Item['Description'] ?></textarea></td>
													<td class="row-image">
														<img src="<?php echo $site . "/" . $Item['Image']; ?>" alt="Special Image">
													</td>
													<td>
														<button class='updateBtn button-outline' data-item-id='<?= $Item['Id'] ?>'>
															<i class='fa fa-edit fa-lg'></i>
														</button>
														<button class='deleteBtn button-outline' data-item-id='<?= $Item['Id'] ?>'>
															<i class='fa fa-trash fa-lg'></i>
														</button>
													</td>
												</tr>
											<?php }
										} ?>
										<!-- New row for adding a new special item -->
										<tr id="newSpecialItemRow">
											<td><input type="text" name="name" placeholder="Name"></td>
											<td><input type="text" name="title" placeholder="Title"></td>
											<td><textarea name="hint" placeholder="Hint"></textarea></td>
											<td><textarea name="description" placeholder="Description"></textarea></td>
											<td class="row-image" id="imageUrlInput10">
												<img src="<?php echo $site . "/img/icons/placeholder-image-dark.jpg"; ?>" alt="Special Image" id="uploadImage10">
												<input type="file" id="fileInput10" style="display: none;" accept="image/*">
											</td>
											<td><button id="addItem">Add <i class="fa fa-plus fa-lg"></i></button></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>


				<!-- CHEFS Section -->
				<a class="anchor" name="chefs"></a>
				<div class="row grid-responsive chefs">
					<div class="column">
						<div class="card">
							<div class="card-title">
								<h3>Chefs</h3>
							</div>
							<div class="card-block">
								<div class="chef-items">
									<?php
									if (!empty($chefItems)) {
										foreach ($chefItems as $Item) {
									?>
											<div class="chef">
												<div class="chef-details">
													<div class="chef-image">
														<img src="<?php echo $site . "/" . $Item['Image']; ?>" alt="Chef Image">
													</div>
													<div class="chef-info">
														<input type='text' name='name' placeholder="Name" value='<?php echo $Item['Name']; ?>'>
														<input type='text' name='occupation' placeholder="Occupation" value='<?php echo $Item['Occupation']; ?>'>
														<input type='text' name='twitter' placeholder="Twitter" value='<?php echo $Item['Twitter']; ?>'>
														<input type='text' name='facebook' placeholder="Facebook" value='<?php echo $Item['Facebook']; ?>'>
														<input type='text' name='instagram' placeholder="Instagram" value='<?php echo $Item['Instagram']; ?>'>
														<input type='text' name='linkedin' placeholder="LinkedIn" value='<?php echo $Item['LinkedIn']; ?>'>
													</div>
												</div>
												<div class="chef-actions">
													<button class='updateBtn button-outline' data-item-id='<?php echo $Item['Id']; ?>'>
														<i class='fa fa-edit fa-lg'></i>
													</button>
													<button class='deleteBtn button-outline' data-item-id='<?php echo $Item['Id']; ?>'>
														<i class='fa fa-trash fa-lg'></i>
													</button>
												</div>
											</div>
									<?php
										}
									}
									?>
									<!-- New chef form for adding a new chef -->
									<div class="chef new-chef">
										<div class="chef-details">
											<div class="chef-image" id="imageUrlInput11">
												<img src="<?php echo $site . "/img/icons/placeholder-image-dark.jpg"; ?>" alt="Chef Image" id="uploadImage11">
												<input type="file" id="fileInput11" style="display: none;" accept="image/*">
											</div>
											<div class="chef-info">
												<input type="text" name="name" placeholder="Name">
												<input type="text" name="occupation" placeholder="Occupation">
												<input type="text" name="twitter" placeholder="Twitter">
												<input type="text" name="facebook" placeholder="Facebook">
												<input type="text" name="instagram" placeholder="Instagram">
												<input type="text" name="linkedin" placeholder="LinkedIn">
											</div>
										</div>
										<div class="chef-actions">
											<button id="addItem">Add <i class="fa fa-plus fa-lg"></i></button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>


				<!-- WHYUS Section -->
				<a class="anchor" name="whyus"></a>
				<div class="row grid-responsive whyus">
					<div class="column">
						<div class="card">
							<div class="card-title">
								<h3>Why Us</h3>
							</div>
							<div class="card-block">
								<table id="whyusTable">
									<thead>
										<tr>
											<th>Title</th>
											<th>Description</th>
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
										<?php if (!empty($whyItems)) {
											foreach ($whyItems as $Item) { ?>
												<tr <?= (($count == $max) ? "id='lastWhyUsItemRow'" : "") ?>>
													<td><input type='text' name='title' value='<?= $Item['Title'] ?>'></td>
													<td><textarea name='description'><?= $Item['Description'] ?></textarea></td>
													<td>
														<button class='updateBtn button-outline' data-item-id='<?= $Item['Id'] ?>'><i class='fa fa-edit fa-lg'></i></button>
														<button class='deleteBtn button-outline' data-item-id='<?= $Item['Id'] ?>'><i class='fa fa-trash fa-lg'></i></button>
													</td>
												</tr>
											<?php }
										} ?>
										<!-- New row for adding a new whyus item -->
										<tr id="newWhyUsItemRow">
											<td><input type="text" name="title" placeholder="Title"></td>
											<td><textarea name="description" placeholder="Description"></textarea></td>
											<td><button id="addItem">Add <i class="fa fa-plus fa-lg"></i></button></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>

			<?php } ?>
			<?php if ($userRole != "Designer") { // No access to 'Designers' ?>

				<!-- BOOKINGS Section -->
				<a class="anchor" name="books"></a>
				<div class="row grid-responsive bookings">
					<div class="column">
						<div class="card">
							<div class="card-title">
								<h3>Bookings</h3>
							</div>
							<div class="card-block">
								<ul class="booking-list">
									<?php
									if (!empty($bookItems)) {
										foreach ($bookItems as $Item) {
									?>
											<li class="booking-item">
												<div class="booking-header">
													<h4><?php echo $Item['Name']; ?></h4>
													<p><strong>No of people:</strong> <?php echo $Item['People']; ?></p>
													<span><?php echo $Item['Date']; ?> | <?php echo $Item['Time']; ?></span>
													
												</div>
												<div class="booking-details">
													<p><strong>Message:</strong><br>
													<?php echo $Item['Message']; ?></p><br>
													<p><strong>Contacts:</strong></p>
													<p>Email: <?php echo $Item['Email']; ?></p>
													<p>Phone: <?php echo $Item['Phone']; ?></p>
												</div>
												<button class='deleteBtn button-outline' data-item-id='<?= $Item['Id'] ?>'>
													<i class='fa fa-trash fa-lg'></i>
												</button>
											</li>
									<?php
										}
									}
									?>
								</ul>
							</div>
						</div>
					</div>
				</div>


				<!-- EMAILS Section -->
				<a class="anchor" name="emails"></a>
				<div class="row grid-responsive emails">
					<div class="column">
						<div class="card">
							<div class="card-title">
								<h3>Emails</h3>
							</div>
							<div class="card-block">
								<ul class="email-list">
									<?php
									if (!empty($mailItems)) {
										foreach ($mailItems as $Item) {
									?>
											<li class="email-item">
												<div class="email-header">
													<h4><?php echo $Item['Name']; ?></h4>
													<p><?php echo $Item['Sender']; ?></p>
													<span><?php echo $Item['Subject']; ?></span>
												</div>
												<div class="email-details">
													<?php echo $Item['Message']; ?></p><br>
												</div>
												<button class='deleteBtn button-outline' data-item-id='<?= $Item['Id'] ?>'>
													<i class='fa fa-trash fa-lg'></i>
												</button>
											</li>
									<?php
										}
									}
									?>
								</ul>
							</div>
						</div>
					</div>
				</div>

				
				<!-- SUBSCRIBERS Section -->
				<a class="anchor" name="subs"></a>
				<div class="row grid-responsive subscribers">
					<div class="column ">
						<div class="card">
							<div class="card-title">
								<h3>Subscribers</h3>
							</div>
							<div class="card-block">
								<table>
									<thead>
										<tr>
											<th>Subscriber</th>
											<th>Subscribed Date</th>
											<th>Subscribed Time</th>
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
										<?php
										if (!empty($subItems)) {
											foreach ($subItems as $Item) {
										?>
											<tr>
												<td><?php echo $Item['Email']; ?></td>
												<td><?php echo $Item['Sub_Date']; ?></td>
												<td><?php echo $Item['Sub_Time']; ?></td>
												<td>
													<button class='deleteBtn button-outline' data-item-id='<?= $Item['Id'] ?>'>
														<i class='fa fa-trash fa-lg'></i>
													</button>
												</td>
											</tr>
										<?php
											}
										}
										?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>

			<?php } ?>

			<div id="#log-reg-footer">
				<p class="credit">Powered by <a href="<?php echo $site ?>" target="_blank">FOODMANIA</a></p>
			</div>

		</section>

<?php include('footer.php'); ?>

<?php $conn->close(); ?>