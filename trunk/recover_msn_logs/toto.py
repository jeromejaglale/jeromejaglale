# -*- coding: utf-8 -*-

import sys
import codecs
import re
import os

for path in sys.argv[1:]:
	f = codecs.open(path, 'rU', encoding='latin1')
	s=u""
	for l in f:
		s += l
	f.close()
	
	i = 0
	output=u""
	for l in s.splitlines(True):
		i += 1
		l3 = l
		
		# first line
		if i == 1:
			continue
	
		# last line
		sep = 'runs' + chr(0)
		if sep in l3:
			t = l3.split(sep)
			output += t[0]  + u"\n"
			break;
	
		# normal line
		l3 = l3.strip()
		if l3 != '':
			#print l3
			output += l3 + u"\n"
	
	# write result to file
	dirname = os.path.dirname(path)
	filename = os.path.basename(path)
	
	reg = r'^(\d\d?)\D(\d\d?)\D(\d\d?)@.*' # matches 1:2:03@0 or 11:20:03@0
	year = '20' + re.sub(reg, r'\3', filename)
	month = re.sub(reg, r'\1', filename).zfill(2) 
	day = re.sub(reg, r'\2', filename).zfill(2) 
	
	new_filename = year + '_' + month + '_' + day + '.txt'
	new_path = os.path.join(dirname, new_filename)
		
	#print type(output)
	f2 = codecs.open(new_path, 'w', encoding='utf-8')
	f2.write(output)
	f2.close()
	print "wrote into " + new_path

