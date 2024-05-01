<?php
// Include the database connection file
include 'Conn.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $admin_id = $_POST["admin_id"];
    $admin_name = $_POST["admin_name"];
    $admin_username = $_POST["admin_username"];
    $admin_password = $_POST["admin_password"];

    // Validate and sanitize input data (you can add more validation as needed)
    $admin_id = filter_var($admin_id, FILTER_SANITIZE_NUMBER_INT);
    $admin_name = filter_var($admin_name, FILTER_SANITIZE_STRING);
    $admin_username = filter_var($admin_username, FILTER_SANITIZE_STRING);

    // Prepare and execute SQL statement to insert admin data into the database
    $sql = "INSERT INTO admin_info (admin_id, admin_name, admin_username, admin_password)
            VALUES ('$admin_id', '$admin_name', '$admin_username', '$admin_password')";

    if (mysqli_query($conn, $sql)) {
        echo "Admin account created successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Signup</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body background="Admin_Image\bg_blood_cell.jpg">
    <div class="max-w-lg mx-auto py-12">
        <h1 class="text-3xl text-white font-semibold text-center mb-8">Admin Signup</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST"
            class="shadow-md rounded px-8 pt-6 pb-8 mb-4" 
            style="background: transparent;">
            <div class="mb-4">
                <label for="admin_id" class="block text-white text-sm font-bold mb-2">Admin ID:</label>
                <input type="text" id="admin_id" name="admin_id" required
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="admin_name" class="block text-white text-sm font-bold mb-2">Admin Name:</label>
                <input type="text" id="admin_name" name="admin_name" required
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="admin_username" class="block text-white text-sm font-bold mb-2">Admin Username:</label>
                <input type="text" id="admin_username" name="admin_username" required
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-6">
                <label for="admin_password" class="block text-white text-sm font-bold mb-2">Admin Password:</label>
                <input type="password" id="admin_password" name="admin_password" required
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <input type="submit" value="Signup"
                class="bg-blue-500 mt-5 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">

        </form>
    </div>
</body>

</html>