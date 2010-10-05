# -*- coding: utf-8 -*-

import codecs

path = '11:20:03@0'
path = '10:14:04@0'

s=""
f = codecs.open(path, 'rU', encoding='latin1')
for l in f:
	s += l

for l in s.splitlines(True):
	l3 = l.encode('utf-8', 'replace')
	l3 = l3.strip()
	if 'runs' in l3:
		t = s.split('runs')
		print t[0]
		break;
	
	if l3 != '':
		print l3

