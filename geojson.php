<?php


$arr = array(
	"type"=>"FeatureCollection",
	"features"=>array(
		array(
			"type"=>"gemoetry",
			"cordinates"=>array(0,0,2,3),
			"properties"=>array(
				"prop0"=>0,
				"prop1"=>1
			)
		),
		array(
			"type"=>"gemoetry",
			"cordinates"=>array(0,0,2,3),
			"properties"=>array(
				"prop3"=>30,
				"prop4"=>40
			)
		)
	)
);


echo json_encode($arr);