#!/usr/bin/python

# constants
##################################################
MESSAGE_TAG = """<spring:message code="%s" />"""

KEY_PREFIX = 'admin.'
KEY_MAX_LENGTH = 20

FILE_EXTENSIONS = '.jsp,'

# functions
##################################################
# split string into list of tags and plain text: ['', '<h1>', 'a great title', '</h1>', '']
def get_text(l):
	str_parts = []
	open_tags = 0
	tmp_str=''
	for char in l:
		if char == '<':
			if open_tags == 0:
				str_parts.append(tmp_str)
				tmp_str = ''
			tmp_str += char
			open_tags += 1
		elif char == '>':
			tmp_str += char
			open_tags -= 1
			if open_tags == 0:
				str_parts.append(tmp_str)
				tmp_str = ''
		else:
			tmp_str += char
	str_parts.append(tmp_str)

	return str_parts

# generate key from text: "a great title" -> a.great.title
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

# add number suffix (if necessary to avoid duplication) and prefix to key: admin.a.great.title2
def get_final_key(key, props):
	final_key = KEY_PREFIX + key
	i = 2
	while(final_key in props.keys()):
		final_key = KEY_PREFIX + key + str(i)
		i+=1
	return final_key

# generate new line with text replaced by message tag: "<h1><spring:message code="admin.a.great.title2" /></h1>"
def get_new_line(l, text, key):
	tag = MESSAGE_TAG % key
	return l.replace(text, tag)

# process a file
def process_file(path):
	with open(path) as f:
		# open tmp file
		tmp_path = path + ".tmp"
		f_out = open(tmp_path, "w")

		is_first_key = True
		for l in f:
			l_parts = get_text(l)
			l_out = ''
			for text in l_parts:
				text_strip = text.strip()
				if text_strip and not text_strip.startswith('<'):
					if text_strip in props.values():
						final_key = [k for k, v in props.iteritems() if v == text_strip][0]
					else:
						key = get_key(text_strip)
						final_key = get_final_key(key, props)
						props[final_key] = text_strip
						if is_first_key:
							print "# " + os.path.basename(path)
							is_first_key = False
						print final_key + '=' + text_strip
					l_out += get_new_line(text, text_strip, final_key)
				else:
					 l_out += text
			f_out.write(l_out)
		f_out.close()
		#os.rename(tmp_path, path)

# process a directory
def process_dir(path):
	for dirpath, dirnames, filenames in os.walk(path):
		for fname in filenames:
			fext = os.path.splitext(fname)[1]
			if fext != '' and fext in FILE_EXTENSIONS.split(','):
				fpath = os.path.join(dirpath, fname)
				process_file(fpath)

def process_path(path):
	if os.path.exists(path):
		if(os.path.isdir(path)):
			process_dir(path)
		else:
			process_file(path)

# main
##################################################
import sys, os, re

props = {}

for path in sys.argv[1:]:
	process_path(path)
