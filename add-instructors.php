<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Instructor</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        .container {
            max-width: 500px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        h2 {
            margin-top: 0;
            text-align: center;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-top: 10px;
        }
        input[type="text"],
        input[type="number"],
        select,
        textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            margin-top: 15px;
            width: 100%;
            background-color: #4545a0;
            color: white;
            padding: 10px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #7474df;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Add New Instructor</h2>
        <form action="addInstructor.php" method="POST">
            <label for="user_id">User:</label>
                    <select id="user_id" name="user_id" required>
                        <option>Select user</option>
                    <?php
                        require 'config.php';
            
                        $query = "SELECT category_id, name FROM Category";
                        $result = $mysqli->query($query);
            
                        if ($result) {
                            while ($row = $result->fetch_assoc()) {
                                echo '<option value="' . $row['category_id'] . '">' . $row['name'] .'</option>';

                            }
                        } else {
                            echo '<option disabled>Error loading prisons</option>';
                        }
                        ?>
                    </select>

            <label for="bio">Bio:</label>
            <textarea id="bio" name="bio" rows="4" cols="50" required></textarea>

            <label for="experience">Experience (years):</label>
            <input type="number" id="experience" name="experience" required>

            <label for="specialization">Specialization:</label>
            <input type="text" id="specialization" name="specialization" required>

            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
