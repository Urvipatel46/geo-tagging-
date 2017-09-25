<html>
<head>
<title>CSV to SQL convertor</title>
</title>
<body>
<?php   
    // Parse incoming information if above form was posted
    if(isset($_POST['ref']) && $_POST['ref']=="csv2sql")
    {
        if($_POST['table_name']=='' || $_POST['csv_data']=='')
        {
            $msg = '<p>You must enter a table name and some CSV data!</p>';
        }
        else
        {
            echo "<h2>SQL Query Output:</h2>";
            
            // Get information from form & prepare it for parsing
            $table_name = $_POST['table_name'];
            $csv_data   = $_POST['csv_data'];
            $csv_array    = explode("\n",$csv_data);
            $column_names = explode(",",$csv_array[0]);

            // Generate base query
            $base_query = "INSERT INTO `$table_name` (";
            $first      = true;
            foreach($column_names as $column_name)  
            {
                if(!$first)
                    $base_query .= ", ";    
                $column_name = trim($column_name);
                $base_query .= "`$column_name`";
                $first = false;
            }
            $base_query .= ") ";
        
            // Loop through all CSV data rows and generate separate
            // INSERT queries based on base_query + the row information
            $last_data_row = count($csv_array) - 1;
            for($counter = 1; $counter < $last_data_row; $counter++)
            {
                $value_query = "VALUES (";
                $first = true;
                $data_row = explode(",",$csv_array[$counter]);
                $value_counter = 0;
                foreach($data_row as $data_value)   
                {
                    if(!$first)
                        $value_query .= ", ";   
                    $data_value = trim($data_value);
                    $value_query .= "'$data_value'";
                    $first = false;
                }
                $value_query .= ")";
        
                // Combine generated queries to generate final query
                $query = $base_query .$value_query .";";
                echo "$query <br />";
            }
        }
    }
?>

<h2>CSV to SQL convertor</h2>
<p>This script will create SQL INSERT statements from your pasted <acronym title="Comma Separated Values" lang="en">CSV</acronym> data.</p>
<p>Enter the name of the table, and then paste the data into the main input block. The data must be comma-separated, and the first row must contain the field names of the table.</p>
<p>Example data (copy-paste):</p>
<pre>
Title, Year, Producer
City of God, 2002, Katia Lund
Rain,, Christine Jeffs
2001: A Space Odyssey, , Stanley Kubrick
"This is a ""fake"" movie title", 1957, Sidney Lumet
Alien, 1979   , Ridley Scott
"The Sequel to ""Dances With Wolves.""", 1982, Ridley Scott
"Caine Mutiny, The", 1954, "Dymtryk ""the King"", Edward"
</pre>
<?php echo (isset($msg)?$msg:''); ?>
<!-- Input form begin -->
<form name="csv2sql" method=POST action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <input type="hidden" name="ref" value="csv2sql" />
    <label>Name of table:</label> <br />
    <input class="default" type="TEXT" name="table_name" value="" size="50" />
    <br />
    <br />
    <label>CSV data:</label><br />
    <textarea class="default" name="csv_data" rows="30" cols="100"></textarea>
    <br />
    <br />
    <input class="default" type="submit" value="     Convert to SQL query     ">
</form>
<!-- Input form end -->
</body>
</html>