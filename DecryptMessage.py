

import sys
import math


def decrypt(message,d,n):
	st=''
	for i in message:
		st+=chr(pow(ord(i),d,n))
	return st
cmdline = sys.argv[1:]
d = int(cmdline[0])
n = int(cmdline[1])
message = cmdline[2:]
decrypted = [decrypt(i,d,n) for i in message]
for i in decrypted:
	print(i,end=" ")