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
				output += u"\n"
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
	
	# write result to file
	dirname = os.path.dirname(path)
	filename = os.path.basename(path)
	
	reg = r'^(\d\d?)\D(\d\d?)\D(\d\d?)@.*' # matches 1:2:03@0 or 11:20:03@0
	year = '20' + re.sub(reg, r'\3', filename)
	month = re.sub(reg, r'\1', filename).zfill(2) 
	day = re.sub(reg, r'\2', filename).zfill(2) 
	
	new_filename = year + '_' + month + '_' + day + '.txt'
	new_path = os.path.join(dirname, new_filename)

	f2 = codecs.open(new_path, 'w', encoding='utf-8')
	f2.write(output)
	f2.close()

