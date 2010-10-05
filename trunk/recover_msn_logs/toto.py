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
	l2 = l.encode('ascii', 'xmlcharrefreplace')
	l3 = l.encode('ascii', 'replace')
	l2 = str(l2)
	for k in l2:
		pass
		#print ord(k)
	#l2 = l2[:6]
	if l2.startswith('Lucida'):
		print "xxx"
		break
	#print "aaaaaaaa"
	l22 = ''.join([str(ord(k)) for k in l2])
	if l22.startswith('0383549544859038354954485903835495448590400102041'):
		print "yes"
		break
	print l3



