<html lang = "en">
    <head>
        <meta charset="utf-8">
        <title>DolphinCRM</title>

        <link href="dash_design.css" rel = "stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">

        <script src="dashboard.js"></script>

    </head>

    <body>
        <?php include 'header.php';?>   

        <main>
            <div id = "head">
                <h2>Dashboard</h2>
                <button href = "New_User.html">Add Contact</button>
            </div>
            <div id = "filterOp">
                <img id = "filter" src="filter.png">
                <p class = "filter" id="function">Filter By: </p>
                <p class = "filter">All</p>
                <p class = "filter">Sales Leads</p>
                <p class = "filter">Support</p>
                <p class = "filter">Assigned to me</p>
            </div>

            
            <table id = cust_table>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Company</th>
                    <th>Type</th>
                </tr>

                <?php 
                    include('connection.php');
                    $query = $conn->query("SELECT * FROM Contacts");

                    $results = mysqli_query($conn, $query);

                    foreach($results as $row):?>
                        <tr>
                            <td>
                                <?=$row['title']." ".$row['firstname']." ".$row['lastname'];?>
                            </td>
                        </tr>
                            
                        <tr>
                            <td>
                                <?=$row['email'];?>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <?=$row['company'];?>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <?=$row['type'];?>
                            </td>
                        </tr>

                    <?php endforeach;?>
                    
            </table>

        </main>

        <?php include 'navbar.php';?>
        

    </body>

</html>