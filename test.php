<?PHP

# Add New

// Query for Retreiving Addresses
$address_query = "SELECT `meta_id`, `post_id`, `meta_key`, `meta_value` FROM `wp_postmeta` WHERE `meta_key` = ‘724_custom_map’";

// Query for Retrieving Posts
$post_query = "SELECT * FROM `wp_posts` WHERE ID = $id";

// Creating Database Connection (Constants already set)
$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// Retrieve Addresses
$addresses = $conn->query($address_query);

// Retrieve Posts
$posts = $conn->query($post_query);

// Upload Addresses
foreach ($posts as $post) {
	if ($post["approved"] {
		foreach ($addresses as $address) {
			if ($address["post_id"] == $post["id"]) {
				// Update DB, but DB needs Update first.
			}
		}
	}
}

# Correct Old

// Old Coordinates
$current_coordinates = "// DB Needs Update";

// Upload Addresses
foreach ($posts as $post) {
	if ($post["approved"] {
		foreach ($addresses as $address) {
			if ($address["post_id"] == $post["id"]) {
				$address["approved"] == true;
			}
		}
	}
}

# Update

// Update Coordinates
foreach ($addresses as $address) {
	if ($address["approved"]) {
		// Google API Request
	}
}

// Upload to DB
if ($conn->multi_query($addresses) === TRUE) {
    // All is Good
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

# Print

echo "<script> var coordinates = " . json_encode($addresses) . "; </script>";

