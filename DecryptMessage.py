import sys
import rsa
cmdline = sys.argv
messages = cmdline[6:]
privateKey = cmdline[2]

privateKeyn = int(cmdline[1][11:len(cmdline[1])-1])
privateKeye = int(cmdline[2][0:len(cmdline[2])-1])
privateKeyd = int(cmdline[3][0:len(cmdline[3])-1])
privateKeyp = int(cmdline[4][0:len(cmdline[4])-1])
privateKeyq = int(cmdline[5][0:len(cmdline[5])-1])
private = rsa.PrivateKey(privateKeyn,privateKeye,privateKeyd,privateKeyp,privateKeyq)
encoded_message = [rsa.decrypt(i,privateKey) for i in encoded_message]

map(print,encoded_message)