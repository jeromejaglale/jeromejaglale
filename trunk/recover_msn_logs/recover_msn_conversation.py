# -*- coding: utf-8 -*-

import sys
import codecs
import re
import os

for path in sys.argv[1:]:
	print "processing " + os.path.basename(path)

	output = u''
	f = open(path, 'rb')
	try:
		# skip useless junk
		f.seek(22)

		byte = f.read(1)
		while byte != "":
			pos = f.tell()
			
			# end of contents
			if output.endswith(u'runs\x00'):
				output = output[:-5]
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

	# add HTML line breaks
	output = output.replace(u"\n", u'<br />\n')
	
	# add HTML wrapper
	output = u"""<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
</head>

<body>
%s
</body>
</html>
""" % output
	
	# add emoticons
	base_url = 'http://messenger.msn.com/Resource/emoticons/'
	e = {}
	e[':-)'] = 'regular_smile.gif'
	e[':)'] = 'regular_smile.gif'
	e[':-D'] = 'teeth_smile.gif'
	e[':d'] = 'teeth_smile.gif'
	e[':-O'] = 'omg_smile.gif'
	e[':o'] = 'omg_smile.gif'
	e[':-P'] = 'tongue_smile.gif'
	e[':p'] = 'tongue_smile.gif'
	e[';-)'] = 'wink_smile.gif'
	e[';)'] = 'wink_smile.gif'
	e[':-('] = 'sad_smile.gif'
	e[':('] = 'sad_smile.gif'
	e[':-S'] = 'confused_smile.gif'
	e[':s'] = 'confused_smile.gif'
	e[':-|'] = 'what_smile.gif'
	e[':|'] = 'what_smile.gif'
	e[":'("] = 'cry_smile.gif'
	e[':-$'] = 'red_smile.gif'
	e[':$'] = 'red_smile.gif'
	e['(H)'] = 'shades_smile.gif'
	e['(h)'] = 'shades_smile.gif'
	e[':-@'] = 'angry_smile.gif'
	e[':@'] = 'angry_smile.gif'
	e['(A)'] = 'angel_smile.gif'
	e['(a)'] = 'angel_smile.gif'
	e['(6)'] = 'devil_smile.gif'
	e[':-#'] = '47_47.gif'
	e['8o|'] = '48_48.gif'
	e['8-|'] = '49_49.gif'
	e['^o)'] = '50_50.gif'
	e[':-*'] = '51_51.gif'
	e['+o('] = '52_52.gif'
	e[':^)'] = '71_71.gif'
	e['*-)'] = '72_72.gif'
	e['<:o)'] = '74_74.gif'
	e['8-)'] = '75_75.gif'
	e['|-)'] = '77_77.gif'
	e['(C)'] = 'coffee.gif'
	e['(c)'] = 'coffee.gif'
	e['(Y)'] = 'thumbs_up.gif'
	e['(y)'] = 'thumbs_up.gif'
	e['(N)'] = 'thumbs_down.gif'
	e['(n)'] = 'thumbs_down.gif'
	e['(B)'] = 'beer_mug.gif'
	e['(b)'] = 'beer_mug.gif'
	e['(D)'] = 'martini.gif'
	e['(d)'] = 'martini.gif'
	e['(X)'] = 'girl.gif'
	e['(x)'] = 'girl.gif'
	e['(Z)'] = 'guy.gif'
	e['(z)'] = 'guy.gif'
	e['({)'] = 'guy_hug.gif'
	e['(})'] = 'girl_hug.gif'
	e[':-['] = 'bat.gif'
	e[':['] = 'bat.gif'
	e['(^)'] = 'cake.gif'
	e['(L)'] = 'heart.gif'
	e['(l)'] = 'heart.gif'
	e['(U)'] = 'broken_heart.gif'
	e['(u)'] = 'broken_heart.gif'
	e['(K)'] = 'kiss.gif'
	e['(k)'] = 'kiss.gif'
	e['(G)'] = 'present.gif'
	e['(g)'] = 'present.gif'
	e['(F)'] = 'rose.gif'
	e['(f)'] = 'rose.gif'
	e['(W)'] = 'wilted_rose.gif'
	e['(w)'] = 'wilted_rose.gif'
	e['(P)'] = 'camera.gif'
	e['(p)'] = 'camera.gif'
	e['(~)'] = 'film.gif'
	e['(@)'] = 'cat.gif'
	e['(&)'] = 'dog.gif'
	e['(T)'] = 'phone.gif'
	e['(t)'] = 'phone.gif'
	e['(I)'] = 'lightbulb.gif'
	e['(i)'] = 'lightbulb.gif'
	e['(8)'] = 'note.gif'
	e['(S)'] = 'moon.gif'
	e['(*)'] = 'star.gif'
	e['(E)'] = 'envelope.gif'
	e['(e)'] = 'envelope.gif'
	e['(O)'] = 'clock.gif'
	e['(o)'] = 'clock.gif'
	e['(M)'] = 'messenger.gif'
	e['(m)'] = 'messenger.gif'
	e['(sn)'] = '53_53.gif'
	e['(bah)'] = '70_70.gif'
	e['(pl)'] = '55_55.gif'
	e['(||)'] = '56_56.gif'
	e['(pi)'] = '57_57.gif'
	e['(so)'] = '58_58.gif'
	e['(au)'] = '59_59.gif'
	e['(ap)'] = '60_60.gif'
	e['(um)'] = '61_61.gif'
	e['(ip)'] = '62_62.gif'
	e['(co)'] = '63_63.gif'
	e['(mp)'] = '64_64.gif'
	e['(st)'] = '66_66.gif'
	e['(li)'] = '73_73.gif'
	e['(mo)'] = '69_69.gif'
	
	for smiley in e:
		url = base_url + e[smiley]
		img = '<img src="' + url + '" />'
		output = output.replace(smiley, img)
	
	# write result to file
	dirname = os.path.dirname(path)
	filename = os.path.basename(path)
	
	reg = r'^(\d\d?)\D(\d\d?)\D(\d\d?)@.*' # matches 1:2:03@0 or 11:20:03@0
	year = '20' + re.sub(reg, r'\3', filename)
	month = re.sub(reg, r'\1', filename).zfill(2) 
	day = re.sub(reg, r'\2', filename).zfill(2) 
	
	new_filename = year + '_' + month + '_' + day + '.html'
	new_path = os.path.join(dirname, new_filename)

	f2 = codecs.open(new_path, 'w', encoding='utf-8')
	f2.write(output)
	f2.close()

