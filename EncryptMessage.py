
import sys
import math

def encrypt(message,n,e):
	st=''
	for i in message:
		st+=chr(pow(ord(i),e,n))
	return st
cmdline = sys.argv[1:]
n=int(cmdline[0])
e=int(cmdline[1])
message=cmdline[2:]
encrypted = [encrypt(i,n,e) for i in message]
for i in encrypted:
	print(i,end="|")

