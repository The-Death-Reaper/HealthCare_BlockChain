
import rsa

def createKeys(size):
	return rsa.newkeys(size)
def encryptFile(filename,publicKey):
	with open(filename,"r") as infile:
		with open("EncryptedFile.txt","w") as outfile:
			for line in infile:
				outfile.write(rsa.encrypt(line,publicKey))
	return True
def decryptFile(filename,privateKey):
	with open(filename,"r") as infile:
		with open("DecryptedFile.txt","w") as outfile:
			for line in infile:
				outfile.write(rsa.decrypt(line,privateKey))
	return True
if __name__=="__main__":
	publicKey,privateKey=createKeys(256)
	
