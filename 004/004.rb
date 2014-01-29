class Palindrome
	def initialize(max_val)
		$max = max_val
		@products = {}
	end

	def getMax
		$i = $max
		$operations = 0
		$max_product = 0
		while $i > 99 do
			$j = $max
			while $j > 99 do
				$operations += 1
				$product = $i * $j
				# @hash["#{ $i }_#{ $j }"] = $product

				if $product.to_s() == $product.to_s().reverse && $product > $max_product
					puts "#{ $i } x #{ $j } = #{ $product }"
					$max_product = $product;
				end

				$j -= 1
			end

			$i -= 1
		end

		puts "Operations: #{ $operations }"
	end
end

pally = Palindrome.new(999);
pally.getMax
