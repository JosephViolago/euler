def get_factors(n):
    return set(
        reduce(
            list.__add__,
            (
                [i, n // i] for i in range(1, int(n**0.5) + 1) if n % i == 0
            )
        )
    )

def is_prime(n):
    # Memory Error
    # for i in range(3, n):
    for i in xrange(3, int(n ** 0.5) + 1, 2):
        if n % i == 0:
            return False
    return True

factors = sorted(get_factors(600851475143), reverse=True)

print(factors)

for factor in factors:
    if is_prime(factor) == True:
        print(factor)
        break
