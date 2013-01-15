#!/usr/bin/python

import re

KEY_PREFIX = 'admin.'
KEY_MAX_LENGTH = 20

def get_key(text):
    key = text.lower()

    # replace special chars by single space 
    special_chars = """~`!@#$%^&*()-_+=|\{}[]"':;,.<>/?\t"""
    for i in range(len(special_chars)):
    	key = key.replace(special_chars[i], " ")

    # replace double spaces by single space
    key = key.replace("  ", " ")
    key = key.replace("  ", " ")    

    key = key.strip()
    key = key.replace(" ", "_")
    key = key[:KEY_MAX_LENGTH]
    key = KEY_PREFIX + key
    return key

path = '/home/jerome/projects/maestric/shared/jeromejaglale/jsp_text_to_properties/group-view.jsp'
with open(path) as f:
	for l in f:
		#print l
		l = re.sub('<[^<]+?>', '', l) # remove HTML/XML tags: <...>
		l = re.sub('<[^<]+?>', '', l)
		l = re.sub('\${[^{}]+?}', '', l) # remove EL: ${...}
		l = l.strip()
		if l:
			print l
			key = get_key(l)
			print key