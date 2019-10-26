import sys
import Crypto
from Crypto.PublicKey import RSA
from Crypto import random
import ast


cmdline = sys.argv
messages = cmdline[3:]
privateKey = cmdline[2]

publicKeyn = int(cmdline[1][10:len(cmdline[1])-1])
publicKeye = int(cmdline[2][0:len(cmdline[2])-1])

'''
messages = [i.encode('ASCII').strip() for i in messages]
messages = [rsa.encrypt(i,public) for i in messages]
print(messages)
messages = [i.decode('ASCII') for i in messages]
'''
