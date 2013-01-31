
def insertionsort(num)
  msg = "[ Insertion Sort ]"
	puts msg

i = 0
until i == num.length - 1 do
	i += 1 unless i == num.length
	j = i

	while j >= 0 and num[j-1] > num[j]
		num[j], num[j-1] = num[j-1], num[j]
		j-=1 unless j == 1
	end

end

return num

end

numbers = [23,34,46,87,12,1,66]

msg = "[ Unsorted ]"
puts msg
puts numbers

sorted = insertionsort(numbers)

puts sorted
