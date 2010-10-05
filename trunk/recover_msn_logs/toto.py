# -*- coding: utf-8 -*-

import codecs

path = '10:14:04@0'

s=""
f = codecs.open(path, 'rU', encoding='latin1')
for l in f:
	s += l

for l in s.splitlines(True):
	l2 = l.encode('ascii', 'xmlcharrefreplace')
	l2 = str(l2)
#	for k in l2:
#		pass
#		#print ord(k)
#	#l2 = l2[:6]
	
	# if font line, stop	
	if l2.startswith('Lucida'):
		print "stopped (Lucida)"
		break
		
	# if weird line, stop
	l22 = ''.join([str(ord(k)) for k in l2])
	if l22.startswith('0383549544859038354954485903835495448590400102041'):
		print "yes"
		break
	
	l3 = l.encode('ascii', 'replace')
	print l3



