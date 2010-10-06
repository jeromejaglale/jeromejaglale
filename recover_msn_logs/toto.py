# -*- coding: utf-8 -*-

import sys
import codecs

path = sys.argv[1]

f = codecs.open(path, 'rU', encoding='latin1')
s=""
for l in f:
	s += l

i = 0
for l in s.splitlines(True):
	i += 1
	l3 = l.encode('utf-8', 'ignore')
	
	# first line
	if i == 1:
		print l3[24:]
		continue
	
	# last line
	sep = 'runs' + chr(0)
	if sep in l3:
		t = l3.split(sep)
		print t[0]
		break;
	
	# normal line
	l3 = l3.strip()
	if l3 != '':
		print l3

