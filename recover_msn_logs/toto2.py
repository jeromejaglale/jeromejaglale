# -*- coding: utf-8 -*-

import sys
import codecs
import re
import os

for path in sys.argv[1:]:
	f = open(path, 'rb')
	try:
		# skip useless junk
		f.seek(30)

		byte = f.read(1)
		while byte != "":
			pos = f.tell()
			
			if(pos > 30):
				print str(pos) + ": " + byte

			# stop early
			if pos>50:
				break

			byte = f.read(1)
	finally:
		f.close()

