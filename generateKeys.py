
import sys

from Crypto.PublicKey import RSA
from Crypto import Random
import ast

keys = RSA.generate(1024)
print(keys)