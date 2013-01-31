<?php

function insertion_sort($numbers){

$count = count($numbers); // count array elements

for($i=1; $i<$count; $i++){  // $i is the index of the first unsorted element in the list
	$j=$i; 		     // $j is the index of the last element in the sorted part of the list
	$key = $numbers[$i]; // $key is a temp holder for the first unsorted element. This is needed because we will later overwrite $numbers[$i] if a larger number is further down the list
	while( $j>=0 && $numbers[$j-1] > $numbers[$j] ){ // while we're not at the start of the list AND WHILE one of the sorted items (left) > $key/$numbers[$j] 
		$numbers[$j] = $numbers[$j-1];  // copy the larger item on the left into the array index of the smaller item on the right (note this writes over the previous item)
		$numbers[$j-1]= $key;  		// copy $key into the index of the left item index so to complete the swap
		$j--;		     		// move down to the next element in the list
	}
}
	return $numbers; // return the sorted list
}

$numbers = array(3,2,4,5,1,8,11,0); // create array to sort

print_r( $numbers ); // print the unsorted list

$sorted = insertion_sort( $numbers ); // run the list through the function

print("<br>After sorting by using insertion sort<br>");
print_r($sorted); // print the sorted list

?>
