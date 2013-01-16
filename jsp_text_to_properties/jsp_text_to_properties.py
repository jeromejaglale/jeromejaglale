#!/usr/bin/python

# constants
##################################################
MESSAGE_TAG = """<spring:message code="%s" />"""
KEY_PREFIX = 'admin.'
KEY_MAX_LENGTH = 20

# functions
##################################################
def get_text(l):
	#print l
	l = re.sub('<[^<]+?>', '', l) # remove HTML/XML tags: <...>
	l = re.sub('<[^<]+?>', '', l)
	l = re.sub('\${[^{}]+?}', '', l) # remove EL: ${...}
	l = l.strip()
	return l

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
    key = key
    return key

# add prefix and number suffix to key
def get_final_key(key, props):
	final_key = KEY_PREFIX + key
	i = 2
	while(final_key in props.keys()):
		final_key = KEY_PREFIX + key + str(i)
		i+=1
	return final_key

def get_new_line(l, text, key):
	tag = MESSAGE_TAG % key
	l_out = l.replace(text, tag)
	return l_out


# main
##################################################
import re, os

props = {}

path = '/home/jerome/projects/maestric/shared/jeromejaglale/jsp_text_to_properties/group-view.jsp'
with open(path) as f:
	# open tmp file
	tmp_path = path + ".tmp"
	f_out = open(tmp_path, "w")

	is_first_key = True
	for l in f:
		text = get_text(l)
		if text:
			if text in props.values():
				final_key = [k for k, v in props.iteritems() if v == text][0]
			else:
				key = get_key(text)
				final_key = get_final_key(key, props)
				props[final_key] = text
				if is_first_key:
					print "# " + os.path.basename(path)
					is_first_key = False
				print final_key + '=' + text
			l_out = get_new_line(l, text, final_key)
			f_out.write(l_out)
		else:
			f_out.write(l)

	f_out.close()
	#os.rename(tmp_path, path)