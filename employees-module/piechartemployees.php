<?php

class Chart
{
    private $DB_SERVER = 'localhost';
    private $DB_USERNAME = 'root';
    private $DB_PASSWORD = '';
    private $DB_DATABASE = 'test';
    private $conn;

    public function __construct()
    {
        $this->conn = new mysqli($this->DB_SERVER, $this->DB_USERNAME, $this->DB_PASSWORD, $this->DB_DATABASE);

        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function getDataPoints()
    {
        $dataPoints = array();
    
        // Query to get the count of cooks, cashiers, and servers from the employees table
        $query = "SELECT type, COUNT(*) as count FROM employee GROUP BY type";
        $result = $this->conn->query($query);
    
        // Fetch the data and populate the $dataPoints array
        while ($row = $result->fetch_assoc()) {
            $type = $row['type'];
            $count = $row['count'];
            $dataPoints[] = array("label" => $type, "y" => $count);
        }
    
        // Free the result set
        $result->free_result();
    
        return $dataPoints;
    }

    public function __destruct()
    {
        $this->conn->close();
    }
}

$Chart = new chart();
$dataPoints = $Chart->getDataPoints();

?>

<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function() {

var chart = new CanvasJS.Chart("chartContainer", {
    animationEnabled: true,
    title: {
        text: "Position Distribution"
    },
    data: [{
        type: "pie",
        yValueFormatString: "#,##0",
        indexLabel: "{label} ({y})",
        dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
    }]
});
chart.render();

}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
</body>
</html>