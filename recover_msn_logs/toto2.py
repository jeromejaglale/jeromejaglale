# -*- coding: utf-8 -*-

import sys
import codecs
import re
import os

for path in sys.argv[1:]:
	print os.path.basename(path)
	print "\n"

	output = u''
	f = open(path, 'rb')
	try:
		# skip useless junk
		f.seek(22)

		byte = f.read(1)
		while byte != "":
			pos = f.tell()
			
			# end of contents
			if output.endswith(u'runs\x00\x00'):
				output = output[:-6]
				break
					
			if byte == '\r':	# line break
				output += u"\n"
			else:			
				decoded = byte.decode('latin1','replace')
				#print decoded,
				output += decoded
						
			byte = f.read(1)
	finally:
		f.close()
	
	# clean
	output = output.replace(chr(0),'')
	
	# print to new file
	new_path = 'result.txt'	
	f2 = codecs.open(new_path, 'w', encoding='utf-8')
	f2.write(output)
	f2.close()

