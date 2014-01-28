#! /usr/bin/perl
use strict;
use warnings;
use List::Util 'sum';

my ($a, $b) = (1, 2);
my @fibo = ();
while($a < 4000000)
{
    push(@fibo, $a);
    ($a, $b) = ($b, $a+$b);
}

my @fibo_twos = grep { $_ % 2 == 0 } @fibo;
my $fibo_sum = sum(@fibo_twos);

print("@fibo\n");
print("@fibo_twos\n");
print("Total: $fibo_sum\n");
