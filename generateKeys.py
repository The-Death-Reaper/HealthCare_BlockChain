

import sys
import random
import math
def gcd(a,b): 
    if b==0: 
        return a 
    else: 
        return gcd(b,a%b)


def isPrime(k):
	j = math.ceil(math.sqrt(k))
	for i in range(2,j):
		if k%i == 0:
			return True
	return False
def generate():
	x,y=13,23
	primes = [i for i in range(100,10000) if isPrime(i)]
	x = random.choice(primes)
	y = random.choice(primes)
	n = x*y
	phi = (x-1)*(y-1)
	e =2
	while(e<phi):
		if(gcd(e,phi)==1):
			break
		e+=1
	k = 2
	d=0
	while(True):
		d = (1+(k*phi))/e
		if(d%1 == 0):
			break;
		k+=1
	return n,e,d


n,e,d=generate()
print(n,e,d,sep="|")