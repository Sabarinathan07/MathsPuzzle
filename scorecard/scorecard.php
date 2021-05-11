<!DOCTYPE html>
<html>

<head>
    <title>Table with database</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            color: #588c7e;
            font-family: monospace;
            font-size: 25px;
            text-align: left;
        }

        th {
            background-color: #588c7e;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2
        }
    </style>
</head>

<body>
    <table>
        <tr>
            <th>Rank</th>
            <th>Name</th>
            <th>Score</th>
        </tr>
        <?php
        $conn = mysqli_connect("localhost", "root", "", "puzzle");
        // Check connection
        
        $sql = "SELECT * FROM `score` ORDER BY score DESC";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            $i =1;
            while ($row = $result->fetch_assoc()) {
                
                
                echo "<tr><td>" .$i.   "</td><td>" . $row["name"] . "</td><td>" . $row["score"] . "</td></tr>";
                   $i = $i +1 ;
                
            }
            echo "</table>";
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
    </table>
</body>

</html>