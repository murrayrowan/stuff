<?php

function insertion_sort($numbers){

$count = count($numbers); // count array elements

for($i=1;$i<$count;$i++){ // $i is the index of the first unsorted element in the list
  $j=$i-1; // $j is the index of the last element in the sorted part of the list
	$key = $numbers[$i]; // $key is a temp holder for the first unsorted element. This is needed because we will later overwrite $numbers[$i]
	while($j>=0 && $numbers[$j] > $key){ // while we're not at the start of the list AND WHILE one of the sorted elements is greater than the unsorted one
		$numbers[$j+1] = $numbers[$j];   // swap the larger element for the next one down
		$numbers[$j]= $key;  			 // make the current element equal to the temp value in $key to complete the swap
		$j=$j-1;		     			 // move down to the next element in the list 
	}
}
	return $numbers; // return the sorted list
}

$numbers = array(3,2,4,5,1,8,11,0);

print_r( $numbers ); // print the unsorted list

$sorted = insertion_sort( $numbers ); // run the list through the function

print("<br>After sorting by using insertion sort<br>");
print_r($sorted); // print the sorted list

?>
