import os
from os.path import isfile, join, splitext

BASE_PATH = "./images"

f = open("result.sql","w+")

for category in os.listdir(BASE_PATH):
    for raw_subcategory in os.listdir(join(BASE_PATH, category)):
        subcategory = splitext(raw_subcategory)[0]
        for file_name in os.listdir(join(BASE_PATH, category, raw_subcategory)):
            display_name = splitext(file_name)[0]
            f.write("INSERT INTO objects(display_name, file_name, category, subcategory) VALUES('"+display_name+"','"+file_name+"','"+category+"','"+subcategory+"');\n")


f.close() 
