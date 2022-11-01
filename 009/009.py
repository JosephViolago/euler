#!/usr/bin/env python

from functools import reduce
from itertools import combinations
from math import isqrt

def main() -> int:
    # determine max int
    n = 1
    n_squared = 1
    n_squares = []

    while n < 1000:
        n_squared = pow(n, 2)
        n_squares.append(n_squared)
        n += 1

    # a^2 + b^2
    for triplets in combinations(n_squares, 2):
        half_triplet = sum(triplets)    # c^2
        triplet = [isqrt(triplets[0]), isqrt(triplets[1]), isqrt(half_triplet)]
        sum_triplet = sum(triplet)      # should == 1000

        if (half_triplet in n_squares and sum_triplet == 1000):
            print(f"a;b;c: {triplet}")
            print(f"half_triplet: {half_triplet}")
            print(f"sum_triplet: {sum_triplet}")

            solution = reduce(lambda x, y: x * y, triplet)
            print(f"solution: {solution}")
            return solution
    
    return []
 
main()
