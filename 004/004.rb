class Palindrome
	def initialize(max_val)
		$max = max_val
	end

	def getMax
		$i = $max
		$operations = 0
		while $i > 0 do
			$operations += 1
			$product = $i * $max

			if $product.to_s() == $product.to_s().reverse
				puts "#{ $i } x #{ $max } = #{ $product }"
				break
			end

			$i-=1
		end

		puts "Operations: #{ $operations }"
	end
end

pally = Palindrome.new(999);
pally.getMax
