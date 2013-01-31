
def insertionsort(num) ## define IS function
	msg = "[ Insertion Sorted List ]"
	puts msg ## construct and pring useful message to console

i = 0
until i == num.length - 1 do ## create loop to iterate through the array
	i += 1 unless i == num.length 
	j = i

	while j >= 0 and num[j-1] > num[j] ## secondary loop to swap elements into the sorted array when they are smaller than sorted array elements
		num[j], num[j-1] = num[j-1], num[j] ## cool swap method that doesn't require a temp variable
		j-=1 unless j == 1 
	end

end

return num

end

numbers = [23,34,46,87,12,1,66]

msg = "[ Unsorted List ]"
puts msg
puts numbers

sorted = insertionsort(numbers) ## call the insertion sort method

puts sorted ## print the sorted list
