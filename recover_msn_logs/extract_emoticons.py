import sys

filename = sys.argv[1]
f = open(filename, 'rU')
s = f.read()

from xml.dom import minidom
xmlTree = minidom.parseString(s)
l = xmlTree.childNodes[0].getElementsByTagName("td")

for e in l:
	width = e.getAttribute("width")
	
	if width == '20':
		continue
	
	if width == '25':
		emoticon_name = e.getElementsByTagName("img")[0].getAttribute("src").split('/')[1]
		continue
	
	el = e	
	nobr = e.getElementsByTagName("nobr")
	if len(nobr) > 0:
		el = nobr[0]		
	span = el.getElementsByTagName("span")
	for s in span:
		smiley = "".join([n.nodeValue for n in s.childNodes])
		print 	"e['" + smiley + "'] = '" + emoticon_name + "'"

f.close()
