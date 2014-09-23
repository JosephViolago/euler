import math

def is_prime(n):
    if n < 2 or n % 2 == 0 and n > 2: 
        return False

    return all(n % i for i in range(3, int(math.sqrt(n)) + 1, 2))

j = 0
nth_factor = 0

while True:
    j += 1
    if is_prime(j) == True:
        nth_factor += 1
        # print '{0:5d} {1:7d}'.format(nth_factor, j)
        if nth_factor > 10000:
            break

print '{0:1s} {1:0d}'.format('final:', j)
