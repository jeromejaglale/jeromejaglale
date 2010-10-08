import sys

filename = sys.argv[1]
f = open(filename, 'rU')
s = f.read()

from xml.dom import minidom
xmlTree = minidom.parseString(s)
l = xmlTree.childNodes[0].getElementsByTagName("td")

for e in l:
	width = e.getAttribute("width")
	if width == '25':
		emoticon_name = e.getElementsByTagName("img")[0].getAttribute("src").split('/')[1]

f.close()
