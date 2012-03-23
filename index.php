<?php

require_once 'includes/db.php';
//var_dump($db);

//->exec() allows us to perform SQL and not expect results
//->query()allows us to perform SQL and expect results
$results = $db->query('SELECT id,name,longitude,latitude
                       FROM museums 
					   ORDER BY name ASC'
					  );

include 'includes/theme-top.php';

?>


<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Ottawa Museums</title>
</head>
<body>
    
	<h1>Ottawa Museums</h1>
	<div class = "page">
	<a href="admin/index.php">Admin Login</a>
	
	<ul class="museums">
		<?php foreach ($results as $museums) : ?>
		
            <li itemscope itemtype="http://schema.org/TouristAttraction">
        	<a href="single.php?id=<?php echo $museums['id']; ?>"><?php echo $museums['name']; ?></a>
            <span itemprop="geo" itemscope itemtype="http://schema.org/GeoCoordinates">
			<meta itemprop="latitude" content="<?php echo $museums['latitude']; ?>">
			<meta itemprop="longitude" content="<?php echo $museums['longitude']; ?>">
        </li>
		<?php endforeach; ?>
	</ul>
    <div id="map"></div>
    </div>
<?php

include 'includes/theme-bottom.php';

?>

    
</body>
</html>