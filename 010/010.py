#!/usr/bin/env python

from math import isqrt

def main(max: int) -> int:
    primes = []

    # skip even numbers
    for num in range(2, max):
        # optimization; anything larger than isqrt(num) is already a multiple
        # of a smaller factor
        # https://www.geeksforgeeks.org/python-program-to-check-whether-a-number-is-prime-or-not/
        if all(num % i != 0 for i in range(2, isqrt(num) + 1)):
            primes.append(num)

    print(f"primes: {primes}")

    solution = sum(primes)

    print(f"solution: {solution}")
    return solution

main(2000000)
