# -*- coding: utf-8 -*-

import codecs

path = '10:14:04@0'

s=""
f = codecs.open(path, 'rU', encoding='latin1')
for l in f:
	s += l

i = 0
for l in s.splitlines(True):
	i += 1
	l3 = l.encode('utf-8', 'replace')
	l3 = l3.strip()
	
	# first line
	if i == 1:
		t = l3.split('"')
		print t[1].strip()
		continue;
	
	# last line
	if 'runs' in l3:
		t = l3.split('runs')
		print t[0]
		break;
	
	# normal line
	if l3 != '':
		print l3

